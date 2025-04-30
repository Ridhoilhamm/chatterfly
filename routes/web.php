<?php


use App\Http\Controllers\ChatGroupController;
use App\Livewire\Admin\ListPertemenan;
use App\Livewire\Anggotagrup;
use App\Livewire\ArsipPostingan;
use App\Livewire\Arsippostinganall;
use App\Livewire\Auth\ResetPassword as AuthResetPassword;
use App\Livewire\Bandinglaporan;
use App\Livewire\DaftarPengguna;
use App\Livewire\Detailgrupchat;
use App\Livewire\DetailPostingan;
use App\Livewire\Detailpostinganpribadi;
use App\Livewire\Detailprivatechat;
use App\Livewire\Detailtagpostingan;
use App\Livewire\Detailvideo;
use App\Livewire\Dibagikan;
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
use App\Livewire\Riwayattag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});


// auth 
Route::get('/login', Login::class)->name('login');
Route::get('/registrasi', Register::class)->name('registrasi');

use App\Livewire\LoginWithPin;
use App\Livewire\Pertemenan;
use App\Livewire\Privatedetail;
use App\Livewire\Selebritis;
use App\Livewire\Uploadfoto;
use Illuminate\Support\Facades\Broadcast;
use PhpParser\Node\Expr\PostDec;

Route::get('/login-pin', LoginWithPin::class)->name('login.pin');
Route::get('/private', function () {
    return view('private');
})->middleware('auth')->name('private');


// halaman page 
Route::get('/page', Page::class)->name('page')->middleware('auth');
Route::get('/profile', Profile::class)->name('profile')->middleware('auth');
Route::get('/bio', LockPage::class)->name('bio')->middleware('auth');
Route::get('/private', Privat::class)->name('private')->middleware('auth');
Route::get('/group', Group::class)->name('group')->middleware('auth');

//halaman detail
Route::get('/detailpengguna/{userId}', DaftarPengguna::class)->name('detailpengguna');
Route::get('/detailpostingan/{user}/{post}', DetailPostingan::class)->name('detailpostingan');
Route::get('/detailpostinganpribadi/{user}/{post}', Detailpostinganpribadi::class)->name('detailpostinganpribadi');

// halaman detail tag
Route::get('/post/{post}', Detailtagpostingan::class)->name('post.detail');
// Route::get('/laporkan',ReportPost::class)->name('laporkan');

// halaman detail pertemanan 
Route::get('/pertemanan/{userId}', Pertemenan::class)->name('pertemanan');
Route::get('/request', HalamanRequest::class)->name('permintaan');

// halaman detailchat
Route::get('/detailchat', Detailprivatechat::class)->name('detailchat');
Route::get('/detailchatgroup', Detailgrupchat::class)->name('detailchatgroup');
Route::get('/anggotagroup', Anggotagrup::class)->name('anggotagroup');

// halaman detail setting
Route::get('/informasiPribadi', InformasiPribadi::class)->name('informasiPribadi');

// halaman detail Mungkin Anda Kenal
Route::get('/allUser', HalamanAndaKenal::class)->name('mungkinAndaKenal');
// halaman detail 
Route::get('/allSelebritis', Selebritis::class)->name('selebritis');

// detail video
Route::get('/detailvideo/{user}/{post}', Detailvideo::class)->name('detailvideo');

//halaman detail like
Route::get('/like/{userId}', LikedBy::class)->name('like');

//Riwayat Tag 
Route::get('/tag', Riwayattag::class)->name('tag');

// halaman riwayat detailprivatechat
Route::get('/detailprivate', Privatedetail::class)->name('detailprivate');

// halaman laporan akan postingan kita
Route::get('/laporan', Bandinglaporan::class)->name('laporan');


//halaman action unarsip & delete postingan
Route::get('/arsippostingan', ArsipPostingan::class)->name('arsippostingan');

// halamanarsipostingan
Route::get('/listarsippostingan', Arsippostinganall::class)->name('listarsippostingan');

// halaman dibagikan postingan
Route::get('/dibagikan', Dibagikan::class)->name('dibagikan');

// halaman reset passwordF
use Illuminate\Support\Facades\Password;

Route::get('reset-password/{token}', AuthResetPassword::class)->name('password.reset');
Route::get('upload', Uploadfoto::class)->name('upload');
// Route::get('foto', PostCard::class)->name('foto');

//halaman chat
Route::middleware(['auth'])->group(function () {
    Route::get('/groups', [ChatGroupController::class, 'index']);
    Route::post('/groups', [ChatGroupController::class, 'store']);
    Route::post('/groups/{groupId}/add-member', [ChatGroupController::class, 'addMember']);
});


// list pertemanan admin


Route::get('/test', ListPertemenan::class)->name('test');
