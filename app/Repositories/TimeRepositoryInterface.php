<?php

namespace App\Repositories\Contracts;

interface TimeRepositoryInterface
{
    public function allWithJogadores();
    public function createTime(array $data);
}
