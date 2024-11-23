<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\StudentDashboardController;

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
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Admin Dashboard Resource
// Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
//     Route::get('dashboard/admin', [AdminDashboardController::class, 'index'])->name('dashboard.admin.index');
// });

// Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
//     Route::get('dashboard/staff', [StaffDashboardController::class, 'index'])->name('dashboard.staff.index');
// });

// Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
//     Route::get('dashboard/student', [StudentDashboardController::class, 'index'])->name('dashboard.student.index');
// });



Route::get('/dashboard', function () {
    return view('dashboard.admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/class', function () {
    return view('dashboard.admin.class');
})->middleware(['auth', 'verified'])->name('class');

Route::get('/dashboard/program', function () {
    return view('dashboard.admin.program');
})->middleware(['auth', 'verified'])->name('program');

Route::get('/dashboard/information', function () {
    return view('dashboard.admin.information');
})->middleware(['auth', 'verified'])->name('information');

Route::get('/dashboard/user', function () {
    return view('dashboard.admin.user');
})->middleware(['auth', 'verified'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route:: prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::middleware('can:manage class')->group(function () {
            Route::get('/news', [ClassController::class, 'news'])->name('admin.news');
        });

        Route::middleware('can:manage news')->group(function () {
            Route::get('/news', [NewsController::class, 'news'])->name('admin.news');
        });
    });
});

require __DIR__.'/auth.php';
