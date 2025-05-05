<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EventGameController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\GameEventFollowerController;
use App\Http\Controllers\Email\AdminNotificationController;
use App\Http\Controllers\Email\TurnamentReportMailController;
use App\Models\Article;

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

    Route::get('/', function () {
        return redirect()->route('landing');
    });

Route::get('/landing', [UserController::class, 'index'])->name('landing');
    
    // pendaftaran
    Route::get('/pendaftar/{id}', [PendaftaranController::class, 'pendaftaran'])->where('id', '[0-9]+')->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'pendaftarandata'])->name('pendaftarandata');
    Route::get('/pendaftaran-show/{id}', [PendaftaranController::class, 'show'])->name('pendaftar.show');

    //login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('auth-login', [LoginController::class, 'login'])->name('auth.login');
    Route::get('register', [LoginController::class, 'register'])->name('register');
    Route::post('register-post', [LoginController::class, 'registerpost'])->name('register.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        
        Route::resource('account',AccountController::class);
        Route::resource('roles',RolesController::class);
        Route::get('roles/{roleId}/give-permissions', [RolesController::class, 'addPermissionToRole']);
        Route::put('roles/{roleId}/give-permissions', [RolesController::class, 'givePermissionToRole']);
        
        Route::resource('permissions',PermissionsController::class);
        
        // Route::get('/roles/create', [AccountController::class, 'createRole'])->name('roles.create');
        // Route::post('/roles/store', [AccountController::class, 'storeRole'])->name('roles.store');
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
        Route::delete('/pendaftaran-delete/{id}', [EventController::class, 'delete'])->name('pendaftarandelete');
    });
    
    Route::middleware('auth')->group(function () {
        Route::resource('article', ArticleController::class);
        Route::resource('game-event', EventGameController::class);
        Route::resource('contact', ContactController::class);
        Route::get('index-article', [ArticleController::class, 'indexarticle'])->name('index.article');
        Route::resource('event-community', GameEventFollowerController::class);    
        Route::get('/article-game', [EventController::class, 'articlegame'])->name('article.game');
    });

    Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

    Route::get('/export-pdf', [UserController::class, 'exportpdf'])->name('export.pdf');
    Route::get('/turnament', [EventController::class, 'turnament'])->name('turnament');

    //SMTP Email
    Route::post('/request-community', [AdminNotificationController::class, 'requestCommunityCreation'])->name('request.community');
    Route::post('/request-game', [AdminNotificationController::class, 'requestGameCreation'])->name('request.game');
    Route::post('/admin/respond/{userId}', [AdminNotificationController::class, 'respondToSubmission'])->name('admin.respond');

    // datatables
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/data', [AdminController::class, 'datatables'])->name('users.data');
    Route::get('/pendaftar/data', [UserController::class, 'datatable'])->name('pendaftar.data');

    Route::post('/report', [TurnamentReportMailController::class, 'report'])->name('report');



