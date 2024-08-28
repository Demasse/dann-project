<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\ModuleController;
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

Route::get('cours/{cour}/show', [CoursController::class, 'show'])->name('cours.show');
Route::get('cours/{cour}/edit', [CoursController::class, 'edit'])->name('cours.edit');
Route::post('cours/{cour}', [CoursController::class, 'update'])->name('cours.update');
// Route::post('cours/{cour}/edit', [CoursController::class, 'edit']);
Route::get('cours/{cour}/delete', [CoursController::class, 'destroy'])->name('cours.delete');

Route::post('/cours', [CoursController::class, 'store'])->name('cours.store');
// Route::post('/cours/create', [CoursController::class, 'create'])->name('cours.create');

Route::get("/", [CoursController::class,"index"])->name('index');

// Route::get("/", [ModuleController::class,"index"])->name('index');
 Route::get("/module/create", [ModuleController::class,"create"])->name('module.create');
 Route::get('/module/{cour}/show', [ModuleController::class, 'show'])->name('module.show');
 Route::post('/module/store', [ModuleController::class, 'store'])->name('module.store');


//Route::resource('cours', CoursController::class,)->except('show')->names('cours');

