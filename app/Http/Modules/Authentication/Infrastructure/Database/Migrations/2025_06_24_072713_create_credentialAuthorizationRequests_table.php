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
        Schema::create('credentialAuthorizationRequests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credentialId')
                ->references('id')
                ->on('credentials')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('code')
                ->nullable();
            $table->timestamp('dtCodeRequestLimit')
                ->nullable();
            $table->string('action')
                ->nullable();
            $table->string('session')
                ->nullable();
            $table->uuid('tkn')
                ->default(DB::raw('uuid_generate_v4()'));
            $table->index('tkn');
            $table->customTimestampsActions();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentialAuthorizationRequests');
    }
};
