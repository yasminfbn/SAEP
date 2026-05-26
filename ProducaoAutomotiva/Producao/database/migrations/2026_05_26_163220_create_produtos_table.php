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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('nome');
            $table->integer('codigo');
            $table->string('fabricante');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->string('numero_serie');
            $table->integer('vida_util_horas');
            $table->string('localizacao');
            $table->foreignId('robo_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
