<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'nome' => 'min:3|max:30|required|string',
        'label'=> 'max:100',
    ];
}
