<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;



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
})->name('welcome');

Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index')->middleware('auth');

Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');

Route::get('user-create', [UserController::class, 'create'])->name('user.create');

Route::post('user-create', [UserController::class, 'store'])->name('user.store');

Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');

Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update')->middleware('auth');

Route::delete('etudiant-edit/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete')->middleware('auth');


// Route::get('query', [BlogPostController::class, 'query']);
// Route::get('blog-page', [BlogPostController::class, 'page'])->middleware('auth');
// Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
// Route::post('registration', [CustomAuthController::class, 'store']);
// Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('login', [CustomAuthController::class, 'login'])->name('login');
// Route::post('login', [CustomAuthController::class, 'authentication']);
// Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');