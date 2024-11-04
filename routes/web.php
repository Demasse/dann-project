<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProgController;
use App\Http\Controllers\UserController;
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

//Route::get("/", [CoursController::class,"index"])->name('index');
Route::get("/", [ModuleController::class,"index"])->name('index');

Route::get("/", [ModuleController::class,"index"])->name('index');

// Route::get('/home',[HomeController::class, 'index' ])->name('home');

//  Route::get('/begin',[HomeController::class, 'about' ])->name('about');

// Route::get('/begin',[CoursController::class, 'contact' ])->name('contact');


// Route::get("/", [ModuleController::class,"index"])->name('index');
 Route::get("/module/create", [ModuleController::class,"create"])->name('module.create');
 Route::get('/module/{cour}/show', [ModuleController::class, 'show'])->name('module.show');
 Route::post('/module/store', [ModuleController::class, 'store'])->name('module.store');
 //edit


Route::get('module/{cour}/edit', [CoursController::class, 'edit'])->name('module.edit');
Route::post('module/{cour}', [CoursController::class, 'update'])->name('module.update');



//login
Route::post('/login',[LoginController::class, 'login']);
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
// Route::post('/home',[LoginController::class, 'home'])->name('home');

//reg

Route::get('/register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);


// Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/cours',[HomeController::class, 'cours'])->name('cours.index');

Route::get('/home', [HomeController::class, 'emploi'])->name('home.emploi');
Route::get('/programme-cours', [ProgController::class, 'program'])->name('home.program');
Route::get('/cour', [HomeController::class, 'liste'])->name('cours.liste');
Route::get('/begin', [HomeController::class, 'acceuil'])->name('begin.acceuil');

Route::get('/utilisateurs', [UserController::class, 'user'])->name('user.index');
Route::put('/user/{id}/role', [UserController::class, 'updaterole'])->name('user.updaterole');
Route::get('/professeurs', [UserController::class, 'prof'])->name('user.prof');
Route::get('/etudiants', [UserController::class, 'etudiant'])->name('user.etudiant');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/user/{id}/show', [UserController::class, 'show'])->name('user.show');



// Route::get('/utilisateurs', [UserController::class, 'index'])->name('user.index');
// Route::get('/utilisateurs/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/utilisateurs', [UserController::class, 'store'])->name('user.store');
// Route::get('/utilisateurs/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/utilisateurs/{id}', [UserController::class, 'update'])->name('user.update');
// Route::delete('/utilisateurs/{id}', [UserController::class, 'destroy'])->name('user.delete');


//Route::resource('cours', CoursController::class,)->except('show')->names('cours');

