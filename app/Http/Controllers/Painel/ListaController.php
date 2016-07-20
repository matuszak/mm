<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Lista;
use App\Departamento;
use App\Cidade;
use App\Estado;
use App\Pais;

class ListaController extends StandardController
{
    protected $model;
    protected $view = ('painel.listas');
    protected $route = ('/painel/lists');
    protected $request, $lists, $departamento, $cidade, $estado, $pais;
    protected $find1 =  ('name'), $find2 = ('label');

    public function __construct(Request $request, Lista $lists, Cidade $cidade, Estado $estado, Pais $pais, Departamento $departamento)
    {
        $this->request      = $request;
        $this->model        = $lists;
        $this->cidade       = $cidade;
        $this->estado       = $estado;
        $this->pais         = $pais;
        $this->departamento = $departamento;
    }

//Recupera pais para fazer a inserção neste método...
    public function index(){
        $title = ('MM Cia Marketing: Listagem de registros');
        //$data = $this->model->paginate($this->itensForPage);
        $data = $this->model
            ->join('cidades',   'cidades.id',   '=',    'listas.cidade_id')
            ->join('estados',   'estados.id',   '=',    'listas.estado_id')
            ->join('pais',      'pais.id',      '=',    'listas.pais_id')
            ->join('departamentos', 'departamentos.id', '=', 'listas.departamento_id')
            ->select('listas.*', 'pais.nome as pais', 'estados.nome as estado', 'cidades.nome as cidade', 'departamentos.nome as departamento')
            ->paginate($this->itensForPage);
        return view("{$this->view}.gestao", compact('data', 'title'));
    }

//Método Adicionar (chama formulário) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function add(){
        $title = ('MM Cia Marketing: Adicionar novo registro');
        //Recupera dados das Models Agragadas;
        $paises         = $this->pais->orderBy('nome')->get();
        $estados        = $this->estado->orderBy('nome')->get();
        $cidades        = $this->cidade->orderBy('nome')->get();
        $departamentos  = $this->departamento->orderBy('nome')->get();
        return view("{$this->view}.form", compact('title', 'paises', 'estados', 'cidades', 'departamentos'));
    }

//Edicação Metódo :::::::::::::::::::::::::::::::::::::::::::::::
    public function edt($id, $act)
    {
        $title = ('MM Cia Marketing: Editar registro');
        $paises         = $this->pais->orderBy('nome')->get();
        $estados        = $this->estado->orderBy('nome')->get();
        $cidades        = $this->cidade->orderBy('nome')->get();
        $departamentos  = $this->departamento->orderBy('nome')->get();
        //Recupera os dados e preenche o formulário por id;
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('title', 'id', 'act', 'data', 'paises', 'estados', 'cidades', 'departamentos'));
    }

//Remove Metodo ::::::::::::::::::::::::::::::::::::::::::::::::::
    public function del($id, $act)
    {
        $title = ('MM Cia Marketing: Apagar / Deletar um registro');
        $paises         = $this->pais->orderBy('nome')->get();
        $estados        = $this->estado->orderBy('nome')->get();
        $cidades        = $this->cidade->orderBy('nome')->get();
        $departamentos  = $this->departamento->orderBy('nome')->get();
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('id', 'act', 'data', 'title', 'paises', 'estados', 'cidades', 'departamentos'));
    }

//Detalha um dado exigido pelo usuário ::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function show($id){
        $title = ('MM Cia Marketing: Detalhar um registro');
        $data = $this->model
            ->join('cidades',   'cidades.id',   '=',    'listas.cidade_id')
            ->join('estados',   'estados.id',   '=',    'listas.estado_id')
            ->join('pais',      'pais.id',      '=',    'listas.pais_id')
            ->join('departamentos', 'departamentos.id', '=', 'listas.departamento_id')
            ->select('listas.*', 'pais.nome as pais', 'estados.nome as estado', 'cidades.nome as cidade', 'departamentos.nome as departamento')
            ->Where('listas.id', $id)->get();
        return view("{$this->view}.show", compact('data', 'title', 'id'));
    }

    public function search(){
        $find = $this->request->get('search');
        $data = $this->model
            ->join('cidades',   'cidades.id',   '=',    'listas.cidade_id')
            ->join('estados',   'estados.id',   '=',    'listas.estado_id')
            ->join('pais',      'pais.id',      '=',    'listas.pais_id')
            ->join('departamentos', 'departamentos.id', '=', 'listas.departamento_id')
            ->select('listas.*', 'pais.nome as pais', 'estados.nome as estado', 'cidades.nome as cidade', 'departamentos.nome as departamento')
            ->Where('listas.nome', 'LIKE', "%$find%")
            ->orWhere('listas.endereco', $find)
            ->orWhere('listas.email', $find)
            ->orWhere('listas.fone0', $find)
            ->orWhere('listas.foneW', $find)
            ->orWhere('listas.nomeGerente', $find)
            ->orWhere('listas.sobrenomeGerente', $find)
            ->orWhere('listas.cnpj', $find)
            ->orWhre('pais.nome', $find)
            ->orWhre('estados.nome', $find)
            ->orWhre('cidades.nome', $find)
            ->orWhre('departamentos.nome', $find)
            ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }

}
