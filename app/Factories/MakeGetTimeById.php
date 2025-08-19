<?php 

namespace App\Factories;
 
use App\Repositories\Eloquent\EloquentTimeRepository;

use App\Services\FindTimeByIdService;
 
class MakeFindTimeByIdService

{

    public static function make(): FindTimeByIdService

    {
      
        $repository = new EloquentTimeRepository();
       
        return new FindTimeByIdService($repository);

    }

}

 


?>