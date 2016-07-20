<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Permission;

class PermissionController extends StandardController
{
    protected $model;
    protected $view = ('painel.permissions');
    protected $route = ('/painel/permissions');
    protected $request, $permission;
    protected $find1 =  ('name'), $find2 = ('label');

    public function __construct(Request $request, Permission $permission)
    {
        $this->request  = $request;
        $this->model    = $permission;
    }
}
