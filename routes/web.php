<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\infoGrafikaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\FrondController;
use \App\Http\Controllers\PositionController;
use \App\Http\Controllers\empCategoryController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\HomePageImageTag;









// routes/web.php
Route::get('/lang/{locale}', function ($locale) {
    session(['lang' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
});




Route::get('schooltack', [FrondController::class,'schoolTack'])->name('schooltack');
Route::get('leadershep', [FrondController::class,'leaderShep'])->name('leaderShep');
Route::get('teachers', [FrondController::class,'teachers'])->name('teachers');
Route::get('rekvizit', [FrondController::class,'rekvizit'])->name('rekvizit');
Route::get('education', [FrondController::class,'education'])->name('education');
Route::get('/newsDetail/{id}', [FrondController::class, 'newsDetail'])->name('newsDetail');
Route::get('/educationDetail/{id}', [FrondController::class, 'educationDetail'])->name('educationDetail');
Route::get('usefulresurs', [FrondController::class,'usefulresurs'])->name('usefulresurs');
Route::get('/schoolNews',[FrondController::class,'schoolNews'])->name('schoolNews');
Route::get('/education/category/{category}', [FrondController::class, 'educationByCategory'])->name('education.category');
Route::get('Gallery', [FrondController::class,'Gallery'])->name('Gallery');
Route::get('infoGrafika', [FrondController::class,'infoGrafika'])->name('infoGrafika');
Route::get('connect', [FrondController::class,'connect'])->name('connect');
Route::post('SendEmail', [FrondController::class,'SendEmail'])->name('SendEmail');
Route::get('LeaderShepDatail', [FrondController::class,'LeaderShepDatail'])->name('LeaderShepDatail');
Route::get('/', [FrondController::class, 'index'])->name('index');
Route::get('/teachers/search', [EmployeeController::class, 'search'])->name('teachers.search');
Route::get('/education/search', [FrondController::class, 'educationSearch'])->name('education.search');
Route::get('education/connect', [FrondController::class, 'connect'])->name('education.connect');
// web.php




Route::get('/search-posts', [FrondController::class, 'searchPosts'])->name('search.posts');










Route::get('/useful-resources/{resource}', [FrondController::class, 'usefulResourceDetail'])
    ->name('useful-resources.detail');


Route::post('ckeditor/upload', [\App\Http\Controllers\CKEditorController::class, 'upload'])->name('admin.ckeditor.upload');


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('admin.dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('position', PositionController::class);
    Route::resource('empCategory', empCategoryController::class);
    Route::resource('CategoryTop', \App\Http\Controllers\CategoryTop::class);
    Route::resource('posts', \App\Http\Controllers\PostsController::class);
    Route::resource('statictik', \App\Http\Controllers\StatictikController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('infografika', infoGrafikaController::class);
    Route::resource('smenatype', \App\Http\Controllers\SmenaTypeController::class);
    Route::resource('schedule', \App\Http\Controllers\SchudeliController::class);
    Route::resource('lesson', \App\Http\Controllers\LessonController::class);
    Route::resource('usefulResource', \App\Http\Controllers\UserfulController::class);
    Route::resource('HomePageImageTag', \App\Http\Controllers\HomePageImageTagController::class);



    Route::resource('categorychildren', \App\Http\Controllers\ChildrenCategoryController::class);








});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
