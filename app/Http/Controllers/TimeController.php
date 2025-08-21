<?php

namespace App\Http\Controllers;

use App\Factories\MakeUpdateTimeService;
use App\Factories\MakeGetTimeByIdService;
use App\Factories\MakeCreateTimeService;
use App\Services\DeleteTimeService;
use App\Http\Requests\CreateTimeRequest;
use App\Http\Requests\UpdateTimeRequest;
use App\Http\Resources\TimeResource;
use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use App\Services\CreateTimeService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Factories\MakeListTimeService;
use App\Factories\MakeDeleteTimeService;
use App\Services\GetTimeByIdService;
use InvalidArgumentException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
    public function show(int $id)
    {
        try {
            $getTimeByIdService = MakeGetTimeByIdService::make();
            $time = $getTimeByIdService->execute($id);

            return TimeResource::make($time);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Time não encontrado'
            ], 404);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }

   /**
     * Update the specified resource in storage.
     */
   public function update(UpdateTimeRequest $request, Time $time)
{
   
    try {
        $data = $request->validated();
        
        $updateTimeService = MakeUpdateTimeService::make();
        $updatedTime = $updateTimeService->execute(
            $time,
            $data['nome'],
            $data['cidade'] ?? null,
            $data['estadio'] ?? null
        );

        return TimeResource::make($updatedTime)
            ->response()
            ->setStatusCode(201);
    } catch (\Throwable $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time)
    {
             
        try {
          
            $deleteTimeService = MakeDeleteTimeService::make();
       

            $deleteTimeService->execute($time);

            
            return response()->json(['message' => 'Time deletado com sucesso'], 200);
            
        } catch (ValidationException $e) {
            return response()->json(['error 1 ' => $e->getMessage()], 404);
        } catch (InvalidArgumentException $e) {
            return response()->json(['error 2 ' => $e->getMessage()], 422);
        } catch (\Throwable $e) {
            return response()->json(['error 3 ' => $e->getMessage()], 500);
        }
    }
}
