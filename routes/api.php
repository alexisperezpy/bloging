<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['prefix' => '/v1'], function () {
    Route::get('articles',[ArticleController::class,'index']);
    Route::get('articles/{article}',[ArticleController::class,'show']);
    Route::post('articles',[ArticleController::class,'store']);
    Route::put('articles/{article}',[ArticleController::class,'update']);
    Route::delete('articles/{article}',[ArticleController::class,'delete']);
});