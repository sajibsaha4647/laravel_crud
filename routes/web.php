<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class,"index"]);
Route::post('/upload', [HomeController::class,"uploaded"]);
Route::get('/view', [HomeController::class,"view"]);
Route::get('/delete/{id}', [HomeController::class,"delete"]);
Route::get('/singleview/{id}', [HomeController::class,"singleView"]);
Route::get('/search', [HomeController::class,"search"]);
Route::post('/update/{id}', [HomeController::class,"update"]);
