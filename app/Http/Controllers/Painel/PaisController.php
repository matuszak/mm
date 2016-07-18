<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pais;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    protected $request;
    public function __construct(Request $request, Pais $pais)
    {
        $this->request  = $request;
        $this->pais     = $pais;
    }

    public function index(){
        $title = ('MM CIA Marketing: Listagem de Países');
        $paises = $this->pais->all();

        return view('painel.pais.gestao', compact('paises'));
    }

    public function add(){
        $title = ('Gestão de países');
        return view('painel.pais.form', compact('title'));
    }

    public function addInsert(){
        $title = ('Gestão de países');
        $form = $this->request->all();
        $validator = validator($form, $this->pais->rules);
        if($validator->fails()){
            return redirect('/painel/countries/add')
                    ->withErrors($validator)
                    ->withInputs();
        }
        $insert = $this->pais->create($form);
        if($insert){
            return redirect('/painel/countries');
        } else {
            return redirect('/painel/countries/add')
                                    ->withErrors(['errors' => 'Não foi possivel completar a operação'])
                                    ->withInput();
        }
    }
}
