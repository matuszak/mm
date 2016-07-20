<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Cidade;
use App\Pais;
use App\Estado;

class CidadeController extends StandardController
{
    protected $model;
    protected $view = ('painel.cities');
    protected $route = ('/painel/cities');
    protected $request, $city, $estado, $pais;
    protected $find1 =  ('name'), $find2 = ('label');

    public function __construct(Request $request, Cidade $city, Estado $estado, Pais $pais)
    {
        $this->request  = $request;
        $this->model    = $city;
        $this->estado   = $estado;
        $this->pais     = $pais;
    }

    //Recupera pais para fazer a inserção neste método...
    public function index(){
        $title = ('MM Cia Marketing: Listagem de registros');

        //$data = $this->model->paginate($this->itensForPage);
        $data = $this->model
            ->join('pais', 'pais.id', '=', 'cidades.pais_id')
            ->join('estados', 'estados.id', '=', 'cidades.estado_id')
                ->select('cidades.nome', 'cidades.id', 'pais.nome as pais', 'estados.nome as estado')
                ->paginate($this->itensForPage);
        return view("{$this->view}.gestao", compact('data', 'title', 'paises', 'estados'));
    }

    //Método Adicionar (chama formulário) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function add(){
        $title = ('MM Cia Marketing: Adicionar novo registro');
        $paises = $this->pais->orderBy('nome')->get();
        $estados = $this->estado->orderBy('nome')->get();
        return view("{$this->view}.form", compact('title', 'paises', 'estados'));
    }

    //Método Editar (chmar forumlário) :::::::::::::::::::::
    public function edt($id, $act)
    {
        $title = ('MM Cia Marketing: Editar registro');

        //Recupera os dados e preenche o formulário por id;
        $paises = $this->pais->orderBy('nome')->get();
        $estados = $this->estado->orderBy('nome')->get();
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('title', 'id', 'act', 'data', 'paises', 'estados'));
    }

    //Metodo pesquisa
    public function search(){
        $find = $this->request->get('search');
        $data = $this->model
            ->join('pais', 'pais.id', '=', 'cidades.pais_id')
            ->join('estados', 'estados.id', '=', 'cidades.estado_id')
                ->select('cidades.nome', 'cidades.id', 'pais.nome as pais', 'estados.nome as estado')
                    ->Where('cidades.nome', 'LIKE', "%$find%")
                    ->orWhere('estados.nome', $find)
                    ->orWhere('pais.nome', $find)
            ->paginate($this->itensForPage);
        return view("{$this->view}.gestao", compact('data'));
    }
}
