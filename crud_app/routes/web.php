<?php

use App\Http\Controllers\CrudController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('/fetch', function () {
//     return view('fetch');
// });

Route::get('/',[CrudController::class,'main']);
Route::get('/index',[CrudController::class,'index']);
Route::get('/fetch',[CrudController::class,'fetch']);
Route::get('/data',[CrudController::class,'showData']);
Route::get('/test',[CrudController::class,'mTest']);
Route::get('/form',[CrudController::class,'displayForm'])->name("form.create");
Route::post('/save',[CrudController::class,'saveForm'])->name("form.save");



