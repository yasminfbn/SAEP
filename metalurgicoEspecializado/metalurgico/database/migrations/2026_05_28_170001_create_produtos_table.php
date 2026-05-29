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
            $table->string('codigo');
            $table->decimal('preco',8,2);
            $table->integer('quantidade');
            $table->string('categoria');
            $table->string('tipo_liga');
            $table->decimal('peso_toneladas',8,2);
            $table->string('CA');
            $table->date('validade');
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
