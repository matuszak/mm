<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StandardController;
use App\Http\Requests;
use App\Cliente;

class ClienteController extends StandardController
{
    protected $model;
    protected $view = ('painel.customers');
    protected $route = ('/painel/customers');
    protected $request, $customer;
    protected $find1 =  ('name'), $find2 = ('label');

    public function __construct(Request $request, Cliente $customer)
    {
        $this->request  = $request;
        $this->model    = $customer;
    }
}