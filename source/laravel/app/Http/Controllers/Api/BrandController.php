<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $repository;

    public function __construct(BrandRepository $colorRepository)
    {
        $this->repository = $colorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = $this->repository->getAllBrands();

        return BrandResource::collection($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brands = $this->repository->create($request->validated());

        return new BrandResource($brands);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brands = $this->repository->getBrand($id);

        return new BrandResource($brands);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
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
