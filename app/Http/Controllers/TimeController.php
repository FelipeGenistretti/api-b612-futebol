<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use App\Services\CreateTimeService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Services\Factories\MakeCreateTimeService;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $allWithJogadoresService = MakeCreateTimeService::make();

        // aqui chama o execute()
        $times = $allWithJogadoresService->execute();

        return TimeResource::collection($times);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTimeRequest $request)
    {
        $data = $request->validated();

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Time $time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time)
    {
        //
    }
}
