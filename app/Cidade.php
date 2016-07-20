<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
        //
    protected $guarded  = ['id'];

    public $rules       = [
        'pais_id'       =>  'required',
        'estado_id'     =>  'required',
        'nome'          =>  'required|min:3|max:35',
    ];
}
