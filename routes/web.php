<?php

use App\Http\Controllers\Admin\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\EventGameController;
use App\Http\Controllers\Admin\GameEventFollowerController;
use App\Http\Controllers\Email\AdminNotificationController;
use App\Http\Controllers\Email\TurnamentReportMailController;

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

// Route::get('/', function () {
    //     return view('w');
    // });
    
    // Route::get('/landing', [EventController::class, 'landing'])->name('landing');
    
    // pendaftaran
    Route::get('/pendaftar/{id}', [PendaftaranController::class, 'pendaftaran'])->where('id', '[0-9]+')->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'pendaftarandata'])->name('pendaftarandata');
    Route::get('/pendaftaran-show/{id}', [PendaftaranController::class, 'show'])->name('pendaftar.show');






//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('auth-login', [LoginController::class, 'login'])->name('auth.login');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register-login', [LoginController::class, 'registerlogin'])->name('register.login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Export PDF
    Route::get('/download-pdf', [AdminController::class, 'getpdf'])->name('download.pdf');    
    // export excel
    Route::get('/export-excel', [AdminController::class, 'export'])->name('export.excel');

    // tambah data
    Route::get('/tambahdata', [EventController::class, 'index'])->name('tambah.data');
    Route::put('/insertdata', [EventController::class, 'store'])->name('insertdata');
    
    // edt data
    Route::get('/pendaftaran/edit/{id}', [EventController::class, 'update'])->name('pendaftaran.edit');
    Route::put('/pendaftaran/update/{id}', [EventController::class, 'updatedata'])->name('pendaftaran.update');
    
    // delete data
    Route::get('/pendaftaran/delete/{id}', [EventController::class, 'delete'])->name('pendaftarandelete');
});

Route::middleware('auth')->group(function () {
    Route::resource('game-event', EventGameController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('contact', ContactController::class);

});
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::resource('event-community', GameEventFollowerController::class);

});

Route::get('/', [UserController::class, 'index'])->name('landing');
Route::get('/export-pdf', [UserController::class, 'exportpdf'])->name('export.pdf');
Route::get('/article', [EventController::class, 'article'])->name('article');
Route::get('/turnament', [EventController::class, 'turnament'])->name('turnament');

//SMTP Email
Route::post('/request-community', [AdminNotificationController::class, 'requestCommunityCreation'])->name('request.community');
Route::post('/request-game', [AdminNotificationController::class, 'requestGameCreation'])->name('request.game');
Route::post('/admin/respond/{userId}', [AdminNotificationController::class, 'respondToSubmission'])->name('admin.respond');
Route::middleware(['auth'])->group(function () {
});

// datatables
Route::get('/users', [AdminController::class, 'users'])->name('users.index');
Route::get('/users/data', [AdminController::class, 'datatables'])->name('users.data');
Route::get('/pendaftar/data', [UserController::class, 'datatable'])->name('pendaftar.data');

Route::post('/report', [TurnamentReportMailController::class, 'report'])->name('report');



