<?php

namespace App\Http\Controllers;

use App\Factories\MakeCreateTimeService;
use App\Http\Requests\CreateTimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use App\Services\CreateTimeService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Factories\MakeListTimeService;

use function Laravel\Prompts\error;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $allWithJogadoresService = MakeListTimeService::make();

        

        $times = $allWithJogadoresService->execute();

    
        
        return TimeResource::collection($times);
            
             
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTimeRequest $request)
    {   
        try { 

            $data = $request->validated();
            
            $createTimeService = MakeCreateTimeService::make();
            $time = $createTimeService->execute(
                $data['nome'],
                $data['cidade'],
                $data['estadio']
            );
            
            return TimeResource::make($time);
        } catch(\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch(\Throwable $e){
             return response()->json(['error' =>$e->getMessage()], 500);
        }
       
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
    public function delete($id)
    {
        $time = Time::find($id);

      if(empty($user)) {
            return response()->json(['message' => 'Não existe registro de um time com ID ' . $id], 404);
        }

      return response()->json($time);

        
    }
}
