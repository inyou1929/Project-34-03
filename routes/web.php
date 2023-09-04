<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Product As ProductController;

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

Route::get('/about',function(){ 
    return "หน้าเกี่ยวกับเรา";
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard/product', [ProductController::class, 'index'])
->middleware(['auth'])->name('dashboard.product');

Route::get('dashboard/product/create', [ProductController::class, 'create'])
->middleware(['auth'])->name('dashboard.product.create');

Route::post('dashboard/product/insert', [ProductController::class, 'insert'])
->middleware(['auth'])->name('dashboard.product.insert');

Route::post('dashboard/product/{id}/update', [ProductController::class, 'update'])
->middleware(['auth'])->name('dashboard.product.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
