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
            $table->foreign('codigo')
            ->references('codigo')
            ->on('produtos')
            ->cascadeOnDelete();

            $table->string('codigo');
            $table->string('periculosidade');
            $table->string('temperatura');
            $table->decimal('volume',8,2);
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
