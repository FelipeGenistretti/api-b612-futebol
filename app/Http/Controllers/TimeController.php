<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use App\Services\CreateTimeService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $times = $this->allWithJogadores();

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
