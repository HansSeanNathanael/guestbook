<?php

use App\Http\Controllers\ControllerKunjunganAdmin;
use App\Http\Controllers\ControllerKunjunganTamu;
use App\Http\Controllers\ControllerLoginAdmin;
use App\Http\Controllers\ControllerLogoutAdmin;
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

Route::middleware("guest")->group(function() {
    Route::get("/login", [ControllerLoginAdmin::class, "halamanLogin"])->name("halaman login");
    Route::post("/login", [ControllerLoginAdmin::class, "login"])->name("login");
});

Route::middleware("auth")->group(function() {
    Route::get("/dashboard", [ControllerKunjunganAdmin::class, "halamanDaftarKunjungan"])->name("halaman daftar kunjungan");
    Route::post("/kunjungan/status", [ControllerKunjunganAdmin::class, "ubahStatus"])->name("ubah status kunjungan");
    
    Route::post("/logout", [ControllerLogoutAdmin::class, "logout"])->name("logout");
});

Route::get("/", [ControllerKunjunganTamu::class, "halamanKunjunganBaru"])->name("halaman kunjungan tamu");
Route::post("/kunjungan/baru", [ControllerKunjunganTamu::class, "kunjunganBaru"])->name("kunjungan baru");