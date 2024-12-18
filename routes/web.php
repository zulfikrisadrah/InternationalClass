<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\OutboundLecturerController;

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
Route::post('/update-english-score/{userId}', [UserController::class, 'updateEnglishScore']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
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
            Route::get('user/generate-pdf', [UserController::class, 'generatePdf'])->name('user.generate-pdf');
            Route::get('user/preview-pdf', [UserController::class, 'previewPdf'])->name('user.preview-pdf');
            Route::resource('user', UserController::class);
            Route::post('user/storeStudent', [UserController::class, 'storeStudent'])->name('user.storeStudent');
            Route::post('user/{userId}/update-english-score', [UserController::class, 'updateEnglishScore'])->name('user.updateEnglishScore');
            Route::get('program/{program}/user/{user}/logbook', [LogbookController::class, 'indexForAdmin'])->name('admin.logbook.index');
            Route::get('program/{program}/certificate/{user}', [LogbookController::class, 'readCertificate'])->name('certificate.read');
        });
        Route::middleware('can:manage program')->group(function () {
            Route::resource('program', ProgramController::class);
            Route::resource('studyProgram', StudyProgramController::class);
            Route::resource('partnerships', PartnershipController::class);
            Route::resource('outboundLecturers', OutboundLecturerController::class);
            Route::post('program/{program}/add-student', [ProgramController::class, 'addStudentToProgram'])->name('program.addStudent');
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
        Route::resource('program', ProgramController::class);
        Route::get('program/{program}/logbook', [LogbookController::class, 'index'])->name('logbook.index');
        Route::get('program/{program}/logbook/create', [LogbookController::class, 'create'])->name('logbook.create');
        Route::post('/program/{program}/logbook', [LogbookController::class, 'store'])->name('logbook.store');
        Route::get('program/{program}/logbook/{logbook}/edit', [LogbookController::class, 'edit'])->name('logbook.edit');
        Route::put('program/{program}/logbook/{logbook}', [LogbookController::class, 'update'])->name('logbook.update');
        Route::delete('program/{program}/logbook/{logbook}', [LogbookController::class, 'destroy'])->name('logbook.destroy');
        Route::post('program/{program}/certificate', [LogbookController::class, 'storeCertificate'])->name('certificate.store');
        Route::post('program/update-status/{student}', [UserController::class, 'updateStatus'])->name('user.updateStatus');
        Route::post('student/program/{programId}/enroll', [ProgramController::class, 'enroll'])->name('program.enroll');
    });
});

require __DIR__ . '/auth.php';
