<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;

class CreateTimeService
{
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function execute(array $data)
    {
        return $this->timeRepository->createTime($data);
    }
}
