<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Rp;

class RpController extends StandardController
{
    public function rolesPermissions()
    {
        $userName = auth()->user()->name;
        echo $userName . ": ";

        foreach (auth()->user()->roles as $role) {
            echo($role->name . " -> ");

            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                echo $permission->name . "; ";
            }
            echo '<hr>';
        }
        echo("<a href='/home'>HOME</a>");
    }
}
