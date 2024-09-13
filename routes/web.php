<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;

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



Route::get('/',[HomeController::class,'homepage'])->name('homepage');
Route::get('/artical/{id}',[HomeController::class,'viewpost'])->name('viewpost');
Route::get('/category',[HomeController::class,'categorypage'])->name('categorypage');
Route::get('/category/{slug}',[HomeController::class,'categoryviewpage'])->name('categoryviewpage');
Route::get('/tag',[HomeController::class,'tagpage'])->name('tagpage');
Route::get('/tag/{slug}',[HomeController::class,'tagviewpage'])->name('tagviewpage');
Route::get('/about',[HomeController::class,'aboutpage'])->name('aboutpage');
Route::get('/legal',[HomeController::class,'legalpage'])->name('legalpage');
Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::resource('/admin/post', PostController::class)->middleware('auth');
Route::resource('/admin/category', CategoryController::class)->middleware('auth');
Route::resource('/admin/tag', TagController::class)->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
