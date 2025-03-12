<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;

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

    public function store(Request $request){
        dd($request->all());die;
    }
}
