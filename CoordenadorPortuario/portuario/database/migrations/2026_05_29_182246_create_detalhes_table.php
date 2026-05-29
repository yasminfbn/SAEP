<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalhes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('codigo');

            $table->unsignedInteger('tamanho');
            $table->string('tipo_carga');
            $table->string('nome_navio');

            $table->foreign('codigo')
                ->references('codigo')
                ->on('produtos')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalhes');
    }
};