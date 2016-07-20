<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Estado;
use App\Pais;

class EstadoController extends StandardController
{
    protected $model;
    protected $view = ('painel.estados');
    protected $route = ('/painel/estados');
    protected $request, $estado;
    protected $find1 =  ('nome'), $find2 = ('uf');

    public function __construct(Request $request, Estado $estado, Pais $pais)
    {
        $this->request  = $request;
        $this->model    = $estado;
        $this->pais     = $pais;
    }

    //Recupera pais para fazer a inserção neste método...
    public function index(){
        $title = ('MM Cia Marketing: Listagem de registros');
        $paises = $this->pais->orderBy('nome')->get();
        //$data = $this->model->paginate($this->itensForPage);
        $data = $this->model
                ->join('pais', 'pais.id', '=', 'estados.pais_id')
                ->select('estados.nome', 'estados.id','estados.uf', 'pais.nome as pais')
                ->paginate($this->itensForPage);
        return view("{$this->view}.gestao", compact('data', 'title', 'paises'));
    }

    //Método Adicionar (chama formulário) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function add(){
        $title = ('MM Cia Marketing: Adicionar novo registro');
        $paises = $this->pais->orderBy('nome')->get();
        return view("{$this->view}.form", compact('title', 'paises'));
    }

    //Método Editar (chmar forumlário) :::::::::::::::::::::
    public function edt($id, $act)
    {
        $title = ('MM Cia Marketing: Editar registro');
        //Recupera os dados e preenche o formulário por id;
        $paises = $this->pais->orderBy('nome')->get();
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('title', 'id', 'act', 'data', 'paises'));
    }


    //Metodo pesquisa
    public function search(){
        $find = $this->request->get('search');
        $data = $this->model
            ->join('pais', 'pais.id', '=', 'estados.pais_id')
            ->select('estados.nome', 'estados.id','estados.uf', 'pais.nome as pais')
            ->Where('estados.nome', 'LIKE', "%$find%")
            ->orWhere('pais.nome', $find)
            ->orWhere('estados.uf', $find)
            ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }
}