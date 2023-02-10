<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
Route::get('/mjid', function () {
    return view('welcome');
});



// Route::get('/dashboard',[FoodController::class , 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','admin'])->group(function () {
route::get('/admin', [FoodController::class, 'index'])->name('dashboard');
route::get('/admin/create', [FoodController::class, 'create'])->name('create');
route::get('/admin/edit/{id}', [FoodController::class, 'edit'])->name('edit');
route::get('/admin/destroy/{id}', [FoodController::class, 'destroy'])->name('destroy');
route::get('/admin/show/{id}', [FoodController::class, 'show'])->name('show');
route::put('/admin/update/{id}', [FoodController::class, 'update'])->name('update');
route::put('/admin/store', [FoodController::class, 'store'])->name('store');
route::get('/addadmin', [ProfileController::class, 'addAdmin'])->name('addadmin');
route::get('/days', [DaysController::class, 'foodstime'])->name('days');
route::put('/storeadmin', [ProfileController::class, 'storeAdmin'])->name('storeAdmin');
route::put('/daysadded', [DaysController::class, 'store'])->name('adddaysandfood');
});

Route::middleware('auth')->group(function () {
Route::get('/foods' ,[FoodController::class, 'index2'])->name('foods');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
route::get('show/{id}', [FoodController::class, 'showw'])->name('showw');

});
require __DIR__.'/auth.php';
