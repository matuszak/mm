<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Role;

class RoleController extends StandardController
{
    protected $model;
    protected $view = ('painel.roles');
    protected $route = ('/painel/roles');
    protected $request, $role;


    public function __construct(Request $request, Role $role)
    {
        $this->request  = $request;
        $this->model    = $role;
    }
}
