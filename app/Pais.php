<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['nome, user_id'];

    public $rules = [
        'nome' => 'required|min:3|max:100|unique:pais',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
