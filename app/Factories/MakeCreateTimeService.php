<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\CreateTimeService;

class MakeCreateTimeService
{
    public static function make(): CreateTimeService
    {
        $repository = new EloquentTimeRepository();
        return new CreateTimeService($repository);
    }
}
