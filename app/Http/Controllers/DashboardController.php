<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use App\Models\PaketTour;
use App\Models\Penginapan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page = 'Dashboard';
        $user = User::where('role', 'Mahasiswa')->count();

        return view('admin.pages.dashboard', compact('page', 'user'));
    }
}
