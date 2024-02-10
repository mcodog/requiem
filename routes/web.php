<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


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
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::get('/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('/{id}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
});

Route::prefix('branch')->group(function () {
    Route::get('/', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/create', [BranchController::class, 'create'])->name('branch.create');
    Route::post('/store', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    Route::post('/{id}/update', [BranchController::class, 'update'])->name('branch.update');
    Route::get('/{id}/delete', [BranchController::class, 'delete'])->name('branch.delete');
});

Route::get('/signin', [AuthController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
