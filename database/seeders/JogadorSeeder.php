<?php

namespace Database\Seeders;

use App\Models\Jogador;
use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Time::factory()
            ->count(50)
            ->has(Jogador::factory()->count(11), 'jogadores')
            ->create();
    }
}
