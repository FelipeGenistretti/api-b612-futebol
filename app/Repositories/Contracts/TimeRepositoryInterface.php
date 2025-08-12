<?php

namespace App\Repositories\Contracts;
use App\Models\Time;

interface TimeRepositoryInterface
{
    public function allWithJogadores();
    public function createTime(array $data);
   
    public function deleteTime(Time $time);
}
