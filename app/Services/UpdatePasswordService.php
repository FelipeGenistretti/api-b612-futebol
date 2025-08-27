<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Error;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $email, string $newPassword, string $password)
    {
        $user = $this->userRepository->findUserByEmail($email);

        if (!Hash::check($password, $user->password)) {
            throw new Error("Senha atual incorreta!");
        }
        $this->userRepository->updatePassword($user, $this->hashPassword($newPassword));

        return [
            'message' => 'Senha atualizada com sucesso!'
        ];
    }


    protected function hashPassword(string $password){
        return Hash::make($password);
    }

}
