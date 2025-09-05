<?php

namespace App\Repositories\Eloquent;

use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use InvalidArgumentException;


class EloquentTimeRepository implements TimeRepositoryInterface {
    public function allWithJogadores(){
        return Time::with('jogadores')->get();
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

    public function findById(int $id)
    {
        return Time::findOrFail($id);
    }

    public function allTimes()
    {
        return Time::all(); 
    }

    public function timeComJogadoresById(int $id)
    {
        return Time::with('jogadores')->findOrFail($id);
    }
}