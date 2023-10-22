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
        Schema::create('carreta', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', length:255 );
            $table->integer('capacidade_carga');
            $table->integer('ano_fabricacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreta');
    }
};
