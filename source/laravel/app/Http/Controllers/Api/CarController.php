<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Repositories\CarRepository;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $repository;

    public function __construct(CarRepository $carRepository)
    {
        $this->repository = $carRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = $this->repository->getAllCars();

        return CarResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $cars = $this->repository->create($request->validated());

        return new CarResource($cars);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cars = $this->repository->getCar($id);

        return new CarResource($cars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        if (!$this->repository->findById($id)) {
            return response()->json([
                'error' => true,
                'status_code' => 404,
                'response' => 'Data Not Found',
            ], 404);
        }

        $this->repository->update($id, $request->validated());

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'response' => 'Data Updated',
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$this->repository->delete($id)){
            return response()->json([
                'error' => true,
                'status_code' => 404,
                'response' => 'Data Not Found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'response' => 'Data Deleted',
        ], 200);
    }
}
