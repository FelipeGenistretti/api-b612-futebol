<?php

namespace App\Repositories\Contracts;
use App\Models\User;

interface UserRepositoryInterface
{
   public function registerUser(array $data);
   public function findUserbyId(int $id);
   public function findUserByEmail(string $email);
   public function updatePassword(User $user, string $newPassword);
}
