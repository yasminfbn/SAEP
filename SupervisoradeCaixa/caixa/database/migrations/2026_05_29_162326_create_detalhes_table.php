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
        Schema::create('detalhes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo');

            $table->foreign('codigo')
            ->references('codigo')
            ->on('produtos')
            ->cascadeOnDelete();

            $table->string('nome_acessorio');
            $table->string('modelo_aparelho');
            $table->string('cor');
            $table->string('material');
            $table->boolean('possui_garantia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalhes');
    }
};
