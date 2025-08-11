<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::with('jogadores')->get();

        return TimeResource::collection($times);
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
