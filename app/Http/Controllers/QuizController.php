<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalFunction;
use App\Models\jawabanMahasiswa;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\Setting;
use Illuminate\Http\Request;
use Str;

class QuizController extends Controller
{
    public function index($id)
    {
        $page = 'Quiz';
        $quiz = Quiz::where('materi', $id)->get();
        $materi = Materi::select('judul_materi', 'id')->where('id', $id)->first();
        $kkm = Setting::value('kkm') ?? 75;
        return view('user.pages.quiz.index', compact('page', 'quiz', 'materi', 'kkm'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $materiId = $request->materi_id;
        $jawabanMahasiswa = [];
        $jumlahBenar = 0;
        $totalSoal = count($request->jawaban);

        // Ambil semua quiz_id dari jawaban yang dikirim
        $quizIds = collect($request->jawaban)->pluck('quiz_id');

        // Ambil jawaban benar dan skor dari database dalam satu query
        $quizData = Quiz::whereIn('id', $quizIds)->pluck('jawaban_benar', 'id');

        foreach ($request->jawaban as $jawaban) {
            // Proses jika ada file gambar
            if (!empty($jawaban['file'])) {
                $image = GlobalFunction::convertBase64ToImage($jawaban['file']);
                $fileName = GlobalFunction::saveImage($image, Str::uuid()->toString(), "jawaban_mahasiswa/{$user->id}");
                $jawaban['file'] = $fileName;
            }

            // Cek apakah jawaban benar
            if (isset($quizData[$jawaban['quiz_id']]) && $quizData[$jawaban['quiz_id']] == $jawaban['pilihan']) {
                $jumlahBenar++;
            }

            $jawabanMahasiswa[] = $jawaban;
        }

        $skor = $totalSoal > 0 ? (100 / $totalSoal) * $jumlahBenar : 0;

        // Ambil data jawaban lama sekaligus
        $jawabanLama = JawabanMahasiswa::where('user_id', $user->id)
            ->where('materi', $materiId)
            ->first();

        $totalMengerjakan = ($jawabanLama->total_mengerjakan ?? 0) + 1;
        $kkm = Setting::value('kkm') ?? 75;

        // Batasi skor maksimal jika lebih dari 1 kali mengerjakan
        if ($totalMengerjakan > 1 && $skor > $kkm) {
            $skor = $kkm;
        }

        $lastMateriId = Materi::max('id');

        if ($jawabanLama && $jawabanLama->nilai > $skor) {
            foreach ($jawabanMahasiswa as $jawaban) {
                if (!empty($jawaban['file'])) {
                    GlobalFunction::deleteImage($jawaban['file'], "jawaban_mahasiswa/{$user->id}/");
                }
            }
            return response()->json([
                'skor' => $skor,
                'isLastMateri' => $materiId == $lastMateriId,
            ]);
        }

        // Jika ada jawaban lama, hapus file lama sebelum menyimpan yang baru
        if ($jawabanLama) {
            foreach ($jawabanLama->jawaban as $oldJawaban) {
                if (!empty($oldJawaban['file'])) {
                    GlobalFunction::deleteImage($oldJawaban['file'], "jawaban_mahasiswa/{$user->id}/");
                }
            }
        }

        // Simpan atau update jawaban
        JawabanMahasiswa::updateOrCreate(
            ['materi' => $materiId, 'user_id' => $user->id],
            [
                'jawaban' => $jawabanMahasiswa,
                'nilai' => $skor,
                'total_mengerjakan' => $totalMengerjakan,
            ]
        );


        return response()->json([
            'skor' => $skor,
            'isLastMateri' => $materiId == $lastMateriId,
        ]);
    }
}
