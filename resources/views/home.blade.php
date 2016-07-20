@extends('layouts.portal.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><!--
                    @forelse($paises as $pais)
                        @can('show', $pais)
                            <h1>{{$pais->nome}}</h1>
                            <!-- mostra nome do usuário -->
                            <b>{{$pais->user->name}}</b>
                            @can('edit', $pais)
                                <a href="{{url("/editar/$pais->id")}}">Alterar</a>
                            @endcan
                            <hr>
                        @endcan
                    @empty
                        <p>Nada cadastrado</p>

                    @endforelse

                --></div>

                <div class="panel-body">
                    Gostaria de <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>SAIR</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
