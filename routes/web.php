<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TipeRoomController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('pages.users.home');
})->name('user.home');
Route::get('/about', function () {
    return view('pages.users.about_us');
})->name('user.home');
Route::get('/contact-us', function () {
    return view('pages.users.kontak');
})->name('user.home');

Route::get('/rooms', [App\Http\Controllers\UserRoomController::class, 'index'])->name('user.rooms.index');

// Available rooms for booking
Route::get('/rooms/available', [App\Http\Controllers\UserRoomController::class, 'available'])->name('user.rooms.available');

// Rooms by type
Route::get('/rooms/type/{typeId}', [App\Http\Controllers\UserRoomController::class, 'getByType'])->name('user.rooms.by_type');

// Search rooms
Route::get('/rooms/search', [App\Http\Controllers\UserRoomController::class, 'search'])->name('user.rooms.search');

// Featured rooms (for homepage)
Route::get('/featured-rooms', [App\Http\Controllers\UserRoomController::class, 'featured'])->name('user.rooms.featured');

// Show specific room details (this must come after other /rooms/... routes)
Route::get('/rooms/{id}', [App\Http\Controllers\UserRoomController::class, 'show'])->name('user.rooms.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'register'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/gallery', [GalleryController::class, 'indexUser'])->name('gallery.index');

Route::middleware(['auth'])->group(function () {
    // User reservation routes
    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');  // Add this line
    Route::get('/reservasi/create/{room}', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');
    Route::patch('/reservasi/{id}/cancel', [ReservasiController::class, 'cancel'])->name('reservasi.cancel');
    Route::get('/reservasi-saya', [ReservasiController::class, 'riwayat'])->name('reservasi.riwayat');

    Route::post('/reservasi/check-availability', [ReservasiController::class, 'checkAvailability'])->name('reservasi.checkAvailability');

    Route::get('/reservasi-user', [PembayaranController::class, 'index'])->name('reservasi.user');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

Route::get('/featured-rooms', [App\Http\Controllers\UserRoomController::class, 'featured'])->name('user.rooms.featured');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('tiperoom', TipeRoomController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('rooms', RoomController::class);
    Route::get('rooms/available', [RoomController::class, 'available'])->name('rooms.available');
    Route::post('rooms/{id}/change-status', [RoomController::class, 'changeStatus'])->name('rooms.changeStatus');
    Route::get('rooms/type/{typeId}', [RoomController::class, 'getByType'])->name('rooms.byType');
    Route::resource('users', UserController::class);

    Route::get('/reservasi', [ReservasiController::class, 'adminIndex'])->name(name: 'reservasi.index');
    Route::get('/reservasi/statistik', [ReservasiController::class, 'statistik'])->name('reservasi.statistik');
    Route::get('/reservasi/laporan', [ReservasiController::class, 'laporan'])->name('reservasi.laporan');

    Route::get('/reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');

    // Status management
    Route::put('/reservasi/{id}/status', [ReservasiController::class, 'updateStatus'])->name('reservasi.updateStatus');
    Route::patch('/reservasi/{id}/checkin', [ReservasiController::class, 'checkin'])->name('admin.reservasi.checkin');
    Route::patch('/reservasi/{id}/checkout', [ReservasiController::class, 'checkout'])->name('admin.reservasi.checkout');

    Route::get('/pembayaran', [PembayaranController::class, 'adminIndex'])->name('pembayaran.index');

    // Route untuk update status pembayaran (admin)
    Route::patch('/pembayaran/{id}/status', [PembayaranController::class, 'updateStatus'])->name('admin.pembayaran.update-status');
});
