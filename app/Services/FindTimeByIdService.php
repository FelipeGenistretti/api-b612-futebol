<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;



class FindTimeByIdService
{
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
       

        $this->timeRepository = $timeRepository;
        
    }
    

    public function execute(int $id)
    {
        
        return $this->timeRepository->getTimeById($id);
    }
}
