<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardSyaratController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/registration', [AuthController::class, 'registration']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/alur_pendaftaran', [HomeController::class, 'alurpendaftaran']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/pendaftaran', PendaftaranController::class);
    Route::post('/pendaftaran/validasiterima', [PendaftaranController::class, 'validasiterima']);
    Route::post('/pendaftaran/validasitolak', [PendaftaranController::class, 'validasitolak']);
    Route::resource('/syarat', DashboardSyaratController::class);
    Route::resource('/user', UserController::class);
    Route::post('/user/konfirmasi', [UserController::class, 'konfirmasiuser']);
    Route::get('/profil', [UserController::class, 'profil']);
    Route::put('/editprofil/{user:id}/edit', [UserController::class, 'updateprofil']);
});
   

// Auth::routes();
// route::get('/informasia', function () {
//     $konfirmasi = DB::table('users')->where('users.id', (auth()->user()->id))->get();
//     $daftar = DB::table('upload_pendaftaran')->where('id_user', (auth()->user()->id))->paginate(1);
//     $limpah = DB::table('upload_pelimpahan')->where('id_user', (auth()->user()->id))->paginate(1);
//     $batalmg = DB::table('upload_pembatalanmeninggal')->where('id_user', (auth()->user()->id))->paginate(1);
//     return view('pages.informasi', [


//         'daftar' => $daftar,
//         'limpah' => $limpah,
//         'batalmg' => $batalmg,
//         'konfirmasi' => $konfirmasi

//     ]);
// });
// route::get('/alurpendaftarana', function () {
//     $konfirmasi = DB::table('users')->where('users.id', (auth()->user()->id))->get();
//     $daftar = DB::table('upload_pendaftaran')->where('id_user', (auth()->user()->id))->paginate(1);
//     $limpah = DB::table('upload_pelimpahan')->where('id_user', (auth()->user()->id))->paginate(1);
//     $batalmg = DB::table('upload_pembatalanmeninggal')->where('id_user', (auth()->user()->id))->paginate(1);
//     return view('pages.alur', [


//         'daftar' => $daftar,
//         'limpah' => $limpah,
//         'batalmg' => $batalmg,
//         'konfirmasi' => $konfirmasi

//     ]);
// });
// route::get('/informasi', function () {

//     return view('pages.informasi');
// });
// route::get('/alurpendaftaran', function () {

//     return view('pages.alur');
// });
// // Dashboard

// Route::resource('/dashboard/batal', DashboardBatalController::class)->middleware('auth');
// Route::resource('/dashboard/limpah', DashboardLimpahController::class)->middleware('auth');
// Route::resource('/upload/daftar', UploadpendaftaranController::class)->middleware('auth');
// Route::resource('/upload/limpah', UploadpelimpahanController::class)->middleware('auth');
// Route::resource('/upload/batalmg', UploadpembatalanmeninggalController::class)->middleware('auth');

// Route::resource('/home', DashboardController::class);
// Route::resource('/konfirmasi', KonfirmasiController::class)->middleware('auth');
