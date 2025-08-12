<?php

namespace App\Repositories\Contracts;
use App\Models\Time;

interface TimeRepositoryInterface
{
    public function allWithJogadores();
    public function createTime(array $data);
   
    public function deleteTime(Time $time);
    public function updateTime(Time $time, array $data);
    public function findById(Time $time);
}
