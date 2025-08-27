<?php

namespace App\Factories;

use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\RegisterUserService;


class MakeRegisterUserService
{
    public static function make(): RegisterUserService
    {
        $repository = new EloquentUserRepository();
        return new RegisterUserService($repository);
    }
}
