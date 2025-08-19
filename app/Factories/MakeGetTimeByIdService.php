<?php 

namespace App\Factories;
 
use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Repositories\Contracts\TimeRepository;
use App\Services\GetTimeByIdService;
 
class MakeGetTimeByIdService

{

    public static function make(): GetTimeByIdService

    {
      
        $repository = new EloquentTimeRepository();
        
        
        return new GetTimeByIdService($repository);

    }

}

 



?>