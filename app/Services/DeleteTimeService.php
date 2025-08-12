<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use App\Models\Time;

class DeleteTimeService
{
    protected $timeRepository;

        public function __construct(TimeRepositoryInterface $timeRepository){
           $this->timeRepository = $timeRepository;
         }
      
    public function execute(Time $time){
        if(!$time){
            throw new InvalidArgumentException("ID do time deve ser preenchido");
        }

        return $this->timeRepository->deleteTime($time);
    }
}
