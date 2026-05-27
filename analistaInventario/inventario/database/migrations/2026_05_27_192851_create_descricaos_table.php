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
        Schema::create('descricaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('codigo');

            $table->foreign('codigo')
                  ->references('codigo')
                  ->on('produtos')
                  ->cascadeOnDelete();

            $table->string('marca');
            $table->unsignedInteger('estoqueMinimo');
            $table->decimal('medida', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descricaos');
    }
};