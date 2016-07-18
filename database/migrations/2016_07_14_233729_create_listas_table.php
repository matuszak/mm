<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cidade_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('pais_id')->unsigned();
            $table->integer('departamento_id')->unsigned();

            $table->string('active', 1)->default('0');
            $table->string('imagem', 255);
            $table->string('nome', 120);
            $table->string('email', 200)->unique();
            $table->string('website', 100);
            $table->string('endereco', 180);
            $table->string('cnpj', 20);
            $table->string('numeroEmpresa', 40);

            $table->string('fone0', 18);
            $table->string('fone1', 18);
            $table->string('fone2', 18);
            $table->string('foneW', 18);
            $table->string('nomeGerente', 25);
            $table->string('sobrenomeGerente', 140);
            $table->string('obs', 150);

            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

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
        Schema::drop('listas');
    }
}
