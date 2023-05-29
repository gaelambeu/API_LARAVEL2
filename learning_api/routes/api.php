<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Récupérer la liste des posts
Route::get('posts', [PostController::class, 'index']);

//  Ajouter un post(ajout)
Route::post('posts/create', [PostController::class, 'store']);
Route::put('posts/edit/{post}', [PostController::class, 'update']);
Route::delete('posts/{post}', [PostController::class, 'delete']);

// Inscrire un nouvel utilisateur
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
