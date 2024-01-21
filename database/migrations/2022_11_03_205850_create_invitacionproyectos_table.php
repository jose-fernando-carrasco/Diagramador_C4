<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitacionproyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitacionproyectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_envio_id');
            $table->unsignedBigInteger('user_recibe_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->boolean('aceptado')->default(false);
            $table->boolean('leido')->default(false);
            $table->timestamps();

            $table->foreign('user_envio_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_recibe_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitacionproyectos');
    }
}
