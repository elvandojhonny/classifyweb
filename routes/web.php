<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SettingController;

use App\Models\Pengumuman;

/*
|--------------------------------------------------------------------------
| WELCOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $pengumuman = Pengumuman::where('aktif', true)
        ->latest()
        ->take(3)
        ->get();

    return view('welcome', compact('pengumuman'));

});

Route::post('/support/send', [SupportController::class, 'send'])
    ->name('support.send');

/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (
        auth()->user()->role == 'admin' ||
        auth()->user()->role == 'superadmin'
    ) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| USER PANEL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/user/dashboard',
        [DashboardController::class, 'user'])
        ->name('user.dashboard');

    Route::get('/user/kelas',
        [KelasController::class, 'userIndex'])
        ->name('user.kelas');

    Route::get('/peminjaman/create/{kelas_id}',
        [PeminjamanController::class, 'create'])
        ->name('peminjaman.create');

    Route::post('/peminjaman/store',
        [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');

    Route::get('/user/riwayat',
        [PeminjamanController::class, 'riwayat'])
        ->name('user.riwayat');

    Route::view('/user/profile', 'user.profile')
        ->name('user.profile');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard',
        [DashboardController::class, 'admin'])
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | GEDUNG
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'gedung',
        GedungController::class
    );

    /*
    |--------------------------------------------------------------------------
    | KELAS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'kelas',
        KelasController::class
    );

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'users',
        UserController::class
    );

    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'pengumuman',
        PengumumanController::class
    );

    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    Route::get('/peminjaman',
        [PeminjamanController::class, 'index'])
        ->name('admin.peminjaman');

    Route::put('/peminjaman/{id}/approve',
        [PeminjamanController::class, 'approve'])
        ->name('peminjaman.approve');

    Route::put('/peminjaman/{id}/reject',
        [PeminjamanController::class, 'reject'])
        ->name('peminjaman.reject');

    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN ONLY
    |--------------------------------------------------------------------------
    */

    Route::middleware(['superadmin'])
        ->group(function () {

        Route::resource(
            'fakultas',
            FakultasController::class
        );

        Route::get('/settings',
            [SettingController::class, 'edit'])
            ->name('settings.index');

        Route::put('/settings',
            [SettingController::class, 'update'])
            ->name('settings.update');

    });

});

require __DIR__.'/auth.php';