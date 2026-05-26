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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('produto_id')-> constraint() -> cascadeOnDelete();
            //migretion que cria uma foreign key com comportamento automático de exclusão em cascata
            //exclusão em cascata: se um resgistro da tabela produtos for excluído, todos os registros da tabela atual 
            //referenciam esse produto_id também serão apagados automaticamente
            $table -> integer('quantidade');
            $table -> enum('tipo', ['entrada', 'saída']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentos');
    }
};
