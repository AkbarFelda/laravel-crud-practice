<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return ("Hello World!");
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "Nama" => "Muhammad Akbar Felda",
        "Kelas" => "11 PPLG 2",
        "Image" => "images\Alhaitam.jpg"
    ]);
});


Route::group(["prefix" => "/student"], function () {
    Route::get('all', [StudentsController::class, 'index'])->name('student.all');
    Route::get('create', [StudentsController::class, 'create']);
    Route::get('add', [StudentsController::class, 'create']); // Mengarahkan ke fungsi 'create'
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::post('add', [StudentsController::class, 'store']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::delete('/destroy/{student}', [StudentsController::class, 'destroy']); // Menggunakan Route::delete
    Route::patch('/edit/{id}', [StudentsController::class, 'update'])->name('student.update');
});


Route::group(["prefix" => "/kelas"], function () {
    Route::get('all', [KelasController::class, 'index'])->name('kelas.all');
    Route::get('create', [KelasController::class, 'create']);
    Route::get('add', [KelasController::class, 'create']); // Redirect to 'create' function
    Route::get('/detail/{kelas}', [KelasController::class, 'show']);
    Route::post('add', [KelasController::class, 'store']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::delete('/destroy/{kelas}', [KelasController::class, 'destroy']); // Using Route::delete
    Route::patch('/edit/{id}', [KelasController::class, 'update'])->name('kelas.update');
});

Route::group(["prefix" => "/login"], function () {
    Route::get('index', [LoginController::class, 'index'])->name('login.index');
});

Route::group(["prefix" => "/register"], function () {
    Route::get('index', [RegisterController::class, 'index']);
    Route::post('store', [RegisterController::class, 'store']);
});
