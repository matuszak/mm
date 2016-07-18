<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Pais;
use App\User;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        /*
            'App\Model' => 'App\Policies\ModelPolicy',
            \App\Pais::class => \App\Policies\PaisPolicy::class,
        */
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        //$gate->define('permissao', function(User $user, Class $class){
        //   return $user->id == $post->user_id;
        //});
        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission)
        {
            $gate->define($permission->name, function(User $user) use ($permission){
                return ($user->hasPermission($permission));
            });
        }

        $gate->before(function(User $user, $ability){
            if( $user->hasAnyRoles('adm') )
                return true;
        });
    }

}
