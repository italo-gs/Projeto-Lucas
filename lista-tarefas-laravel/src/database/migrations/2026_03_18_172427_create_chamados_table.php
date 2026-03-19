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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('prioridade', ['baixa', 'média', 'alta']);
            $table->enum('status', ['aberto', 'em_atendimento', 'resolvido', 'fechado'])->default('aberto');
            $table->date('data_abertura');
        
            // Chaves Estrangeiras
            $table->foreignId('tecnico_id')->constrained('tecnicos')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
