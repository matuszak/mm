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
        'endereco'          =>  'max:200',
        'bairro'            =>  'max:100',
        'cep'               =>  'max:20',
        'cpfCnpf'           =>  'max:20|unique:clientes',
        'email'             =>  'email|max:190',
        'dataVencimento'    =>  'date',
        'fone0'             =>  'min:9|max:18',
        'fone1'             =>  'min:9|max:18',
        'fonew'             =>  'min:9|max:18',
    ];
}
