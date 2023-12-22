<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
