<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

class CreateTimeService
{
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function execute(string $nome, string $cidade, string $estadio)
    {
        if(!$nome){
            throw new InvalidArgumentException("Campo nome deve ser preenchido");
        }
        
        return $this->timeRepository->createTime([
            'nome' => $nome,
            'cidade' => $cidade,
            'estadio' => $estadio,
        ]);
    }

}
