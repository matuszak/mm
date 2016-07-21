<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lista_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('cidade_id')->unsigned();

            $table->foreign('lista_id')->references('id')->on('listas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->string('respNomeContrato', 150);
            $table->string('ativo', 1)->default(1);
            $table->string('fone0', 18);
            $table->string('fone1', 18);
            $table->string('foneW', 18);
            $table->string('endereco', 200);
            $table->string('bairro', 100);
            $table->string('cep', 20);
            $table->string('cpfCnpj', 20);
            $table->integer('numero');
            $table->double('valorContrato');
            $table->integer('quantidadeMeses');
            $table->integer('desconto');

            $table->string('email', 190)->unique();

            $table->date('dataEntrada')->default(date('Y-m-d'));
            $table->date('dataVencimento');

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
        Schema::drop('clientes');
    }
}
