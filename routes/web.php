<?php

use App\Http\Controllers\sosialmedia as ControllersSosialmedia;
use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\sosmed;
use App\Http\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ResetPassword as AuthResetPassword;
use App\Livewire\Daftarfriendships;
use App\Livewire\DaftarPengguna;
use App\Livewire\DetailPostingan;
use App\Livewire\Detailvideo;
use App\Livewire\Friendships;
use App\Livewire\Group;
use App\Livewire\HalamanAndaKenal;
use App\Livewire\HalamanRequest;
use App\Livewire\InformasiPribadi;
use App\Livewire\LikedBy;
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
use App\Livewire\Pertemenan;
use App\Livewire\Selebritis;

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
Route::get('/detailpostingan/{user}/{post}', DetailPostingan::class)->name('detailpostingan');

// halaman detail pertemanan 
Route::get('/pertemanan/{userId}', Pertemenan::class)->name('pertemanan');
Route::get('/request', HalamanRequest::class)->name('permintaan');


// halaman detail setting
Route::get('/informasiPribadi',InformasiPribadi::class)->name('informasiPribadi');


// halaman detail Mungkin Anda Kenal
Route::get('/allUser', HalamanAndaKenal::class)->name('mungkinAndaKenal');
// halaman detail 
Route::get('/allSelebritis', Selebritis::class)->name('selebritis');

// detail video
Route::get('/detailvideo/{user}/{post}', Detailvideo::class)->name('detailvideo');

//halaman detail like
Route::get('/like/{userId}', LikedBy::class)->name('like');


// halaman reset passwordF
use Illuminate\Support\Facades\Password;
Route::get('reset-password/{token}', AuthResetPassword::class)->name('password.reset');

//halaman chat
Route::middleware(['auth'])->group(function () {
    Route::get('/groups', [ChatGroupController::class, 'index']);
    Route::post('/groups', [ChatGroupController::class, 'store']);
    Route::post('/groups/{groupId}/add-member', [ChatGroupController::class, 'addMember']);
});
