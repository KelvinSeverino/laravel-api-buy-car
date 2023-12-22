<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\ColorResource;
use App\Repositories\ColorRepository;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $repository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->repository = $colorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = $this->repository->getAllColors();

        return ColorResource::collection($colors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        $colors = $this->repository->create($request->validated());

        return new ColorResource($colors);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $colors = $this->repository->getColor($id);

        return new ColorResource($colors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, string $id)
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
