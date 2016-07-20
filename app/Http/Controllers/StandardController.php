<?php
namespace app\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Requests;
class StandardController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    //Variaveis protegidas e que podem ser usadas em todos os Controllers;
    protected $request;
    protected $itensForPage = 20;

    //Método construtor para Injeção de Dependencias genérico;
    public function __construct()
    {

    }

//Listagem :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function index(){
        $title = ('MM Cia Marketing: Listagem de registros');
        $data = $this->model->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data', 'title'));
    }

//Método Adicionar (chama formulário) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    public function add(){
        $title = ('MM Cia Marketing: Adicionar novo registro');
        return view("{$this->view}.form", compact('title'));
    }
//Realiza o cadastro do item --->
    public function addNow(){
        //recupera dados do formulário
        $form = $this->request->all();

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
        //Recupera os dados e preenche o formulário por id;
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('title', 'id', 'act', 'data'));
    }
    public function edtNow($id)
    {
        $form = $this->request->except('_token');
        //validação
        $validator = validator($form, $this->model->rules);
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
        $data = $this->model->find($id);
        return view("{$this->view}.form", ['id' => $id, 'data' => $data], compact('id', 'act', 'data', 'title'));
    }
    public function delNow($id)
    {
        $confirma = $this->request->only('confirma');
        if($confirma == true){
            $data = $this->model->find($id);
            $data->delete();
        }
        return redirect($this->route);
    }

    public function search(){
        $find = $this->request->get('search');
        $data = $this->model->where($this->find1, 'LIKE', "%$find%")
                                        ->orWhere($this->find2, 'LIKE', "%$find%")
                                        ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }
}