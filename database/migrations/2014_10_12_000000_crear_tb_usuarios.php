<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTbUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $tb) {
            $tb->id();
            $tb->string('foto_perfil')->nullable();
            $tb->string('nombre_1');
            $tb->string('nombre_2')->nullable();
            $tb->string('apellido_1');
            $tb->string('apellido_2')->nullable();
            $tb->string('email')->unique();
            $tb->string('telf');
            $tb->string('fecha_nacimiento');
            $tb->string('password');
            $tb->timestamps();
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
