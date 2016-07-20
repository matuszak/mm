<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $guarded  = ['id'];

    public $rules       = [

        'nome'  =>  'required|min:3|max:25',
        'uf'    =>  'required|min:2|max:2',
    ];
}
