@extends('layouts.painel.templatePainel')

@section('content')
        <!-- título da sessão -->
<div class="page-header">
    <h1 class="title text-uppercase">Gerenciar: <b>Países</b></h1>
</div>
<?php @$tiDEL = ("<p class='aviso'>ATENSÃO: Depois de remover este cadastro, não será possível recupera-lo!</p>"); ?>
<!-- Verificação de erros -->
@if( isset($errors) && count($errors) > 0 )
    <div class="alert-danger">
        @foreach( $errors->all() as $error)
            {{$error}}
            <br>
        @endforeach
    </div>
    @endif
            <!-- Verifica tipo de ação e setagem das variavéis; -->
    @if( (isset($data)) and (isset($act)) )
    @if($act == 'e')
            <!-- AÇÃO DE EDITAR -->
    <h1 class="text-uppercase"><?php //echo ($tiEDT); ?></h1><br>
    <form class="form" method="post" action="/painel/countries/edt/{{$data->id}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Nome do país</label>
            <input type="text" name="nome" placeholder="Preencha nome do país" value="{{ $data->nome or old('nome')  }}" class="form-control text-capitalize">
        </div>

        <!--botao Editar -->
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
        @else
                <!-- AÇÃO DE DELETAR/APAGAR -->
        <h1 class="alert-danger"><?php echo ($tiDEL); ?></h1>
        <form class="form" method="post" action="/painel/countries/del/{{$data->id}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome do país</label>
                <input type="text" name="nome" value="{{ $data->nome or old('nome')  }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <input type="hidden" name="confirma" value="true">
            </div>

            <!--botao Apagar -->
            <div class="form-group">
                <input type="submit" name="enviar" value="Salvar" class="btn btn-danger">
            </div>

            @endif
            @else
                    <!-- AÇÃO DE INCLUIR/ADICIONAR -->
            <h1 class="text-uppercase"><?php //echo ($tiADD); ?></h1><br>
            <form class="form" method="post" action="/painel/countries/add">
                {{csrf_field()}}
                <div class="form-group" >
                    <label>Nome do país</label>
                    <input type="text" name="nome" placeholder="Nome do País, ex: Brasil" class="form-control text-capitalize">
                </div>

                <!--botao Novo -->
                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </div>
                @endif
            </form>
    @endsection