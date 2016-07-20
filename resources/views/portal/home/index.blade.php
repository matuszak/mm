@extends('layouts.portal.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bem vindo!</div>

                    <div class="panel-body">
                        Página principal do portal por enquanto!.

                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection