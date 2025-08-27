<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;


class EloquentUserRepository implements UserRepositoryInterface {
    public function registerUser(array $data){
        return User::create($data);
    }

    public function findUserbyId(int $id){
        return User::find($id);
    }

    public function findUserByEmail(string $email){
        return User::where('email', $email);
    }
}