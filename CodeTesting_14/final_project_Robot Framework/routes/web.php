<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('dashboard');
Route::get('/aboutus', [FrontendController::class, 'aboutus']);
Route::get('/reservasi', [FrontendController::class, 'reservasi']);
Route::delete('/reservasiii/{id}',[FrontendController::class, 'delete'])->name('delete.reservasi');
Route::get('/pesanan', [FrontendController::class, 'pesanan'])->name('pesanan');
Route::post('/tambahpesanan', [FrontendController::class, 'tambahpesanan'])->name('tambahpesanan');
Route::get('/menu/{slug}',[FrontendController::class,'Kategori'])->name('kategori');
Route::get('/User/Feedback', [FeedbackController::class, 'UserFeedback'])->name('user.feedback');

Route::group(['middleware' => 'admin'], function () {
    // Admin routes
    Route::get('/Admin/welcome', [AdminController::class, 'show'])->name('show.count');
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    //mengirim data ke database atau tambah data
    Route::post('/kategori', [KategoriController::class, 'store']);

    Route::get('/all/pesanan', [FrontendController::class, 'AllPesanan'])->name('all.pesanan');
    Route::get('/all/pesanan/{id}', [FrontendController::class, 'statuspemesanan'])->name('status');
    Route::put('/admin/notifications/{notificationId}/mark-read', [AdminController::class, 'markNotificationAsRead'])->name('mark.notification.read');


    //read kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    //menampilkan detail kategori berdasarkan id
    Route::get('/kategori/{kategori_id}', [KategoriController::class, 'show']);

    //Update kategori
    Route::get('/kategori/{kategori_id}/edit', [KategoriController::class, 'edit']);
    //update data ke dalam database berdasarkan id
    Route::put('/kategori/{kategori_id}', [KategoriController::class, 'update']);

    //Delete kategori
    Route::delete('/kategori/{kategori_id}', [KategoriController::class, 'destroy']);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::put('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');

    Route::resource('post', PostController::class);

});
Route::group(['middleware' => 'pelanggan'], function () {
    // Admin routes
    Route::get('/pesanan', [FrontendController::class, 'pesanan'])->name('pesanan');
    Route::delete('/pesanan/{id}', [FrontendController::class, 'deletePesanan'])->name('delete.pesanan');
    Route::post('/User/komentar', [FeedbackController::class, 'Komentar'])->name('komentar');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

    Route::get('/home/mark-as-read/{notificationId}', [FrontendController::class, 'markAsReadPelanggan'])->name('home.markAsReadPelanggan');

});


Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//CRUD KATEGORI
//create kategori
