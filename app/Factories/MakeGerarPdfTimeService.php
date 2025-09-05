<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\GerarPdfTimeService;

class MakeGerarPdfTimeService
{
    public static function make(): GerarPdfTimeService
    {
        $repository = new EloquentTimeRepository();
        return new GerarPdfTimeService($repository);
    }
}
