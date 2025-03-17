<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GenericExport;
use App\Http\Controllers\Controller;
use App\Models\jawabanMahasiswa;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function index()
    {
        $page = 'History';
        $historys = User::select('id', 'name', 'nim')
            ->where('role', 'Mahasiswa')
            ->whereHas('rJawaban', function ($query) {
                $query->where('materi', 'semuaMateri');
            })
            ->with([
                'rJawaban' => function ($query) {
                    $query->where('materi', 'semuaMateri');
                }
            ])
            ->get();

        return view('admin.pages.history.index', compact('page', 'historys'));
    }

    public function detail($id)
    {
        $page = 'History';

        $studentAnswers = JawabanMahasiswa::where('user_id', $id)->get();

        $answersLookup = $studentAnswers->pluck('jawaban')->flatten(1)->toArray();

        $studentScores = $studentAnswers->groupBy('materi');

        $quiz = Materi::with('rQuiz')->get();
        $this->attachStudentData($quiz, $answersLookup, $studentScores);

        $quizSemuaMateri = Quiz::where('materi', 'semuaMateri')->get();
        $this->attachStudentDataToQuiz($quizSemuaMateri, $answersLookup, $studentScores);

        return view('admin.pages.history.detail', compact('page', 'quiz', 'quizSemuaMateri'));
    }

    private function attachStudentData($materials, $answersLookup, $studentScores)
    {
        $materials->each(function ($materi) use ($answersLookup, $studentScores) {
            $materi->rQuiz->each(function ($quiz) use ($answersLookup) {
                $answer = collect($answersLookup)->firstWhere('quiz_id', $quiz->id);

                $quiz->jawabanMahasiswa = $answer ? $answer['pilihan'] : null;
                // $quiz->fileJawabanMahasiswa = $answer ? $answer['file'] : null;
                $quiz->fileJawabanMahasiswa = isset($answer['file']) ? $answer['file'] : null;
            });

            $score = $studentScores->get($materi->id, collect());
            $materi->nilaiMahasiswa = $score->isNotEmpty() ? $score->first()->nilai : null;
            $materi->userId = $score->isNotEmpty() ? $score->first()->user_id : null;
        });
    }


    private function attachStudentDataToQuiz($quizzes, $answersLookup, $studentScores)
    {
        $quizzes->each(function ($quiz) use ($answersLookup, $studentScores) {
            $answer = collect($answersLookup)->firstWhere('quiz_id', $quiz->id);
            $quiz->jawabanMahasiswa = $answer ? $answer['pilihan'] : null;
            // $quiz->fileJawabanMahasiswa = $answer ? $answer['file'] : null;
            $quiz->fileJawabanMahasiswa = isset($answer['file']) ? $answer['file'] : null;


            $score = $studentScores->get($quiz->materi, collect());
            $quiz->nilaiMahasiswa = $score->isNotEmpty() ? $score->first()->nilai : null;
            $quiz->userId = $score->isNotEmpty() ? $score->first()->user_id : null;
        });
    }

    public function download()
    {
        $columns = ['nilai',];
        $relations = [
            'rUser' => ['name','nim'],
            'rMateri' => ['judul_materi']
        ];
        $defaultRelations = [
            'rMateri' => ['judul_materi' => 'Semua Materi']
        ];
        return Excel::download(new GenericExport(jawabanMahasiswa::class, $columns, 'E', 'history',$relations,$defaultRelations), 'History.xlsx');
    }
}
