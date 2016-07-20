<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Pais;

class PaisController extends StandardController
{
    protected $model;
    protected $view = ('painel.pais');
    protected $route = ('/painel/countries');
    protected $request, $pais;
    protected $find1 = ('nome'), $find2 = ('user_id');


    public function __construct(Request $request, Pais $pais)
    {
        $this->request = $request;
        $this->model = $pais;
    }

    public function addNow()
    {
        //recupera dados do formulário
        $form = $this->request->all();
        //$form['user_id'] = auth()->user()->id;

        //valida os dados recebidos;
        $validator = validator($form, $this->model->rules);

        //testa se encontrou erros;
        if ($validator->fails()) {
            return redirect("{$this->route}/add")
                ->withErrors($validator)
                ->withInput();
        }

        $insert = $this->model->create($form);

        if ($insert) {
            return redirect($this->route);
        } else {
            return redirect("{$this->route}/add")
                ->withErrors(['errors' => 'Não foi possivel completar a operação'])
                ->withInput();
        }
    }

    public function edtNow($id)
    {
        $form = $this->request->except('_token');
        //$form['user_id'] = auth()->user()->id;
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
    public function search(){
        $find = $this->request->get('search');
        $data = $this->model->where($this->find1, 'LIKE', "%$find%")
            ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }
}
