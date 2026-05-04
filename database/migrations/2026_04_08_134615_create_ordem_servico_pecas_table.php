<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordem_servico_peca', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordem_servico_id')->constrained()->cascadeOnDelete();
            $table->foreignId('peca_id')->constrained()->restrictOnDelete();
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_servico_pecas');
    }
};
