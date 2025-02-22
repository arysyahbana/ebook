<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $page = 'Leaderboard';
        return view('user.pages.leaderboard.index', compact('page'));
    }

    public function myhistory()
    {
        $page = 'MyHistory';
        return view('user.pages.history.index', compact('page'));
    }
}
