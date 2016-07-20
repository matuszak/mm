@extends('layouts.painel.templatePainel')

@section('content')
<!-- título da sessão -->
<div class="page-header">
    <h1 class="title text-uppercase">Gerenciar: <b>Cidade</b></h1>
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
        <form class="form" method="post" action="/painel/cities/edt/{{$data->id}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome do Estado</label>
                <input type="text" name="nome" placeholder="Ex: 'edita_paises'" value="{{ $data->nome or old('nome')  }}" class="form-control" >
            </div>
            <div class="form-group">
                <label>União Federativa: UF</label>
                <input type="text" name="uf" value="{{ $data->uf or old('uf')  }}" class="form-control" >
            </div>
            <div class="form-group">
                <label>Selecione o país</label>
                <select name="pais_id" class="form-control">
                    @foreach($paises as $pais)
                        <option value="{{  $pais->id }}"
                                @if((isset($data->pais_id)) && ($data->pais_id == $pais->id))
                                selected
                                @endif >
                            {{ $pais->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!--botao Editar -->
            <div class="form-group">
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
            @else
                    <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="alert-danger"><?php echo ($tiDEL); ?></h1>
            <form class="form" method="post" action="/painel/cities/del/{{$data->id}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Nome do Estado</label>
                    <input type="text" name="nome" placeholder="Ex: 'edita_paises'" value="{{ $data->nome or old('nome')  }}" class="form-control" disabled >
                </div>
                <div class="form-group">
                    <label>União Federativa: UF</label>
                    <input type="text" name="uf" value="{{ $data->uf or old('uf')  }}" class="form-control" disabled>
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
                <form class="form" method="post" action="/painel/cities/add">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Selecione o país</label>
                        <select name="pais_id" class="form-control">
                            @foreach($paises as $pais)
                                <option value="{{  $pais->id }}">{{ $pais->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Selecione o estado</label>
                        <select name="estado_id" class="form-control">
                            @foreach($estados as $estado)
                                <option value="{{  $estado->id }}">{{ $estado->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome da cidade</label>
                        <input type="text" name="nome" placeholder="Nome da cidade" value="{{ $data->nome or old('nome')  }}" class="form-control" >
                    </div>

                    <!--botao Novo -->
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                    @endif
    </form>
@endsection