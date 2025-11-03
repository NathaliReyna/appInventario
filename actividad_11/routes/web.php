<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acceso denegado');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/empleado', function () {
        if (auth()->user()->role !== 'empleado') {
            abort(403, 'Acceso denegado');
        }
        return view('empleado.dashboard');
    })->name('empleado.dashboard');
});
