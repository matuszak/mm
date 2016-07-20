<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Departamento;

class DepartamentoController extends StandardController
{
    protected $model;
    protected $view = ('painel.departamentos');
    protected $route = ('/painel/departamentos');
    protected $request, $departamento;
    protected $find1 =  ('nome'), $find2 = ('active');

    public function __construct(Request $request, Departamento $departamento)
    {
        $this->request  = $request;
        $this->model    = $departamento;
    }


// Realiza a buscas
    public function search(){
        $find = $this->request->get('search');
            if(($find == 'não')or($find == 'nao')){
                $find = 0;
            }   elseif ($find == 'sim') {
                $find = 1;
            }

        $data = $this->model->where($this->find1, 'LIKE', "%$find%")
            ->orWhere($this->find2, $find)
            ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }
}