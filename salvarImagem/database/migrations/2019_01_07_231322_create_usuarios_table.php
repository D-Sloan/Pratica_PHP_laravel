<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criação da tabela no banco de dados que irá armazenar informações do usuario cadastrado e o nome da imagem dele
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nome');
            $table->string('Email');
            $table->string('NomeImagem');
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
