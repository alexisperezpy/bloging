<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([
        'prefix' => '/v1',
        'middleware' => 'api'
    ], function ($router) {
    Route::post('register',[AuthController::class,'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [AuthController::class, 'me']);
    
    Route::get('articles',[ArticleController::class,'index']);
    Route::get('articles/{article}',[ArticleController::class,'show']);
    Route::post('articles',[ArticleController::class,'store']);
    Route::put('articles/{article}',[ArticleController::class,'update']);
    Route::delete('articles/{article}',[ArticleController::class,'delete']);
});