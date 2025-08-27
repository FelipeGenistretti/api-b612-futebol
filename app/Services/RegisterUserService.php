<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Error;
use Illuminate\Support\Facades\Hash;

class RegisterUserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $email, string $nome, string $password)
    {
        $user = $this->userRepository->findUserByEmail($email);

        
        if($user){
            throw new Error("Esse usuário já existe!");
        }

        if(!$nome){
            throw new Error("Nome é obrigatório");
        }

        $user =  $this->userRepository->registerUser([
            'email'=>$email,
            'name'=>$nome,
            
            'password'=> $this->hashPassword($password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user'=>$user,
            'token'=>$token
        ];
        
    }

    protected function hashPassword(string $password){
        return Hash::make($password);
    }

}
