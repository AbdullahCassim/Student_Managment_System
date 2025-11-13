<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/students/create', [AdminController::class, 'create'])->name('students.create');
Route::post('/students', [AdminController::class, 'store'])->name('students.store');

Route::get('/students/{id}/edit', [AdminController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [AdminController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [AdminController::class, 'destroy'])->name('students.destroy');