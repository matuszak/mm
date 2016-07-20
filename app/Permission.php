<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    protected $guarded  = ['id',];

    public $rules       = [
        'name'      => 'max:15|min:3|unique:permissions|required',
        'label'     => 'max:50',
    ];

    public function roles()
    {
        return $this->belongsToMany(\App\Role::class);
    }
}
