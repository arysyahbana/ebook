<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalFunction;
use App\Models\jawabanMahasiswa;
use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Str;

class QuizController extends Controller
{
    public function index($id)
    {
        $page = 'Quiz';
        $quiz = Quiz::where('materi', $id)->get();
        $materi = Materi::select('judul_materi')->where('id', $id)->first();
        return view('user.pages.quiz.index', compact('page', 'quiz', 'materi'));
    }
    public function quizall()
    {
        $page = 'Quizall';
        return view('user.pages.quiz.quizall', compact('page'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $materiId = $request->materi_id;
        $skorSementara = 0;
        $jawabanMahasiswa = [];

        $cekJawabanLama = jawabanMahasiswa::where('materi', $materiId)->where('user_id',$user->id)->get();
        if ($cekJawabanLama->isNotEmpty()) {
            foreach ($cekJawabanLama as $tempJawaban) {
                foreach ($tempJawaban->jawaban as $jawaban) {
                    GlobalFunction::deleteImage($jawaban['file'], "jawaban_mahasiswa/{$user->id}/");
                }
            }
        }

        foreach ($request->jawaban as $jawaban) {
            if (!empty($jawaban['file'])) {
                $image = GlobalFunction::convertBase64ToImage($jawaban['file']);
                $randName = Str::uuid()->toString();
                $fileName = GlobalFunction::saveImage($image, $randName, "jawaban_mahasiswa/{$user->id}");
                $jawaban['file'] = $fileName;
            }

            $cekHasil = Quiz::select('jawaban_benar', 'skor')->find($jawaban['quiz_id']);
            if ($cekHasil && $cekHasil->jawaban_benar == $jawaban['pilihan']) {
                $skorSementara += $cekHasil->skor;
            }

            $jawabanMahasiswa[] = $jawaban; 
        }

        // $totalSoal = count($request->jawaban);

        // $skor = $skorSementara/$totalSoal;

        $totalMengerjakan = jawabanMahasiswa::where('user_id', $user->id)
            ->where('materi', $materiId)
            ->value('total_mengerjakan') ?? 0; 

        $totalMengerjakan += 1; 

        $data = [
            'user_id' => $user->id,
            'materi' => $materiId,
            'jawaban' => $jawabanMahasiswa,
            'nilai' => $skorSementara,
            'total_mengerjakan' => $totalMengerjakan,
        ];

        JawabanMahasiswa::updateOrCreate(
            ['materi' => $materiId, 'user_id' => $user->id],
            $data
        );
        
        return response()->json($skorSementara);
    }

}
