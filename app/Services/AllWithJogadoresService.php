<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;

class AllWithJogadores
{
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function execute()
    {
        return $this->timeRepository->allWithJogadores();
    }
}
