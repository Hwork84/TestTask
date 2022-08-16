<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\PublicationController::class, 'index'])->name('show_create');
Route::post('/save', [App\Http\Controllers\PublicationController::class, 'store'])->name('save_post');
Route::get('/edit/{id}', [App\Http\Controllers\PublicationController::class, 'edit'])->name('edit_post');
Route::get('/delete/{id}', [App\Http\Controllers\PublicationController::class, 'destroy'])->name('delete_post');
Route::get('/view/{id}', [App\Http\Controllers\PublicationController::class, 'show'])->name('view_post');
