<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $page = 'Materi';
        return view('admin.pages.materi.index', compact('page'));
    }
}
