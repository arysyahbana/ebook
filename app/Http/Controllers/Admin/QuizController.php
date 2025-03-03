<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $page = 'Quiz';
        return view('admin.pages.quiz.index', compact('page'));
    }

    public function create()
    {
        $page = 'Quiz';
        return view('admin.pages.quiz.add', compact('page'));
    }

    public function edit()
    {
        $page = 'Quiz';
        return view('admin.pages.quiz.edit', compact('page'));
    }
}
