<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with('rQuiz')->get();
        $quizSemuaMateri = Quiz::where('materi','semuaMateri')->get();
        $page = 'Materi1';
        return view('user.pages.materi.index', compact('page','materi','quizSemuaMateri'));
    }
}
