<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    BrandController,
    CarController,
    ModelCarController,
    ColorController,
    SimulationController,
};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/simulacao', [SimulationController::class, 'simulation']);

Route::apiResource('/veiculos', CarController::class);

Route::delete('/marcas/{id}', [BrandController::class, 'destroy']);
Route::put('/marcas/{id}', [BrandController::class, 'update']);
Route::post('/marcas', [BrandController::class, 'store']);
Route::get('/marcas/{id}', [BrandController::class, 'show']);
Route::get('/marcas', [BrandController::class, 'index']);

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
