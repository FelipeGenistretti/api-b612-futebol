<?php

namespace App\Repositories\Contracts;
use App\Models\Time;

interface TimeRepositoryInterface
{
    public function allWithJogadores();
    public function createTime(array $data);
<<<<<<< HEAD
   
    public function deleteTime(Time $time);
=======
    public function updateTime(Time $time, array $data);
>>>>>>> 52e991b (Implementando o metodo update)
}
