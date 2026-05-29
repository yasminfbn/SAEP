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
        Schema::create('producoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data');
            $table->string('operador');
            $table->string('forno');
            $table->decimal('temperatura_registrada',8,2);
            $table->integer('quantidade_produzida');
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producoes');
    }
};
