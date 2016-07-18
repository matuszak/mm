<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Pais;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pais $pais)
    {
        $paises = Pais::all();
        //$paises = $pais->where('user_id', auth()->user()->id)->get();

        return view('home', compact('paises'));
    }

    public function editar($id){
        $p = Pais::find($id);

        //metodo 1 para ACL;
        //$this->authorize('editar', $p);

       // if( Gate::denies('editar', $p) )
       //     abort(403, 'Não Autorizado!');

        return view('editar', compact('p'));
    }

    public function rolesPermissions(){
        $userName = auth()->user()->name;
        echo $userName.": ";

        foreach( auth()->user()->roles as $role){
            echo ($role->name." -> ");

            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                echo $permission->name."; ";
            }
        echo '<hr>';
        }
        echo ("<a href='/home'>HOME</a>");
    }
}
