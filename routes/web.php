<?php

use App\Models\Article;
use App\Http\Controllers\userInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemandbecoachController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

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
})->name('home');




// Route::get('/mjid', function () {
//     return view('welcome');
// });



// Route::get('/dashboard',[FoodController::class , 'index'])->middleware(['auth'])->name('dashboard');

// Route::middleware(['auth','admin'])->group(function () {
// route::get('/admin', [FoodController::class, 'index'])->name('dashboard');

// });













Route::middleware(['auth'])->group(function () {
// user routes
Route::middleware(['isUser'])->group(function () {
Route::get('/dashboard', function() { return view('user.dashboard');})->name('dashboard');
Route::get('/dashboard/profile', function() { return view('user.profile'); })->name('user.profile');
Route::get('/dashboard', [userInfo::class , 'index'])->name('dashboard');
Route::get('/dashboard/courses', [CourseController::class , 'index'])->name('searchCourses');
Route::get('/profile', [userInfo::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [userInfo::class, 'update'])->name('profile.update');
Route::put('/updatepassword', [userInfo::class, 'changepassword'])->name('updatePassword');
Route::delete('/profile', [userInfo::class, 'destroy'])->name('profile.destroy');
Route::get('/dashboard/course', [CourseController::class, 'search'])->name('user.searchcourse');
Route::get('/dashboard/coaches',[CoachController::class, 'index'])->name('searchCoaches');
Route::get('/dashboard/coach/{id}',[CoachController::class, 'show'])->name('showacoach');
Route::post('/dashboard/coach/book',[CoachController::class, 'store'])->name('booking');
Route::get('/dashboard/coach/search',[CoachController::class, 'search'])->name('searchcoach');
Route::get('/dashboard/course/{id}',[CourseController::class, 'show'])->name('viewCourse');
Route::post('/dashboard/applycoaching',[DemandbecoachController::class, 'store'])->name('applycoaching');
Route::get('/dashboard/applycoaching',[DemandbecoachController::class, 'index'])->name('applycoachingindex');
});
// admin routes
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin',[adminController::class, 'index'])->name('acceptcoach');
    Route::get('/admin/coaches',[adminController::class, 'acceptcoach'])->name('acceptcoach');

    Route::post('/admin/acceptcoach',[adminController::class, 'acceptandemailing'])->name('acceptcoach');
   
});
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// route::get('show/{id}', [FoodController::class, 'showw'])->name('showw');
});

// admin routes
Route::get('/admin/coaches', [adminController::class, 'redirectacceptcoachview'])->name('admin.coaches');

require __DIR__.'/auth.php';
