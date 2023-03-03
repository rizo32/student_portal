<?php

use Illuminate\Support\Facades\Route;

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
});

use App\Http\Controllers\EtudiantController;

Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');

Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');

// Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store'); // pas obligatoire parce qu'on redirige vers une autre vue 

// Route::get('etudiant-edit/{etudiantPost}', [EtudiantController::class, 'edit'])->name('etudiant.edit');

// Route::put('etudiant-edit/{etudiantPost}', [EtudiantController::class, 'update'])->name('etudiant.update');

// Route::delete('etudiant-edit/{etudiantPost}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');