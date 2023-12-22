<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ModelCarController,
};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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
