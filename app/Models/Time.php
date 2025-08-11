<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Time extends Model
{
    /** @use HasFactory<\Database\Factories\TimeFactory> */
    use HasFactory;

    public function jogadores():HasMany{
        return $this->hasMany(Jogador::class);
    }
}
