<?php 

namespace App\Factories;
 
use App\Repositories\Eloquent\EloquentTimeRepository;

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