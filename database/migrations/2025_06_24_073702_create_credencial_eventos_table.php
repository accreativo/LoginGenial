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
        Schema::create('credencial_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credencial_id')
                ->references('id')
                ->on('credenciales')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('evento')
                ->nullable();
            $table->string('obervacion')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credencial_bitacoras');
    }
};
