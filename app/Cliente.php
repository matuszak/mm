<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $guarded  = ['id'];

    //Validação
    public $rules       = [
        'respNomeContrato'  =>  'required|min:3|max:150',
        'endereco'          =>  'required|max:200',
        'bairro'            =>  'required|max:100',
        'cep'               =>  'required|max:20',
        'cpfCnpj'           =>  'required|max:20|unique:clientes',
        'email'             =>  'required|email|max:190',
        'dataVencimento'    =>  'required|date',
        'dataEntrada'       =>  'required|date',
        'fone0'             =>  'required|min:9|max:18',
        'fone1'             =>  'min:9|max:18',
        'fonew'             =>  'min:9|max:18',
        'ativo'             =>  'required',
        'lista_id'          =>  'required',
        'cidade_id'         =>  'required',
    ];
}
