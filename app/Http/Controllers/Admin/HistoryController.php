<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\jawabanMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

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
        ->with(['rJawaban' => function ($query) {
            $query->where('materi', 'semuaMateri');
        }])
        ->get();
        return view('admin.pages.history.index', compact('page','historys'));
    }

    public function detail()
    {
        $page = 'History';
        return view('admin.pages.history.detail', compact('page'));
    }
}
