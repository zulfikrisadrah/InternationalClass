<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TranscriptController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

Route::get('/event', [LandingPageController::class, 'event'])->name('event.index');
Route::get('/event/{id}', [LandingPageController::class, 'eventShow'])->name('event.show');

Route::get('/news', [LandingPageController::class, 'news'])->name('news.index');
Route::get('/news/{id}', [LandingPageController::class, 'newsShow'])->name('news.show');

Route::get('/about', [LandingPageController::class, 'about'])->name('about.index');

Route::get('/InternationalExposure', [LandingPageController::class, 'InternationalExposure'])->name('InternationalExposure.index');
Route::get('/InternationalExposure/{id}', [LandingPageController::class, 'InternationalExposureShow'])->name('InternationalExposure.show');

Route::get('/studyProgram', [LandingPageController::class, 'studyProgram'])->name('studyProgram.index');
Route::get('/studyProgram/{id}', [LandingPageController::class, 'studyProgramShow'])->name('studyProgram.show');


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
        Route::middleware('can:manage news')->group(function () {
            Route::resource('event', EventController::class);
        });
        Route::middleware('can:manage user')->group(function () {
            Route::resource('user', UserController::class);
        });
        Route::middleware('can:manage program')->group(function () {
            Route::resource('program', ProgramController::class);
        });
        Route::post('program/{programId}/enrollments/{studentId}/update-status', [ProgramController::class, 'updateStatus'])
        ->name('program.updateStatus');
        Route::resource('calender', CalenderController::class);
        Route::get('/calendar/events', [CalenderController::class, 'getEvents'])->name('calendar.events');
    });
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::middleware('can:manage class')->group(function () {
            Route::resource('class', ClassController::class);
        });
        Route::middleware('can:manage news')->group(function () {
            Route::resource('news', NewsController::class);
        });
        Route::middleware('can:manage news')->group(function () {
            Route::resource('event', EventController::class);
        });
        Route::middleware('can:manage user')->group(function () {
            Route::resource('user', UserController::class);
        });
        Route::middleware('can:manage program')->group(function () {
            Route::resource('program', ProgramController::class);
        });
    });
    Route::prefix('student')->name('student.')->group(function () {
        Route::resource('studyPlan', StudyPlanController::class);
        Route::resource('calender', CalenderController::class);
        Route::resource('transcript', TranscriptController::class);
        Route::get('/calendar/events', [CalenderController::class, 'getEvents'])->name('calendar.events');
        Route::post('/calendar/events', [CalenderController::class, 'store'])->name('calendar.store');
        Route::middleware('can:choose program')->group(function () {
            Route::resource('program', ProgramController::class);
        });
        Route::post('student/program/{programId}/enroll', [ProgramController::class, 'enroll'])->name('program.enroll');
    });
});

require __DIR__ . '/auth.php';
