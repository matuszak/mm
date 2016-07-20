@extends('layouts.painel.templatePainel')

@section('content')
    <div class="page-header">
        <!-- título da sessão -->
        <h1 class="title text-uppercase">Gerenciar: <b>Usuário</b></h1>
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
        <form class="form" method="post" action="/painel/users/edt/{{$data->id}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Nome de usuário</label>
                <input type="text" name="name" placeholder="Digite um nome de usúario" value="{{ $data->name or old('name')  }}" class="form-control text-capitalize">
            </div>
            <div class="form-group">
                <label>E-mail para login</label>
                <input type="email" name="email" placeholder="Exemplo: 'usuario@servidor.com'" value="{{ $data->email or old('email')  }}" class="form-control text-lowercase">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" value="{{ old('password')  }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirmação de senha</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation')  }}" class="form-control">
            </div>

            <!--botao Editar -->
            <div class="form-group">
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
            @else
                    <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="alert-danger"><?php echo ($tiDEL); ?></h1>
            <form class="form" method="post" action="/painel/users/del/{{$data->id}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" value="{{ $data->name or old('name')  }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="{{ $data->email or old('email')  }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <input type="password" name="password" value="{{ $data->password or old('password')  }}" class="form-control" disabled>
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
                <form class="form" method="post" action="/painel/users/add">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nome de usuário</label>
                        <input type="text" name="name" placeholder="Digite um nome de usúario" value="{{ $data->name or old('name')  }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>E-mail para login</label>
                        <input type="email" name="email" placeholder="Exemplo: 'usuario@servidor.com'" value="{{ $data->email or old('email')  }}" class="form-control text-lowercase">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="password" value="{{ old('password')  }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirmação de senha</label>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation')  }}" class="form-control">
                    </div>

                    <!--botao Novo -->
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                    @endif
                </form>
@endsection