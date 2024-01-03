<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimulationRequest;
use App\Http\Resources\SimulationResource;
use App\Services\SimulationService;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    protected $service;

    public function __construct(SimulationService $simulationService)
    {
        $this->service = $simulationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simulation(SimulationRequest $request)
    {
        $data = $request->validated();
        $simulation = $this->service->simulateFinancing($data);
        return new SimulationResource($simulation);
    }
}
