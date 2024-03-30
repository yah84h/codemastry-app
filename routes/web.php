<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return view('index');
});




//Dashboard Pages
Route::get('/dashboard',[Dashboard::class,'index'])->name('index');
Route::get('/dashboard/programs',[Dashboard::class,'GetPrograms'])->name('programs');
Route::post('/dashboard/createprograms',[Dashboard::class,'CreatePrograms'])->name('create-programs');
Route::get('/del/{id}',[Dashboard::class,'DelPrograms'])->name('del');
Route::get('/edit/{id}',[Dashboard::class,'EditPrograms'])->name('edit');
Route::post('/dashboard/update',[Dashboard::class,'UpdateProgram'])->name('update-programs');
Route::post('/dashboard/search',[Dashboard::class,'SearchProgram'])->name('search-programs');






//Main Pages
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/section', [App\Http\Controllers\HomeController::class, 'section'])->name('section');


Auth::routes();
