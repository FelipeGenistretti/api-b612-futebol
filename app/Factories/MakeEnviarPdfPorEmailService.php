<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\EnviarPdfPorEmailService;

class MakeEnviarPdfPorEmailService
{
    public static function make(): EnviarPdfPorEmailService
    {
        $repository = new EloquentTimeRepository();
        return new EnviarPdfPorEmailService($repository);
    }
}
