<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('logout', [UserController::class, 'signOut']);



Route::group([
    'middleware'=>'api',
    'prefix'=>'auth',
], function($router){
    Route::post('register', [UserController::class, 'signUp']);
    Route::post('login', [UserController::class, 'signIn']);
    Route::middleware('auth:api')->post('logout', [UserController::class, 'signOut']);
    
    Route::middleware('auth:api')->apiResource('posts', PostController::class);
    Route::middleware('auth:api')->apiResource('likes', LikeController::class);
    Route::middleware('auth:api')->apiResource('comments', CommentController::class);
});

