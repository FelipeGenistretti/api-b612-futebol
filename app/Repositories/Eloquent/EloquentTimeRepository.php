<?php

namespace App\Repositories\Eloquent;

use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use InvalidArgumentException;


class EloquentTimeRepository implements TimeRepositoryInterface {
    public function allWithJogadores(){
        $times = Time::with('jogadores')->get();
        return $times;
    }

    public function createTime (array $data){
        $time = Time::create($data);
        return $time;
    }

  
    public function deleteTime(Time $time){
      
        return $time->delete();
    }

    public function updateTime(Time $time, array $data){
        $time->update($data);
        return $time;
    }

    public function findById(int $id):Time{
        return Time::findOrFail($id);
    }
}