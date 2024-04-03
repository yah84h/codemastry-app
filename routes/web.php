<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\SectionsController;
use App\Http\Controllers\Dashboard\ProgramsController;
use App\Http\Controllers\Dashboard\Program_DetailsController;

Auth::routes();

//======================================== Website Pages =============================================
//Main Pages
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/getbitcoinprice', [App\Http\Controllers\HomeController::class, 'GetBitcoinPrice'])->name('getbitcoinprice');
//Sections Pages
Route::get('/sections', [App\Http\Controllers\HomeController::class, 'section'])->name('section');


//======================================== Dashboard Pages =============================================
//Index Dashboard Page
Route::get('/dashboard',[DashboardController::class,'index'])->name('index');
Route::get('/logout',[DashboardController::class,'logout'])->name('logout');

//Programs Page
Route::get('/dashboard/programs',[ProgramsController::class,'GetPrograms'])->name('programs');
Route::post('/dashboard/createprograms',[ProgramsController::class,'CreatePrograms'])->name('create-programs');
Route::get('/del_program/{id}',[ProgramsController::class,'DelPrograms'])->name('del_programs');
Route::get('/edit_program/{id}',[ProgramsController::class,'EditPrograms'])->name('edit_programs');
Route::post('/dashboard/update',[ProgramsController::class,'UpdateProgram'])->name('update-programs');
Route::post('/dashboard/search',[ProgramsController::class,'SearchProgram'])->name('search-programs');

//Program_Details Page
Route::get('/dashboard/program_details',[Program_DetailsController::class,'GetProgramDetails'])->name('program_details');
Route::post('/dashboard/create_program_details',[Program_DetailsController::class,'CreateProgramDetails'])->name('create_program_details');
Route::get('/del_program_details/{id}',[Program_DetailsController::class,'DelProgramDetails'])->name('del_program_details');

Route::get('/editprogramdetails/{id}',[Program_DetailsController::class,'EditProgramDetails'])->name('editprogramsdetails');
Route::post('/dashboard/update_program_details',[Program_DetailsController::class,'UpdateProgramDetails'])->name('update_program_details');
Route::post('/dashboard/search_program_details',[Program_DetailsController::class,'SearchProgramDetails'])->name('search_program_details');


//Sections Page
Route::get('/dashboard/sections',[SectionsController::class,'GetSections'])->name('sections');
Route::post('/dashboard/createـsections',[SectionsController::class,'CreateSections'])->name('create-sections');
Route::get('/del_section/{id}',[SectionsController::class,'DelSections'])->name('del_sections');
Route::get('/edit_section/{id}',[SectionsController::class,'EditSections'])->name('edit_sections');
Route::post('/dashboard/update_section',[SectionsController::class,'UpdateSection'])->name('update-sections');
Route::post('/dashboard/search_section',[SectionsController::class,'SearchSection'])->name('search-sections');



