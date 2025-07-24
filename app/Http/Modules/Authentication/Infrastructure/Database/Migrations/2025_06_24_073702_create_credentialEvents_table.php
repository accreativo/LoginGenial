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
        Schema::create('credentialEvents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credentialId')
                ->references('id')
                ->on('credentials')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('name')
                ->nullable();
            $table->string('observation')
                ->nullable();
            $table->customTimestampsActions();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentialEvents');
    }
};
