<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\GerarPdfService;

class MakeGerarPdfService
{
    public static function make(): GerarPdfService
    {
        $repository = new EloquentTimeRepository();
        return new GerarPdfService($repository);
    }
}
