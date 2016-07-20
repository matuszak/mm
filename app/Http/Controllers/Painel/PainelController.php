<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Cliente;
use App\Departamento;
use App\Estado;
use App\Lista;
use App\Pais;
use App\Permission;
use App\Role;
use App\User;

class PainelController extends Controller
{
    //Declara atributos protegidos para fazer DI
    protected $cities, $departamentos, $estados, $countries, $listas, $permissions, $roles, $users, $customers;
    //Cria o metodo construtor do DI;
    public function __construct(Cidade $cid, Departamento $dep, Estado $est, Pais $pai, Permission $per, Role $rol, User $use, Lista $lis, Cliente $cus)
    {
        $this->cities           = $cid;
        $this->customers        = $cus;
        $this->departamentos    = $dep;
        $this->estados          = $est;
        $this->contries         = $pai;
        $this->permissions      = $per;
        $this->roles            = $rol;
        $this->users            = $use;
        $this->listas           = $lis;
    }

    public function index(){
        $totalCidades           = $this->cities->count();
        $totalCustomers         = $this->customers->count();
        $totalDepartamentos     = $this->departamentos->count();
        $totalEstados           = $this->estados->count();
        $totalListas            = $this->listas->count();
        $totalCountries         = $this->contries->count();
        $totalPermissions       = $this->permissions->count();
        $totalRoles             = $this->roles->count();
        $totalUsers             = $this->users->count();

        //Título da página;
        $title = ("MM Cia Marketing Digital - Dashboard");

        //Retonar a pagina inicial do dash painel, e passa todas as variaveis com total para mostrar na view...
        return view('painel.home.index', compact('totalCidades', 'totalCustomers', 'totalDepartamentos', 'totalEstados', 'totalCountries', 'totalPermissions', 'totalRoles', 'totalUsers', 'totalListas', 'title'));
    }
}
