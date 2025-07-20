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
        Schema::create('credentialRenewalRequests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credentialId')
                ->references('id')
                ->on('credentials')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('tknPassword')
                ->unique();
            $table->boolean('flStatus')
                ->default(TRUE);
            $table->timestamp('dtRenewalRequestLimit') ######## Fecha de pago de la suscripción
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
