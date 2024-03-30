<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return view('index');
});




//Dashboard Pages
//Index Page
Route::get('/dashboard',[Dashboard::class,'index'])->name('index');

//Programs Page
Route::get('/dashboard/programs',[Dashboard::class,'GetPrograms'])->name('programs');
Route::post('/dashboard/createprograms',[Dashboard::class,'CreatePrograms'])->name('create-programs');
Route::get('/del_program/{id}',[Dashboard::class,'DelPrograms'])->name('del_programs');
Route::get('/edit_program/{id}',[Dashboard::class,'EditPrograms'])->name('edit_programs');
Route::post('/dashboard/update',[Dashboard::class,'UpdateProgram'])->name('update-programs');
Route::post('/dashboard/search',[Dashboard::class,'SearchProgram'])->name('search-programs');

//Sections Page
Route::get('/dashboard/sections',[Dashboard::class,'GetSections'])->name('sections');
Route::post('/dashboard/createـsections',[Dashboard::class,'CreateSections'])->name('create-sections');
Route::get('/del_section/{id}',[Dashboard::class,'DelSections'])->name('del_sections');
Route::get('/edit_section/{id}',[Dashboard::class,'EditSections'])->name('edit_sections');
Route::post('/dashboard/update_section',[Dashboard::class,'UpdateSection'])->name('update-sections');
Route::post('/dashboard/search_section',[Dashboard::class,'SearchSection'])->name('search-sections');



//Main Pages
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/section', [App\Http\Controllers\HomeController::class, 'section'])->name('section');


Auth::routes();
