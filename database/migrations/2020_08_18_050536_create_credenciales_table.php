<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCredencialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credenciales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')
                ->references('id')
                ->on('roles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('usuario')
                ->unique();
            $table->string('password',100);
            $table->string('correo')
                ->unique();
            $table->boolean('fl_estado')
                ->default(TRUE);
            $table->uuid('tkn')
                ->default(DB::raw('uuid_generate_v4()'));
            $table->index('tkn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
