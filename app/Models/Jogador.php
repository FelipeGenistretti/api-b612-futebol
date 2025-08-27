<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jogador extends Model
{
    /** @use HasFactory<\Database\Factories\JogadorFactory> */
    use HasFactory;

    protected $table = 'jogadores'; // 🔹 Corrige o nome da tabela

    protected $fillable = [
        'nome',
        'time_id',
        'posicao',
        'idade',
        'nacionalidade',
    ];

    public function time(): BelongsTo
    {
        return $this->belongsTo(Time::class);
    }
}
