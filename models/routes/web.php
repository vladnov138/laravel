<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
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

Route::get('/', [UserController::class, 'showUsers']);
Route::get('/users', [UserController::class, 'showUsers']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'addUser']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::get('/users/{id}', [UserController::class, 'showUser']);

Route::get('/tags', [TagController::class, 'showTags']);
Route::get('/tags/create', [TagController::class, 'create']);
Route::post('/tags/create', [TagController::class, 'addTag']);
Route::get('/tags/{id}/edit', [TagController::class, 'edit']);
Route::put('/tags/{id}', [TagController::class, 'update']);
Route::delete('/tags/{id}', [TagController::class, 'delete']);
Route::get('/tags/{id}', [TagController::class, 'showTag']);

Route::get('/users/{user_id}/posts', [PostController::class, 'showPosts']);
Route::get('/users/{user_id}/posts/create', [PostController::class, 'create']);
Route::post('/users/{user_id}/posts/create', [PostController::class, 'addPost']);
Route::put('/users/{user_id}/posts/{post_id}', [PostController::class, 'update']);
Route::get('/users/{user_id}/posts/{post_id}/edit', [PostController::class, 'edit']);
Route::delete('/users/{user_id}/posts/{post_id}', [PostController::class, 'delete']);
Route::get('/users/{user_id}/posts/{post_id}', [PostController::class, 'showPost']);

Route::get('/json/users', [UserController::class, 'showResources']);
Route::get('/json/posts', [PostController::class, 'showResources']);