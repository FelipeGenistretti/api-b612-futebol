<?php 

namespace App\Factories;
 
use App\Repositories\Eloquent\EloquentTimeRepository;

use App\Services\AllWithJogadoresService;
 
class MakeListTimeService

{

    public static function make(): AllWithJogadoresService

    {

        $repository = new EloquentTimeRepository();

        return new AllWithJogadoresService($repository);

    }

}

 


?>