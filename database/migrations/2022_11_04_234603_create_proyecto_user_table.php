<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_user', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            /* llave primaria */
            $table->primary(['proyecto_id','user_id']);
            /* llaves foraneas  onUpdate('restrict')*/ 
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_user');
    }
}
