<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $page = 'Materi1';
        return view('user.pages.materi.index', compact('page'));
    }

    public function materi2()
    {
        $page = 'Materi2';
        return view('user.pages.materi.materi2', compact('page'));
    }

    public function materi3()
    {
        $page = 'Materi3';
        return view('user.pages.materi.materi3', compact('page'));
    }
}
