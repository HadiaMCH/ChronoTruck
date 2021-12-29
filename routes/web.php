<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;
use App\Http\Controllers\acceuilController;
use App\Http\Controllers\annonceController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\inscriptionController;
use App\Http\Controllers\news_detailsController;
use App\Http\Controllers\presentationController;
use App\Http\Controllers\statistiquesController;

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

Route::get('/acceuil', [acceuilController::class,'index'])->name('acceuil');

Route::post('/acceuil', [acceuilController::class,'search'])->name('search');

Route::post('/annonce', [annonceController::class,'index'])->name('annonce');


Route::get('/presentation', [presentationController::class,'index'])->name('presentation');

Route::get('/news', [newsController::class,'index'])->name('news');
Route::get('/news/{id}', [news_detailsController::class,'index']);

Route::get('/statistiques', [statistiquesController::class,'index'])->name('statistiques');

Route::get('/contact', [contactController::class,'index'])->name('contact');

Route::get('/inscription', [inscriptionController::class,'index'])->name('inscription');

Route::post('/inscription', [inscriptionController::class,'add_user'])->name('add_user');

Route::post('/connexion', [connexionController::class,'check_user'])->name('check_user');

