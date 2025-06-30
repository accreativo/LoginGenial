<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('credencial_autorizacion_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credencial_id')
                ->references('id')
                ->on('credenciales')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('codigo')
                ->nullable();
            $table->timestamp('fe_codigo')
                ->nullable();
            $table->string('accion')
                ->nullable();
            $table->string('session')
                ->nullable();
            $table->uuid('tkn')
                ->default(DB::raw('uuid_generate_v4()'));
            $table->index('tkn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credencial_autorizacion_solicitudes');
    }
};
