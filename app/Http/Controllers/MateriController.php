<?php

namespace App\Http\Controllers;

use App\Models\jawabanMahasiswa;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\Setting;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with('rQuiz')->get();
        $user = auth()->user();
        $quizSemuaMateri = Quiz::where('materi', 'semuaMateri')->get();

        $filledMateri = $user
            ? jawabanMahasiswa::where('user_id', $user->id)->pluck('nilai', 'materi')->toArray()
            : [];


        $kkm = Setting::value('kkm') ?? 100;
        // Ubah array menjadi lookup table agar pengecekan lebih cepat
        $filledMateriLookup = array_flip($filledMateri);

        $materiData = $materi->map(function ($item, $index) use ($filledMateri, $materi, $kkm) {
            if ($index === 0) {
                // Materi pertama selalu aktif
                $item->isActive = true;
                $item->isDisabled = false;
            } else {
                $prevMateriId = $materi[$index - 1]->id;
                // Perbaikan pengecekan: cek apakah materi sebelumnya sudah memenuhi KKM
                $prevMateriFilled = isset($filledMateri[$prevMateriId]) && $filledMateri[$prevMateriId] >= $kkm;

                $item->isActive = $prevMateriFilled;
                $item->isDisabled = !$prevMateriFilled;
            }
            return $item;
        });

        // Cek apakah semua materi sudah memenuhi KKM
        $allMateriFilled = count(array_filter($filledMateri, fn($nilai) => $nilai >= $kkm)) === $materi->count();
        $quizSemuaMateriDone = $user
            ? jawabanMahasiswa::where('user_id', $user->id)
            ->where('materi', 'semuaMateri')
            ->exists()
            : false;
        $quizSemuaMateriDisabled = !$allMateriFilled && !$quizSemuaMateriDone;
        $kkm = Setting::value('kkm') ?? 75;

        if (auth()->check()) {
            $user = auth()->user();

            $quizAllCheck = jawabanMahasiswa::where('user_id', $user->id)
                ->where('materi', 'semuaMateri')
                ->first();

            // Jika datanya tidak ditemukan, buat object dengan total_mengerjakan = 0
            if (!$quizAllCheck) {
                $quizAllCheck = (object) ['total_mengerjakan' => 0];
            }
        } else {
            // Jika user belum login, buat object dummy
            $quizAllCheck = (object) ['total_mengerjakan' => 0];
        }


        $page = 'Materi1';
        return view('user.pages.materi.index', compact(
            'page',
            'materiData',
            'materi',
            'quizSemuaMateri',
            'quizSemuaMateriDisabled',
            'kkm',
            'quizAllCheck'
        ));
    }
}
