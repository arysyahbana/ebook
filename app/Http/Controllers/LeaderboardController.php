<?php

namespace App\Http\Controllers;

use App\Models\jawabanMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $page = 'Leaderboard';
        $users = User::where('role', 'Mahasiswa')->get();

        $leaderBoards = [];

        foreach ($users as $user) {
            $jawabanCollection = jawabanMahasiswa::with(['rMateri:id,nama_materi'])
                ->where('user_id', $user->id)
                ->get();

            $totalNilai = $jawabanCollection->sum('nilai');
            $jumlahMateri = $jawabanCollection->count();
            $rata = $jumlahMateri > 0 ? $totalNilai / $jumlahMateri : 0;

            $jawabanArray = [];
            foreach ($jawabanCollection as $jawaban) {
                if ($jawaban->rMateri->nama_materi !== 'semuaMateri') {
                    $jawabanArray[] = (object) [
                        'nama_materi' => $jawaban->rMateri->nama_materi,
                        'nilai' => $jawaban->nilai,
                    ];
                }
            }

            $leaderBoard[] = (object) [
                'nama_user' => $user->name,
                'nim' => $user->nim,
                'rata' => $rata,
                'hasilQuiz' => $jawabanArray,
            ];
        }

        // Urutkan leaderboard berdasarkan rata-rata nilai secara descending
        $leaderBoards = collect($leaderBoard)->sortByDesc('rata')->values();



        return view('user.pages.leaderboard.index', compact('page', 'leaderBoards'));
    }

    public function myhistory()
    {
        $page = 'MyHistory';
        $user = auth()->user();
        $history = '';
        $jawabanCollection = jawabanMahasiswa::with(['rMateri:id,nama_materi'])
            ->where('user_id', $user->id)
            ->get();

        $totalNilai = $jawabanCollection->sum('nilai');
        $jumlahMateri = $jawabanCollection->count();
        $rata = $jumlahMateri > 0 ? $totalNilai / $jumlahMateri : 0;

        $jawabanArray = [];
        foreach ($jawabanCollection as $jawaban) {
            $jawabanArray[] = (object) [
                'nama_materi' => $jawaban->rMateri->nama_materi,
                'nilai' => $jawaban->nilai,
            ];
        }

        $history = (object) [
            'nama_user' => $user->name,
            'nim' => $user->nim,
            'rata' => $rata,
            'hasilQuiz' => $jawabanArray,
        ];
        return view('user.pages.history.index', compact('page', 'history'));
    }
}
