<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('home');
});
Route::get('/event', function () {
    return view('event');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/IE', function () {
    return view('InternationalExposure');
});
Route::get('/studyProgram', function () {
    return view('studyProgram');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage class')->group(function () {
            Route::resource('class', ClassController::class);
        });

        Route::middleware('can:manage news')->group(function () {
            Route::resource('news', NewsController::class);
        });
        Route::middleware('can:manage user')->group(function () {
            Route::resource('user', UserController::class);
        });
        Route::middleware('can:manage program')->group(function () {
            Route::resource('program', ProgramController::class);
        });
    });
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::middleware('can:manage class')->group(function () {
            Route::resource('class', ClassController::class);
        });
        Route::middleware('can:manage news')->group(function () {
            Route::resource('news', NewsController::class);
        });
        Route::middleware('can:manage user')->group(function () {
            Route::resource('user', UserController::class);
        });
        Route::middleware('can:manage program')->group(function () {
            Route::resource('program', ProgramController::class);
        });
    });
    Route::prefix('student')->name('student.')->group(function () {
    });
});

require __DIR__ . '/auth.php';
