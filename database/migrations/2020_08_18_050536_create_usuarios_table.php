<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfil_id')
                ->references('id')
                ->on('perfiles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('correo')
                ->unique();
            $table->string('usuario')
                ->unique();
            $table->string('password',100);
            $table->boolean('fl_estado')
                ->default('true');
            $table->boolean('fl_recuperacion')
                ->default('false');
            $table->timestamp('fe_recuperacion') ######## Fecha Vigencia Recuperacion
                ->nullable();
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
