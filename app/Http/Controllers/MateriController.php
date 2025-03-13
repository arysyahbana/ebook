<?php

namespace App\Http\Controllers;

use App\Models\jawabanMahasiswa;
use App\Models\Materi;
use App\Models\Quiz;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with('rQuiz')->get();
        $user = auth()->user();
        $quizSemuaMateri = Quiz::where('materi', 'semuaMateri')->get();

        $filledMateri = $user
            ? jawabanMahasiswa::where('user_id', $user->id)->pluck('materi')->toArray()
            : [];

        // Ubah array menjadi lookup table agar pengecekan lebih cepat
        $filledMateriLookup = array_flip($filledMateri);

        $materiData = $materi->map(function ($item, $index) use ($filledMateriLookup, $materi) {
            if ($index === 0) {
                // Materi pertama selalu aktif
                $item->isActive = true;
                $item->isDisabled = false;
            } else {
                $prevMateriId = $materi[$index - 1]->id;
                $prevMateriFilled = isset($filledMateriLookup[$prevMateriId]);
                $item->isActive = $prevMateriFilled;
                $item->isDisabled = !$prevMateriFilled;
            }
            return $item;
        });
        $allMateriFilled = count($filledMateri) === $materi->count();
        $quizSemuaMateriDisabled = !$allMateriFilled;

        $page = 'Materi1';
        return view('user.pages.materi.index', compact(
            'page',
            'materiData',
            'materi',
            'quizSemuaMateri',
            'quizSemuaMateriDisabled'
        ));
    }

}
