<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\FindByIdService;

class MakeFindByIdService
{
    public static function make(): FindByIdService
    {
        $repository = new EloquentTimeRepository();
        return new FindByIdService($repository);
    }
}
