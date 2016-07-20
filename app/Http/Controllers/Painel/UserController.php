<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\User;

class UserController extends StandardController
{
    protected $model;
    protected $view = ('painel.users');
    protected $route = ('/painel/users');
    protected $request, $user;
    protected $find1 = ('name'), $find2 = ('email');

    public function __construct(Request $request, User $user)
    {
        $this->request  = $request;
        $this->model    = $user;
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
        //criptografa a senha;
        $form['password'] = bcrypt($form['password']);

        //realiza a inserção;
        $insert = $this->model->create($form);

        if($insert){
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

        //validação Especial;
        $rules = [
            'name'                  => 'min:3|required|max:100',
            'email'                 => "required|unique:users,email,{$id}|email|max:190",
            'password'              => 'min:3|max:25|confirmed',
        ];

        $validator = validator($form, $rules);

        if( $validator->fails() ){
            return redirect("{$this->route}/edt/{$id}/e")
                ->withErrors($validator)
                ->withInput();
        }

        // Verifica se a senha foi alterada se foi, muda para modo criptografado, caso contrário deixa em branco e não altera
        //criptografa a senha;
        if( count($form['password']) > 0 ) {
            $form['password'] = bcrypt($form['password']);
        }
        else {
            unset($form['password']);
        }
        //realiza a alteração
        $this->model->where('id', $id)->update($form);
        return redirect($this->route);
    }

    public function search(){
        $find = $this->request->get('search');
        $data = $this->model->where($this->find1, 'LIKE', "%$find%")
            ->orWhere($this->find2, $find)
            ->paginate($this->itensForPage);

        return view("{$this->view}.gestao", compact('data'));
    }
}
