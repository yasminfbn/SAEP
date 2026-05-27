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

            $table->unsignedInteger('codigo_id');

            $table->foreign('codigo_id')
                ->references('codigo')
                ->on('medicamentos')
                ->cascadeOnDelete();

            $table->boolean('controlado')->default(false);

            $table->integer('loteFabricacao');

            $table->date('dataValidade');

            $table->string('principioAtivo');

            $table->timestamps();
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