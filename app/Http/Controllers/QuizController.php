<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $page = 'Quiz';
        return view('user.pages.quiz.index', compact('page'));
    }
    public function quizall()
    {
        $page = 'Quizall';
        return view('user.pages.quiz.quizall', compact('page'));
    }
}
