<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\UpdateTimeService;

class MakeUpdateTimeService
{
    public static function make(): UpdateTimeService
    {
        $repository = new EloquentTimeRepository();
        return new UpdateTimeService($repository);
    }
}
