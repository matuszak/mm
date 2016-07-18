@extends('layouts.painel.templatePainel')

@section('content')
<div class="container">
    <!-- título da sessão -->
    <h1 class="title">Gestão de Países</h1>
    <!--
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    -->
<!-- Verificação de erros -->
    @if( isset($errors) && count($errors) > 0 )
        <div class="alert-danger">
            @foreach( $errors->all() as $error)
                {{$error}}
                <br>
            @endforeach
        </div>
    @endif

    <form class="form" method="post" action="/painel/contries/add">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="nome" placeholder="Preencha nome do país" class="form-control">
        </div>
        <div class="form-group">
            <input type="hidden" name="user_id" value=1 class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
        </div>
    </form>
</div>
@endsection