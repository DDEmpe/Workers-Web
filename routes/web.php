<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{RegisterController, LoginController};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardJobVacancyController;
use App\Http\Controllers\DashboardInterview;
use App\Http\Controllers\DashboardInterviewUser;
use App\Http\Controllers\DashboardPelamar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\appliedjobController;
use App\Http\Controllers\LihatController;

use App\Models\profession;
use App\Models\study_major;
use App\Models\department;
use App\Models\company_category;
use App\Models\job_vacancy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HOME
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// PROFILE
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'show'])->middleware('auth');
Route::post('profile/edit', [RegisterController::class, 'update'])->middleware('auth');

// LOGIN
Route::get('/login', function () {
    return view('login.login', [
        'title' => 'Login'
    ]);
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('login.register', [
        'title' => 'Jenis Akun'
    ]);
})->middleware('guest');

Route::get('/signupjob', function () {
    return view('login.signup', [
        'title' => 'Register Job Seeker',
        'professions' => profession::all(),
        'study_majors' => study_major::all(),

    ]);
});

Route::get('/signupcomp', function () {
    return view('login.signupcomp', [
        'title' => 'Register Company',
        'company_categories' => company_category::all(),
    ]);
});

Route::post('/register', [RegisterController::class, 'create']);

Route::get('/job_detail/{job_vacancy:uid_job_vacancy}', [JobVacancyController::class, 'show'])->middleware('auth');

Route::get('/buatinterview', function () {
    return view('interview_comp.interview', [
        'title' => 'Buat Jadwal Interview'
    ]);
})->middleware('auth');

Route::get('/appliers', function () {
    return view('appliers.pelamar', [
        'title' => 'Pelamar Lowongan'
    ]);
})->middleware('auth');

Route::get('/interview', function () {
    return view('lihat_interview.lihatinter', [
        'title' => 'Interview'
    ]);
})->middleware('auth');

Route::get('/interview_user', function () {
    return view('dashboard.interview.index', [
        'title' => 'Interview'
    ]);
})->middleware('auth');

Route::post('/applyjob/store', [ApplyJobController::class, 'store']);

Route::get('/dashboard/applied_job', [AppliedJobController::class, 'index'])->middleware('auth');

Route::post('/dashboard/applied_job/{uid}', [AppliedJobController::class, 'delete']);

Route::resource('/dashboard/lowongan', DashboardJobVacancyController::class)->middleware('auth');

Route::resource('/dashboard/interview', DashboardInterview::class)->middleware('auth');

Route::resource('/dashboard/pelamar', DashboardPelamar::class)->middleware('auth');

Route::get('/profile/company/{username}', [LihatController::class, 'show']);

Route::get('/dashboard/interview_user', [DashboardInterviewUser::class, 'index']);

Route::get('/dashboard/interview_user/{uid_interview}', [DashboardInterviewUser::class, 'show']);

Route::get('/search', [HomeController::class, 'index']);

Route::get('/aboutus', function () {
    return view('landing.about.index', [
        'title' => 'About us'
    ]);
});
