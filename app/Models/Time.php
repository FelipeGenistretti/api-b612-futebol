<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'cidade',
        'estadio',
    ];

    protected $dates = ['deleted_at'];

    public function jogadores(): HasMany
    {
        return $this->hasMany(Jogador::class);
    }
}
