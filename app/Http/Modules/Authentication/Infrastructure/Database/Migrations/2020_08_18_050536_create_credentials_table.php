<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rolId')
                ->references('id')
                ->on('roles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('user')
                ->unique();
            $table->string('password',100);
            $table->string('email')
                ->unique();
            $table->boolean('flStatus')
                ->default(TRUE);
            $table->uuid('tkn')
                ->default(DB::raw('uuid_generate_v4()'));
            $table->index('tkn');
            $table->customTimestampsActions();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credentials');
    }
}
