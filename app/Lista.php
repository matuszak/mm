<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $guarded  = ['id'];

    //Validação
    public $rules       = [
        'active'            =>  'required',
        'cidade_id'         =>  'required',
        'estado_id'         =>  'required',
        'pais_id'           =>  'required',
        'departamento_id'   =>  'required',
        'nome'              =>  'required|min:3|max:120',
        'email'             =>  'required|email|max:200',
        'endereco'          =>  'required|max:180',
        'nomeGerente'       =>  'required|max:25',
        'sobrenomeGerente'  =>  'required|max:140',
        'fone0'             =>  'required|max:18',
        'cnpj'              =>  'required',

        'imagem'            =>  'max:255',
        'numeroEmpresa'     =>  'max:40',
        'website'           =>  'max:100',
        'fone1'             =>  'max:18,',
        'fone2'             =>  'max:18',
        'foneW'             =>  'max:18',
        'obs'               =>  'max:150',
    ];
}
