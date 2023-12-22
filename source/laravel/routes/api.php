<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ModelCarController,
    ColorController,
};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('/cores/{id}', [ColorController::class, 'destroy']);
Route::put('/cores/{id}', [ColorController::class, 'update']);
Route::post('/cores', [ColorController::class, 'store']);
Route::get('/cores/{id}', [ColorController::class, 'show']);
Route::get('/cores', [ColorController::class, 'index']);

Route::delete('/modelos/{id}', [ModelCarController::class, 'destroy']);
Route::put('/modelos/{id}', [ModelCarController::class, 'update']);
Route::post('/modelos', [ModelCarController::class, 'store']);
Route::get('/modelos/{id}', [ModelCarController::class, 'show']);
Route::get('/modelos', [ModelCarController::class, 'index']);

Route::get('/', function () {
    return response()->json([
        'success' => true,
    ]);
});
