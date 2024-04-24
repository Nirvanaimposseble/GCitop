<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetailticketController;
use App\Http\Controllers\KategoriassetController;
use App\Http\Controllers\KategoriticketController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
Use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
//Login
// Authentication Routes
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/PostLogin', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home.dashboard');
    });

    // Asset Routes
    Route::resource('asset', AssetController::class)->except(['show']);
    Route::put('/asset/{id}', [AssetController::class, 'update']);

    // Ticket Routes
    Route::resource('ticket', TicketController::class)->except(['show']);
    Route::middleware(['auth'])->group(function () {
        Route::get('/detailticket/{ticket_id}/show', [DetailticketController::class, 'show']);
    });
    Route::get('/ticket/{ticket_id}/finished', [TicketController::class, 'finished'])->name('ticket.finished');
    Route::get('/ticket/{ticket_id}/pending', [TicketController::class, 'Pending'])->name('ticket.pending');

    //Profile
    Route::get('/profile/{id}', [UserController::class, 'profile']);
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::get('/password/change', [UserController::class, 'password']);
    Route::post('/change/password', [UserController::class, 'passwordChange']);

    // Service Desk Routes
    Route::middleware(['service.desk'])->group(function () {
        Route::get('getSubcategories', [KategoriticketController::class, 'getSubcategories'])->name('getSubcategories');
        Route::get('/ticket/{ticket_id}/resolve', [TicketController::class, 'resolveTicket'])->name('ticket.resolve');

        // Detail Ticket Routes
        Route::get('/detailticket/{id}/lanjut',[DetailticketController::class,'index']);
        Route::get('/detail_ticket/{id}/assign',[DetailticketController::class,'assign']);
        Route::get('/detailticket/{ticket_id}', [DetailticketController::class, 'index']);
        Route::get('/detailticket/create/{ticket_id}', [DetailticketController::class, 'create']);
        Route::get('/detailticket/{ticket_id}/lanjut2', [DetailticketController::class, 'Lanjut2'])->name('detailticket.lanjut2');
        Route::post('/detailticket/simpan', [DetailticketController::class, 'store']);
        Route::get('/detailticket/{id}/edit', [DetailticketController::class, 'edit']);

        // User Routes
        Route::resource('user', UserController::class)->except(['show']);
        Route::put('/user/{id}', [UserController::class, 'update']);

        // Client Routes
        Route::resource('client', ClientController::class)->except(['show']);
        Route::put('/client/{id}', [ClientController::class, 'update']);

        // Agent Routes
        Route::resource('agent', AgentController::class)->except(['show']);
        Route::put('/agent/{id}', [AgentController::class, 'update']);

        // Lokasi Routes
        Route::resource('lokasi', LokasiController::class)->except(['show']);
        Route::put('/lokasi/{id}', [LokasiController::class, 'update']);

        // Sub Kategori Routes
        Route::resource('subkategori', SubkategoriController::class)->except(['show']);
        Route::put('/subkategori/{id}', [SubkategoriController::class, 'update']);

        // Kategori Ticket Routes
        Route::resource('kategoriticket', KategoriticketController::class)->except(['show']);
        Route::put('/kategoriticket/{id}', [KategoriticketController::class, 'update']);

        // Kategori Asset Routes
        Route::resource('kategoriasset', KategoriassetController::class)->except(['show']);
        Route::put('/kategoriasset/{id}', [KategoriassetController::class, 'update']);
    });
});
