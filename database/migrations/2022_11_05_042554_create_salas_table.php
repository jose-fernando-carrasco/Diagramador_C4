<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
           //1 == No iniciado, 2 == En curso, 3 == Finalizada
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('estadosala_id')->default(1);
            $table->unsignedBigInteger('diagrama_id')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estadosala_id')->references('id')->on('estadosalas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('diagrama_id')->references('id')->on('diagramas')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
