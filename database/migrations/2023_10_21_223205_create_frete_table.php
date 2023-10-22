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
        Schema::create('frete', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 10, 2)->change();
            $table->decimal('kilometros', 10, 2)->change();
            $table->string('tipo_carga', length:255);
            $table->foreignId('caminhao_id')->constrained('caminhao');
            $table->foreignId('carga_id')->constrained('carga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frete');
    }
};
