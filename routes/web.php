<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;



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


// Student
Route::get('student', [StudentController::class, 'index'])->name('student.index')->middleware('auth');

Route::get('student/{student}', [StudentController::class, 'show'])->name('student.show')->middleware('auth');

Route::get('student-edit/{student}', [StudentController::class, 'edit'])->name('student.edit')->middleware('auth');

Route::put('student-edit/{student}', [StudentController::class, 'update'])->name('student.update')->middleware('auth');

Route::delete('student-edit/{student}', [StudentController::class, 'destroy'])->name('student.delete')->middleware('auth');

// User
Route::get('user-create', [UserController::class, 'create'])->name('user.create');

Route::post('user-create', [UserController::class, 'store'])->name('user.store');

// Article
Route::get('article', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');

Route::get('user-article', [ArticleController::class, 'userArticle'])->name('article.userArticle')->middleware('auth');

Route::get('article/{article}/{language_id}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');

Route::get('article-edit/{article_id}/{language_id}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');

Route::get('article-create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');

Route::post('article-create', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');

Route::put('article-edit/{article_id}/{language_id}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');

Route::delete('article-edit/{article}/{language_id}', [ArticleController::class, 'destroy'])->name('article.delete')->middleware('auth');


// Document


// Localization

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');




// Route::get('query', [BlogPostController::class, 'query']);
// Route::get('blog-page', [BlogPostController::class, 'page'])->middleware('auth');
// Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
// Route::post('registration', [CustomAuthController::class, 'store']);
// Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');