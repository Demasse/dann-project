<?php

use App\Http\Controllers\CoursController;
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

Route::resource('cours', CoursController::class);

Route::get('cours/{cour}/edit', [CoursController::class, 'edit'])->name('cours.edit');
Route::get('cours/{cour}/delete', [CoursController::class, 'destroy'])->name('cours.delete');


Route::get("/", [CoursController::class,"index"])->name('index');


//Route::resource('cours', CoursController::class,)->except('show')->names('cours');

