<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelCarRequest;
use App\Http\Resources\ModelCarResource;
use App\Repositories\ModelCarRepository;
use Illuminate\Http\Request;

class ModelCarController extends Controller
{
    protected $repository;

    public function __construct(ModelCarRepository $modelCarRepository)
    {
        $this->repository = $modelCarRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = $this->repository->getAllModels();

        return ModelCarResource::collection($models);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModelCarRequest $request)
    {
        $model = $this->repository->create($request->validated());

        return new ModelCarResource($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = $this->repository->getModel($id);

        return new ModelCarResource($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModelCarRequest $request, string $id)
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
