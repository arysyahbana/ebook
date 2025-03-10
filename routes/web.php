<?php

use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\MateriController as AdminMateriController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.pages.dashboard');
// });

// Guest
Route::get('/', [MateriController::class, 'index'])->name('index');
Route::get('/materi2', [MateriController::class, 'materi2'])->name('materi2');
Route::get('/materi3', [MateriController::class, 'materi3'])->name('materi3');

Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('index.leaderboard');
Route::get('/my-history', [LeaderboardController::class, 'myhistory'])->name('index.my.history');

Route::get('/quiz', [QuizController::class, 'index'])->name('index.quiz');
Route::get('/quiz-all', [QuizController::class, 'quizall'])->name('quiz.all');

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::prefix('settings')->group(function () {
        Route::get('/show', [SettingController::class, 'index'])->name('setting.show');
        Route::post('/store', [SettingController::class, 'store'])->name('setting.store');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('setting.update');
        Route::get('/destroy/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');
    });

    Route::prefix('materi')->group(function () {
        Route::get('/show', [AdminMateriController::class, 'index'])->name('materi.show');
        Route::get('/create', [AdminMateriController::class, 'create'])->name('materi.create');
        Route::post('/store', [AdminMateriController::class, 'store'])->name('materi.store');
        Route::get('/edit/{id}', [AdminMateriController::class, 'edit'])->name('materi.edit');
        Route::post('/update/{id}', [AdminMateriController::class, 'update'])->name('materi.update');
        Route::get('/destroy/{id}', [AdminMateriController::class, 'destroy'])->name('materi.destroy');
    });

    Route::prefix('quiz')->group(function () {
        Route::get('/show', [AdminQuizController::class, 'index'])->name('quiz.show');
        Route::get('/create', [AdminQuizController::class, 'create'])->name('quiz.create');
        Route::post('/store', [AdminQuizController::class, 'store'])->name('quiz.store');
        Route::get('/edit', [AdminQuizController::class, 'edit'])->name('quiz.edit');
        Route::post('/update/{id}', [AdminQuizController::class, 'update'])->name('quiz.update');
        Route::get('/destroy', [AdminQuizController::class, 'destroy'])->name('quiz.destroy');
    });

    Route::prefix('history')->group(function () {
        Route::get('/show', [HistoryController::class, 'index'])->name('history.show');
        Route::get('/detail', [HistoryController::class, 'detail'])->name('history.detail');
    });

    Route::prefix('users')->group(function () {
        Route::get('/show', [UserController::class, 'index'])->name('users.show');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/download', [UserController::class, 'download'])->name('users.download');
        Route::get('/acc-user/{id}/{action}', [UserController::class, 'accUser'])->name('users.accUser');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__ . '/auth.php';
