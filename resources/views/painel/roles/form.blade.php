@extends('layouts.painel.templatePainel')

@section('content')
    <div class="page-header">
        <!-- título da sessão -->
        <h1 class="title text-uppercase">Gerenciar: <b>Papél/Função</b></h1>
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
        <form class="form" method="post" action="/painel/roles/edt/{{$data->id}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome do papél</label>
                <input type="text" name="name" placeholder="Nome para o papél ex: 'editor'" value="{{ $data->name or old('name')  }}" class="form-control" >
            </div>
            <div class="form-group">
                <label>Descrição para o papél</label>
                <input type="text" name="label" placeholder="Descreva o intem cadastrado" value="{{ $data->label or old('label')  }}" class="form-control" >
            </div>

            <!--botao Editar -->
            <div class="form-group">
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
            @else
                    <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="alert-danger"><?php echo ($tiDEL); ?></h1>
            <form class="form" method="post" action="/painel/roles/del/{{$data->id}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Nome do papél</label>
                    <input type="text" name="name" placeholder="Nome para o papél ex: 'editor'" value="{{ $data->name or old('name')  }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Descrição para o papél</label>
                    <input type="text" name="label" placeholder="Descreva o intem cadastrado" value="{{ $data->label or old('label')  }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_id" value="" class="form-control">
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
                <form class="form" method="post" action="/painel/roles/add">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nome do papél</label>
                        <input type="text" name="name" placeholder="Nome para o papél ex: 'editor'" value="{{ $data->name or old('name')  }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Descrição para o papél</label>
                        <input type="text" name="label" placeholder="Descreva o intem cadastrado" value="{{ $data->label or old('label')  }}" class="form-control" >
                    </div>

                    <!--botao Novo -->
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                    @endif
                </form>
@endsection