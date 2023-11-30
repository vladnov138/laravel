<?php

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

Route::get('/users', [UserController::class, 'showUsers']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'addUser']);
Route::update('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::get('/users/{id}', [UserController::class, 'showUser']);

Route::get('/tags', [TagController::class, 'showTags']);
Route::get('/tags/create', [TagController::class, 'create']);
Route::post('/tags/create', [TagController::class, 'addTag']);
Route::update('/tags/{id}', [TagController::class, 'update']);
Route::delete('/tags/{id}', [TagController::class, 'delete']);
Route::get('/tags/{id}', [TagController::class, 'showTag']);

Route::get('/roles', [RoleController::class, 'showTags']);
Route::get('/roles/create', [RoleController::class, 'create']);
Route::post('/roles/create', [RoleController::class, 'addTag']);
Route::update('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'delete']);
Route::get('/roles/{id}', [RoleController::class, 'showTag']);

Route::get('/posts', [PostController::class, 'showTags']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/create', [PostController::class, 'addTag']);
Route::update('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'delete']);
Route::get('/posts/{id}', [PostController::class, 'showTag']);

// Route::get('/admin', [Controllers\AdminController::class, 'index']);