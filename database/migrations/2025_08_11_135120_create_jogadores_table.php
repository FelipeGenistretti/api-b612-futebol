<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nome");
            $table->foreignId('time_id')->constrained('times')->onDelete('cascade');
            $table->enum('posicao', [
                'goleiro',
                'zagueiro',
                'lateral',
                'volante',
                'meio-campista',
                'atacante'
            ]);
            $table->integer('idade')->nullable();
            $table->string('nacionalidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogadores');
    }
};
