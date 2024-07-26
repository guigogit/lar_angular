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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('titulo');
            $table->string('subtitulo')->nullable(); // Permite nulo
            $table->text('mensagem'); // Alterado para texto longo
            $table->string('arquivo')->nullable(); // Permite nulo
            $table->integer('likes')->default(0); // Alterado para inteiro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
