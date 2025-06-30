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
        Schema::create('credencial_renovacion_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credencial_id')
                ->references('id')
                ->on('credenciales')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('tkn_password')
                ->unique();
            $table->boolean('fl_estado')
                ->default(TRUE);
            $table->timestamp('fe_recuperacion') ######## Fecha de pago de la suscripción
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
        Schema::dropIfExists('credencial_renovacion_solicitudes');
    }
};
