<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded  = ['id',];

    public $rules       = [
        'name'      => 'max:15|min:3|unique:permissions|required',
        'label'     => 'max:80',
    ];
    public function permissions()
    {
        return $this->belongsToMany(\App\Permission::class);
    }
}
