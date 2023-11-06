<?php

use App\Http\Controllers\DisplayDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FormController::class, 'showForm']);

Route::post('/submit_form', [FormController::class, 'submitForm']);

Route::get('/data_table', [DisplayDataController::class, 'displayDataTable']);
