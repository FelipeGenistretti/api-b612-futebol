<?php

namespace App\Repositories\Eloquent;

use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;
use Illuminate\Support\Facades\Cache;


class EloquentTimeRepository implements TimeRepositoryInterface {

    protected $cacheTTL = 3600;


    public function allWithJogadores(){
        return Cache::remember('times:with-jogadores', $this->cacheTTL, function(){
            return Time::with('jogadores')->get();
        });
    }

    public function createTime (array $data){
        $time = Time::create($data);
        Cache::forget('times:all');
        Cache::forget('times:with-jogadores');
        return $time;
    }

  
    public function deleteTime(Time $time){
        $result = $time->delete();

        Cache::forget("time:{$time->id}");
        Cache::forget("times:all");
        Cache::forget("times:with-jogadores");

        return $result;

    }

    public function updateTime(Time $time, array $data){
        $time->update($data);

        Cache::put("time:{$time->id}", $time, $this->cacheTTL);
        Cache::forget('times:all');
        Cache::forget('times:with-jogadores');

        return $time;
    }

     public function findById(int $id){
        return Cache::remember("time:{$id}", $this->cacheTTL, function() use ($id) {
            return Time::findOrFail($id);
        });
    }

    public function allTimes()
    {   
        return Cache::remember("times:all", $this->cacheTTL, function(){
            return Time::all(); 
        });
    }

    public function timeComJogadoresById(int $id)
    {
        return Cache::remember("time:{$id}", $this->cacheTTL, function() use($id){
            return Time::with('jogadores')->findOrFail($id);
        });
    }
}