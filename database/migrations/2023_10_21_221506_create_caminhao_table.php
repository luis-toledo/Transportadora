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
        Schema::create('caminhoes', function (Blueprint $table) {
            $table->id();
            $table->string('placa', length:7 )->unique();
            $table->string('modelo', length:255);
            $table->string('categoria_cnh_necessaria', length:1);
            $table->integer('ano');
            $table->foreignId('motorista_id')->constrained('motoristas');
            $table->foreignId('carreta_id')->constrained('carretas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caminhao');
    }
};
