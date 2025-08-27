<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\UpdatePasswordService;

class MakeUpdatePasswordService
{
    public static function make(): UpdatePasswordService
    {
        $repository = new EloquentUserRepository();
        return new UpdatePasswordService($repository);
    }
}
