<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Cliente;
use App\Cidade;
use App\User;
use App\Lista;

class ClienteController extends StandardController
{
    protected $model;
    protected $view = ('painel.customers');
    protected $route = ('/painel/customers');
    protected $request, $lista, $cidade, $user, $cliente;

    public function __construct(Request $request, Cliente $cliente, Lista $lista, Cidade $cidade, User $user)
    {
        $this->request      = $request;
        $this->model        = $cliente;
        $this->cidade       = $cidade;
        $this->user         = $user;
        $this->lista         = $lista;
    }

//Recupera pais para fazer a inserção neste método...
    public function index(){
        $title = ('MM Cia Marketing: Listagem de registros');
        //$data = $this->model->paginate($this->itensForPage);
        $data = $this->model
            ->join('cidades',   'cidades.id',   '=',    'clientes.cidade_id')
            ->join('listas',   'listas.id',   '=',    'clientes.lista_id')
            ->join('users',      'users.id',      '=',    'clientes.user_id')
            ->select('clientes.*', 'cidades.nome as cidade', 'listas.nome as empresa', 'users.name as user')
            ->paginate($this->itensForPage);
        return view("{$this->view}.gestao", compact('data', 'title', 'valorDescontado'));
    }

//Método Adicionar (chama formulário) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function add(){
        $title = ('MM Cia Marketing: Adicionar novo registro');
        //Recupera dados das Models Agragadas;
        $listas         = $this->lista->orderBy('nome')->get();
        $cidades        = $this->cidade->orderBy('nome')->get();
        return view("{$this->view}.form", compact('title', 'cidades', 'listas', 'clientes'));
    }
//Realiza o cadastro do item --->
    public function addNow(){
        //recupera dados do formulário
        $form = $this->request->all();
        $form['user_id'] = auth()->user()->id;

        //valida os dados recebidos;
        $validator = validator($form, $this->model->rules);

        //testa se encontrou erros;
        if($validator->fails()){
            return redirect("{$this->route}/add")
                ->withErrors($validator)
                ->withInput();
        }
        $insert = $this->model->create($form);

        if($insert){
            return redirect($this->route);
        } else {
            return redirect("{$this->route}/add")
                ->withErrors(['errors' => 'Não foi possivel completar a operação'])
                ->withInput();
        }
    }

//Edicação Metódo :::::::::::::::::::::::::::::::::::::::::::::::
    public function edt($id, $act)
    {
        $title = ('MM Cia Marketing: Editar registro');
        $listas         = $this->lista->orderBy('nome')->get();
        $cidades        = $this->cidade->orderBy('nome')->get();
        //Recupera os dados e preenche o formulário por id;
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('title', 'id', 'act', 'data', 'cidades', 'listas', 'clientes'));
    }
    public function edtNow($id)
    {
        $form = $this->request->except('_token');
        $form['user_id'] = auth()->user()->id;

        //validação espcial
        $rules       = [
            'respNomeContrato'  =>  'required|min:3|max:150',
            'endereco'          =>  'required|max:200',
            'bairro'            =>  'required|max:100',
            'cep'               =>  'required|max:20',
            'cpfCnpj'           =>  "required|max:20|unique:clientes,cpfCnpj,{$id}",
            'email'             =>  'required|email|max:190',
            'dataVencimento'    =>  'required|date',
            'dataEntrada'       =>  'required|date',
            'fone0'             =>  'required|min:9|max:18',
            'fone1'             =>  'min:9|max:18',
            'fonew'             =>  'min:9|max:18',
            'ativo'             =>  'required',
            'lista_id'          =>  'required',
            'cidade_id'         =>  'required',
        ];

        $validator = validator($form, $rules);
        if( $validator->fails() ){
            return redirect("{$this->route}/edt/{$id}/e")
                ->withErrors($validator)
                ->withInput();
        }
        $this->model->where('id', $id)->update($form);
        return redirect($this->route);
    }

//Remove Metodo ::::::::::::::::::::::::::::::::::::::::::::::::::
    public function del($id, $act)
    {
        $title = ('MM Cia Marketing: Apagar / Deletar um registro');
        $listas         = $this->lista->orderBy('nome')->get();
        $cidades        = $this->cidade->orderBy('nome')->get();
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('id', 'act', 'data', 'title', 'cidades', 'listas', 'clientes'));
    }

//Detalha um dado exigido pelo usuário ::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function show($id){
        $title = ('MM Cia Marketing: Detalhar um registro');
        $data = $this->model
            ->join('cidades',   'cidades.id',   '=',    'clientes.cidade_id')
            ->join('listas',    'listas.id',    '=',    'clientes.lista_id')
            ->join('users',     'users.id',     '=',    'clientes.user_id')
            ->join('estados', 'estados.id', '=', 'listas.estado_id')
                ->select('clientes.*', 'cidades.nome as cidade', 'listas.nome as empresa', 'users.name as user', 'estados.nome as estado')
                    ->Where('clientes.id', $id)
            ->get();
        return view("{$this->view}.show", compact('data', 'title', 'id', 'valorDescontado'));
    }

//Método de busca ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function search(){
        $find = $this->request->get('search');
        $data = $this->model
            ->join('cidades',   'cidades.id',   '=',    'clientes.cidade_id')
            ->join('listas',   'listas.id',   '=',    'clientes.lista_id')
            ->join('users',      'users.id',      '=',    'clientes.user_id')
            ->select('clientes.*', 'cidades.nome as cidade', 'listas.nome as empresa', 'users.name as user')
                ->Where('clientes.nome', 'LIKE', "%$find%")
                ->orWhere('clientes.endereco', $find)
                ->orWhere('clientes.email', $find)
                ->orWhere('clientes.fone0', $find)
                ->orWhere('clientes.foneW', $find)
                ->orWhere('clientes.ativo', $find)
                ->orWhere('empresa', $find)
                ->orWhere('cidade', $find)
                ->orWhere('clientes.cpfCnpj', $find)
                ->orWhere('estados.dataEntrada', $find)
                ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }
}