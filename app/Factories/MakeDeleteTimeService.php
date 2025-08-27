<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\DeleteTimeService;

class MakeDeleteTimeService
{
    public static function make(): DeleteTimeService
    {
        $repository = new EloquentTimeRepository();
        return new DeleteTimeService($repository);
    }
}