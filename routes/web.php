<?php

use App\Http\Controllers\sosialmedia as ControllersSosialmedia;
use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\sosmed;
use App\Http\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ResetPassword as AuthResetPassword;
use App\Livewire\DaftarPengguna;
use App\Livewire\DetailPostingan;
use App\Livewire\Group;
use App\Livewire\InformasiPribadi;
use App\Livewire\LockPage;
use App\Livewire\Login;
use App\Livewire\Page;
use App\Livewire\Privat;
use App\Livewire\Profile;
use App\Livewire\Register;
// use App\Livewire\SosialMedia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.footer');
});
Route::get('/user', function () {
    return view('users.test');
});

// auth 
Route::get('/login', Login::class)->name('login');
Route::get('/registrasi', Register::class)->name('registrasi');
use App\Livewire\LoginWithPin;

Route::get('/login-pin', LoginWithPin::class)->name('login.pin');
Route::get('/private', function () {
    return view('private');
})->middleware('auth')->name('private');



// halaman page 
Route::get('/page', Page::class)->name('page');
Route::get('/profile', Profile::class)->name('profile');
Route::get('/bio', LockPage::class)->name('bio');
Route::get('/private', Privat::class)->name('private');
Route::get('/group', Group::class)->name('group');


//halaman detail
Route::get('/detailpengguna/{userId}',DaftarPengguna::class)->name('detailpengguna');
Route::get('/detailpostingan',DetailPostingan::class)->name('detailpostingan');

// halaman detail setting
Route::get('/informasiPribadi',InformasiPribadi::class)->name('informasiPribadi');


// halaman reset password
use Illuminate\Support\Facades\Password;
Route::get('reset-password/{token}', AuthResetPassword::class)->name('password.reset');

//halaman chat
Route::middleware(['auth'])->group(function () {
    Route::get('/groups', [ChatGroupController::class, 'index']);
    Route::post('/groups', [ChatGroupController::class, 'store']);
    Route::post('/groups/{groupId}/add-member', [ChatGroupController::class, 'addMember']);
});
