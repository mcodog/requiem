<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [MainController::class, 'index']);

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
    Route::post('/{id}/update', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
    Route::get('/{id}/delete', [ProductController::class, 'delete'])->name('products.delete')->middleware('auth');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index')->middleware('auth');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
    Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete')->middleware('auth');
});

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index')->middleware('auth');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create')->middleware('auth');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store')->middleware('auth');
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware('auth');
    Route::post('/{id}/update', [EmployeeController::class, 'update'])->name('employees.update')->middleware('auth');
    Route::get('/{id}/delete', [EmployeeController::class, 'delete'])->name('employees.delete')->middleware('auth');
});

Route::prefix('branch')->group(function () {
    Route::get('/', [BranchController::class, 'index'])->name('branch.index')->middleware('auth');
    Route::get('/create', [BranchController::class, 'create'])->name('branch.create')->middleware('auth');
    Route::post('/store', [BranchController::class, 'store'])->name('branch.store')->middleware('auth');
    Route::get('/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit')->middleware('auth');
    Route::post('/{id}/update', [BranchController::class, 'update'])->name('branch.update')->middleware('auth');
    Route::get('/{id}/delete', [BranchController::class, 'delete'])->name('branch.delete')->middleware('auth');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout']);

