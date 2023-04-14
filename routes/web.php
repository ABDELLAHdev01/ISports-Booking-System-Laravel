<?php

use App\Mail\TestEmail;
use App\Models\Article;
use App\Http\Controllers\userInfo;
use App\Http\Middleware\isQuizDone;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemandbecoachController;
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


// ga3 satat bnat nass 

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
    Route::put('/updatepassword', [userInfo::class, 'changepassword'])->name('updatePassword');
Route::delete('/profile', [userInfo::class, 'destroy'])->name('profile.destroy');
// user routes
Route::middleware(['isUser'])->group(function () {
Route::get('/quiz', function() { return view('user.quiz');})->name('quiz'); 
Route::post('/quizend', [userInfo::class, 'quizend'])->name('quizzdone');  
// Route::get('/dashboard',[userInfo::class, 'Dashboarding'])->name('dashboard');
Route::get('/dashboard/profile', function() { return view('user.profile'); })->name('user.profile');
Route::get('/dashboard', [userInfo::class , 'index'])->name('dashboard');
Route::get('/dashboard/courses', [CourseController::class , 'index'])->name('searchCourses');
Route::get('/profile', [userInfo::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [userInfo::class, 'update'])->name('profile.update');
Route::get('/dashboard/course', [CourseController::class, 'search'])->name('user.searchcourse');
Route::get('/dashboard/coaches',[CoachController::class, 'index'])->name('searchCoaches');
Route::get('/dashboard/coach/{id}',[CoachController::class, 'show'])->name('showacoach');
Route::post('/dashboard/coach/book',[CoachController::class, 'store'])->name('booking');
Route::post('/dashboard/coach/search',[CoachController::class, 'search'])->name('searchingfoacoach');
Route::get('/dashboard/course/{id}',[CourseController::class, 'show'])->name('viewCourse');
Route::post('/dashboard/applycoaching',[DemandbecoachController::class, 'store'])->name('applycoaching');
Route::get('/dashboard/applycoaching',[DemandbecoachController::class, 'index'])->name('applycoachingindex');
Route::post('/dashboard/addcpmment', [CommentController::class ,'store'])->name('addcomment');
Route::post('/dashboard/deletecomment/}', [CommentController::class ,'deleteComment'])->name('deletecomment');
});
// admin routes
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin',[adminController::class, 'index'])->name('acceptcoachh');
    Route::get('/admin/coaches',[adminController::class, 'acceptcoach'])->name('acceptcoaching');
    Route::post('/admin/rejectcoach',[adminController::class, 'rejectcoach'])->name('rejectcoach');
    Route::post('/admin/acceptcoach',[adminController::class, 'acceptandemailing'])->name('acceptcoach');
    Route::get('/admin/allcoaches',[adminController::class, 'showallcoaches'])->name('showcoach');
    Route::get('/admin/coaches/{id}',[adminController::class, 'destroy'])->name('deletecoach');
    Route::get('/admin/courses',[adminController::class, 'showCourses'])->name('showCourses');
    Route::get('/admin/course/{id}',[adminController::class, 'deleteCourse'])->name('deleteCourse');
   
});


// coach routes
Route::middleware(['isCoach'])->group(function () {
    Route::get('/coach',[coachController::class, 'dashboard'])->name('dashboard.coach');
    Route::get('/coach/accept/{id}',[coachController::class, 'acceptBooking'])->name('accept');
    Route::get('/coach/reject/{id}',[coachController::class, 'rejectBooking'])->name('reject');
    Route::get('/coach/addcourse',[coachController::class, 'addcourse'])->name('addcourse');
    Route::get('/coach/mycourses',[coachController::class, 'mycourses'])->name('mycourses');
    Route::post('/coach/addcourse',[coachController::class, 'addacourse'])->name('storecourse');
    Route::get('/coach/mycourses/{id}',[coachController::class, 'deletecourse'])->name('deletecourse');
    Route::post('/coach/mycourses/edit',[coachController::class, 'editcourse'])->name('editcourse');
    Route::get('/coach/editprofile',[coachController::class, 'editcoach'])->name('edittheprofile');
    Route::post('/coach/editprofile',[coachController::class, 'updatecoach'])->name('updatecoach');
    // update route
    Route::post('/coach/mycourses/update',[coachController::class, 'updatecourse'])->name('updatecourse');
    
    
   
});
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// route::get('show/{id}', [FoodController::class, 'showw'])->name('showw');
});

// admin routes
Route::get('/admin/coaches', [adminController::class, 'redirectacceptcoachview'])->name('admin.coaches');

require __DIR__.'/auth.php';
