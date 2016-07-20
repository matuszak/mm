@extends('layouts.portal.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @can(('show'), $p)
                            <h1>{{$p->nome}}</h1>
                            <!-- mostra nome do usuário -->
                            <b>{{$p->user->name}}</b>
                            <hr>
                        @endcan
                    </div>
                    <div class="panel-body">
                        Olá {{ auth()->user()->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection