<?php

namespace App\Repositories\Eloquent;

use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;


class EloquentTimeRepository implements TimeRepositoryInterface {
    public function allWithJogadores(){
        $times = Time::with('jogadores')->get();
        return $times;
    }

    public function createTime (array $data){
        $time = Time::create($data);
        return $time;
    }
}