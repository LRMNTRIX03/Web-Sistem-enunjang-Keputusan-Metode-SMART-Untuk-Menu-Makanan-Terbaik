<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PerhitunganController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('data/password/reset', [AuthController::class, 'resetPassword'])->name('password.default');

Route::middleware(('custom'))->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    //alternatif Routes
    Route::get('data/alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
    Route::get('data/alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
    Route::post('data/alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');
    Route::get('data/alternatif/{alternatif}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
    Route::get('data/alternatif/{alternatif}/', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
    Route::post('data/alternatif/{alternatif}/update', [AlternatifController::class, 'update'])->name('alternatif.update');
    Route::get('data/alternatif/{alternatif}/detail', [AlternatifController::class, 'detail'])->name('alternatif.detail');
    //menu Routes
    Route::get('data/Menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('data/Menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('data/Menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('data/Menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('data/Menu/{menu}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::get('data/Menu/{menu}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
    //kriteria Routes
    Route::get('data/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('data/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('data/kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('data/kriteria/{kriteria}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::post('data/kriteria/{kriteria}/update', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::get('data/kriteria/{kriteria}/', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
    //Perhitungan atau Matrix Routes
    Route::get('data/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::post('data/perhitungan/store', [PerhitunganController::class, 'store'])->name('perhitungan.store');
    Route::get('data/perhitungan/{perhitungan}/', [PerhitunganController::class, 'destroy'])->name('perhitungan.destroy');
   Route::post('data/perhitungan/{id}/proses', [PerhitunganController::class, 'proses'])->name('perhitungan.proses');
    Route::get('data/perhitungan/{id}/hasil', [PerhitunganController::class, 'hasil'])->name('perhitungan.hasil');
    //Export PDF
    Route::get('data/perhitungan/{id}/export-pdf', [PerhitunganController::class, 'exportPdf'])->name('perhitungan.export-pdf');
    //PasswordManagement
    Route::get('data/password', [AuthController::class, 'PasswordView'])->name('password.index');
    Route::post('data/password/update', [AuthController::class, 'ChangePassword'])->name('password.update');

    
    
});


