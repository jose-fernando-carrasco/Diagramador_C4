<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sala_user', function (Blueprint $table) {
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            /* llave primaria */
            $table->primary(['sala_id','user_id']);
            /* llaves foraneas  onUpdate('restrict')*/ 
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sala_user');
    }
}
