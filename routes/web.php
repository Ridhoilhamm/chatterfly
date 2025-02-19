<?php

use App\Http\Controllers\sosialmedia as ControllersSosialmedia;
use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\sosmed;
use App\Livewire\DaftarPengguna;
use App\Livewire\LockPage;
use App\Livewire\Login;
use App\Livewire\Page;
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


// halaman page 
Route::get('/page', Page::class)->name('page');
Route::get('/profile', Profile::class)->name('profile');
Route::get('/bio', LockPage::class)->name('bio');

//halaman detail
Route::get('/detailpengguna/{userId}',DaftarPengguna::class)->name('detailpengguna');


// halaman chat
Route::middleware(['auth'])->group(function () {
    Route::get('/groups', [ChatGroupController::class, 'index']);
    Route::post('/groups', [ChatGroupController::class, 'store']);
    Route::post('/groups/{groupId}/add-member', [ChatGroupController::class, 'addMember']);
});
