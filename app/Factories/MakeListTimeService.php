<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentTimeRepository;
use App\Services\AllWithJogadores;

class MakeListTimeService
{
    public static function make(): AllWithJogadores
    {
        $repository = new EloquentTimeRepository();
        return new AllWithJogadores($repository);
    }
}
