<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Permission;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = [
        'name'      => 'required|min:3|max:100',
        'email'     => 'required|email|max:190|unique:users',
        'password'  => 'required|min:3|max:60|confirmed',
    ];

    /*
     *
     public function roles()
    {
        return $this->belongsToMany(\App\Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if( (is_array($roles)) || (is_object($roles)) )
        {
            //metodo que retorna true ou false na contagem de mais de um registro...
            return !!$roles->intersect($this->roles)->count();
            //foreach ($roles as $role){
            //    return ($this->hasAnyRoles($role));
            //}
        }
        return $this->roles->contains('name', $roles);
    }
    */
}
