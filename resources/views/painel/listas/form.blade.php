@extends('layouts.painel.templatePainel')

@section('content')
<!-- título da sessão -->
<div class="page-header">
    <h1 class="title text-uppercase">Gerenciar: <b>Agenda</b></h1>
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
        <form class="form" method="post" action="/painel/lists/edt/{{$data->id}}">
            {{csrf_field()}}
             <!-- Select País -->
            <div class="form-group">
                <label for="pais_id">País</label>
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
                <span class="help-block">Não encontrou o PAÍS, <a href="{{ url('/painel/countries/add') }}">cadastre aqui</a></span>
            </div>

            <!-- Select Estado -->
            <div class="form-group">
                <label for="estado_id">Estado</label>
                <select name="estado_id" class="form-control">
                    @foreach($estados as $estado)
                        <option value="{{  $estado->id }}"
                                @if((isset($data->estado_id)) && ($data->estado_id == $estado->id))
                                selected
                                @endif >
                            {{ $estado->nome }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">Não encontrou o ESTADO, <a href="{{ url('/painel/estados/add') }}">cadastre aqui</a></span>
            </div>

            <!-- Select Cidade -->
            <div class="form-group">
                <label for="cidade_id">Cidade</label>
                <select name="cidade_id" class="form-control">
                    @foreach($cidades as $city)
                        <option value="{{  $city->id }}"
                                @if((isset($data->cidade_id)) && ($data->cidade_id == $city->id))
                                selected
                                @endif >
                            {{ $city->nome }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">Não encontrou a CIDADE, <a href="{{ url('/painel/cities/add') }}">cadastre aqui</a></span>
            </div>

            <!-- Select Departamento -->
            <div class="form-group">
                <label for="departamento_id">Departamento</label>
                <select name="departamento_id" class="form-control">
                    @foreach($departamentos as $departamento)
                        <option value="{{  $departamento->id }}"
                                @if((isset($data->departamento_id)) && ($data->departamento_id == $departamento->id))
                                selected
                                @endif >
                            {{ $departamento->nome }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">Não encontrou o DEPARTAMENTO, <a href="{{ url('/painel/departamentos/add') }}">cadastre aqui</a></span>
            </div>

            <!-- Text NOME DA EMPRESA -->
            <div class="form-group">
                <label for="nome">Nome da empresa</label>
                <input id="nome" name="nome" type="text" placeholder="Nome da empresa" value="{{ $data->nome or old('nome')  }}" class="form-control" required="">
            </div>

            <!-- Text ENDEREÇO DA EMPRESA -->
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text" placeholder="Localização da empresa, Rua, Avenida.. outros" value="{{ $data->endereco or old('endereco')  }}" class="form-control" required="">
            </div>

            <!-- Text CNPJ DA EMPRESA -->
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input id="cnpj" name="cnpj" type="text" placeholder="CNPJ da empresa" value="{{ $data->cnpj or old('cnpj')  }}" class="form-control" required="">
            </div>

            <!-- Prepended E-MAIL DA EMPRESA -->
            <div class="form-group">
                <label for="email">E-mail da empresa</label>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input id="email" name="email" class="form-control" placeholder="e-mail usado para contato da sua empresa" value="{{ $data->email or old('email')  }}" type="text" required="">
                </div>
            </div>

            <!-- Text FONE0 - PRINCIPAL -->
            <div class="form-group">
                <label for="fone0">Fone:</label>
                <input id="fone0" name="fone0" type="text" placeholder="Ex: (xx) xxxxx-xxxx" value="{{ $data->fone0 or old('fone0')  }}" class="form-control" required="">
            </div>

            <!-- Text FONE1 - SECUNDÁRIO SE HOUVER -->
            <div class="form-group">
                <label for="fone1">Fone Alternativo: </label>
                <input id="fone1" name="fone1" type="text" placeholder="Se houver" value="{{ $data->fon1 or old('fone1')  }}" class="form-control">
            </div>

            <!-- Text FONE2 - SEGUNDO SECUNDÁRIO -->
            <div class="form-group">
                <label for="fone2">Fone Alternativo:</label>
                <input id="fone2" name="fone2" type="text" placeholder="Se houver" value="{{ $data->fone2 or old('fone2')  }}" class="form-control">
            </div>

            <!-- Text FONE WHATSAPP -->
            <div class="form-group">
                <label for="foneW">Fone Whatsapp</label>
                <input id="foneW" name="foneW" type="text" placeholder="Se houver" value="{{ $data->foneW or old('foneW')  }}" class="form-control">
            </div>

            <!-- Text NOME GERENTE OU DONO (RESPONSÁVEL PELO CADASTRO) -->
            <div class="form-group">
                <label for="nomeGerente">Nome Responsável</label>
                <input id="nomeGerente" name="nomeGerente" value="{{ $data->nomeGerente or old('nomeGerente')  }}" type="text" placeholder="Nome de uma pessoa responsável pela empresa" class="form-control" required="">
            </div>

            <!-- Text SOBRE NOME DA PESSOA RESPONSÁVEL -->
            <div class="form-group">
                <label for="sobrenomeGerente">Sobre Nome do Responsável</label>
                <input id="sobrenomeGerente" name="sobrenomeGerente" value="{{ $data->sobrenomeGerente or old('sobrenomeGerente')  }}" type="text" placeholder="Sobre nome da mesma pessoa que foi digitado o nome" class="form-control" required="">
            </div>

            <!-- Text NÚMERO DA EMPRESA SE HOUVER -->
            <div class="form-group">
                <label for="numeroEmpresa">Número da Empresa</label>
                <input id="numeroEmpresa" name="numeroEmpresa" type="text" value="{{ $data->numeroEmpresa or old('numeroEmpresa')  }}" placeholder="Número da empresa se houver" class="form-control">
            </div>

            <!-- Text ENDEREÇO DE UMA IMAGEM DA EMPRESA SE HOUVER -->
            <div class="form-group">
                <label for="imagem">Endereço da sua imagem</label>
                <input id="imagem" name="imagem" type="text" value="{{ $data->imagem or old('imagem')  }}" placeholder="Ex: http://www.seusite.com.br/imagens/imagem.jpg" class="form-control">
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label for="website">Website da empresa</label>
                <input id="website" name="website" type="text" value="{{ $data->website or old('website')  }}" placeholder="Ex: www.suaempresa.com.br" class="form-control">
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label for="active">Ativo</label>
                <label class="checkbox-inline" for="active-0">
                    <input type="checkbox" name="active" id="active-0" value="1"
                           @if((isset($data->active) && ($data->active == 1)))
                           checked >
                    Sim
                </label>
                <label class="checkbox-inline" for="active-1">
                    <input type="checkbox" name="active" id="active-1" value="0"
                           @else
                           checked >
                    Não
                </label>
                @endif
                <br><br>
            </div>

            <!--botao Editar -->
            <div class="form-group">
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
            @else


                    <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="alert-danger"><?php echo ($tiDEL); ?></h1>
            <form class="form" method="post" action="/painel/lists/del/{{$data->id}}">
                {{csrf_field()}}
                        <!-- Select País -->
                <div class="form-group">
                    <label for="pais_id">País</label>
                    <select name="pais_id" class="form-control" disabled>
                        @foreach($paises as $pais)
                            <option value="{{  $pais->id }}"
                                    @if((isset($data->pais_id)) && ($data->pais_id == $pais->id))
                                    selected
                                    @endif >
                                {{ $pais->nome }}
                            </option>
                        @endforeach
                    </select>
                    <span class="help-block">Não encontrou o PAÍS, <a href="{{ url('/painel/countries/add') }}">cadastre aqui</a></span>
                </div>

                <!-- Select Estado -->
                <div class="form-group">
                    <label for="estado_id">Estado</label>
                    <select name="estado_id" class="form-control" disabled>
                        @foreach($estados as $estado)
                            <option value="{{  $estado->id }}"
                                    @if((isset($data->estado_id)) && ($data->estado_id == $estado->id))
                                    selected
                                    @endif >
                                {{ $estado->nome }}
                            </option>
                        @endforeach
                    </select>
                    <span class="help-block">Não encontrou o ESTADO, <a href="{{ url('/painel/estados/add') }}">cadastre aqui</a></span>
                </div>

                <!-- Select Cidade -->
                <div class="form-group">
                    <label for="cidade_id">Cidade</label>
                    <select name="cidade_id" class="form-control" disabled>
                        @foreach($cidades as $city)
                            <option value="{{  $city->id }}"
                                    @if((isset($data->cidade_id)) && ($data->cidade_id == $city->id))
                                    selected
                                    @endif >
                                {{ $city->nome }}
                            </option>
                        @endforeach
                    </select>
                    <span class="help-block">Não encontrou a CIDADE, <a href="{{ url('/painel/cities/add') }}">cadastre aqui</a></span>
                </div>

                <!-- Select Departamento -->
                <div class="form-group">
                    <label for="departamento_id">Departamento</label>
                    <select name="departamento_id" class="form-control" disabled>
                        @foreach($departamentos as $departamento)
                            <option value="{{  $departamento->id }}"
                                    @if((isset($data->departamento_id)) && ($data->departamento_id == $departamento->id))
                                    selected
                                    @endif >
                                {{ $departamento->nome }}
                            </option>
                        @endforeach
                    </select>
                    <span class="help-block">Não encontrou o DEPARTAMENTO, <a href="{{ url('/painel/departamentos/add') }}">cadastre aqui</a></span>
                </div>

                <!-- Text NOME DA EMPRESA -->
                <div class="form-group">
                    <label for="nome">Nome da empresa</label>
                    <input id="nome" name="nome" type="text" placeholder="Nome da empresa" value="{{ $data->nome or old('nome')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Text ENDEREÇO DA EMPRESA -->
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input id="endereco" name="endereco" type="text" placeholder="Localização da empresa, Rua, Avenida.. outros" value="{{ $data->endereco or old('endereco')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Text CNPJ DA EMPRESA -->
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input id="cnpj" name="cnpj" type="text" placeholder="CNPJ da empresa" value="{{ $data->cnpj or old('cnpj')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Prepended E-MAIL DA EMPRESA -->
                <div class="form-group">
                    <label for="email">E-mail da empresa</label>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input id="email" name="email" class="form-control" placeholder="e-mail usado para contato da sua empresa" value="{{ $data->email or old('email')  }}" type="text" required="" disabled>
                    </div>
                </div>

                <!-- Text FONE0 - PRINCIPAL -->
                <div class="form-group">
                    <label for="fone0">Fone:</label>
                    <input id="fone0" name="fone0" type="text" placeholder="Ex: (xx) xxxxx-xxxx" value="{{ $data->fone0 or old('fone0')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Text FONE1 - SECUNDÁRIO SE HOUVER -->
                <div class="form-group">
                    <label for="fone1">Fone Alternativo: </label>
                    <input id="fone1" name="fone1" type="text" placeholder="Se houver" value="{{ $data->fon1 or old('fone1')  }}" class="form-control" disabled>
                </div>

                <!-- Text FONE2 - SEGUNDO SECUNDÁRIO -->
                <div class="form-group">
                    <label for="fone2">Fone Alternativo:</label>
                    <input id="fone2" name="fone2" type="text" placeholder="Se houver" value="{{ $data->fone2 or old('fone2')  }}" class="form-control" disabled>
                </div>

                <!-- Text FONE WHATSAPP -->
                <div class="form-group">
                    <label for="foneW">Fone Whatsapp</label>
                    <input id="foneW" name="foneW" type="text" placeholder="Se houver" value="{{ $data->foneW or old('foneW')  }}" class="form-control" disabled>
                </div>

                <!-- Text NOME GERENTE OU DONO (RESPONSÁVEL PELO CADASTRO) -->
                <div class="form-group">
                    <label for="nomeGerente">Nome Responsável</label>
                    <input id="nomeGerente" name="nomeGerente" value="{{ $data->nomeGerente or old('nomeGerente')  }}" type="text" placeholder="Nome de uma pessoa responsável pela empresa" class="form-control" required="" disabled>
                </div>

                <!-- Text SOBRE NOME DA PESSOA RESPONSÁVEL -->
                <div class="form-group">
                    <label for="sobrenomeGerente">Sobre Nome do Responsável</label>
                    <input id="sobrenomeGerente" name="sobrenomeGerente" value="{{ $data->sobrenomeGerente or old('sobrenomeGerente')  }}" type="text" placeholder="Sobre nome da mesma pessoa que foi digitado o nome" class="form-control" required="" disabled>
                </div>

                <!-- Text NÚMERO DA EMPRESA SE HOUVER -->
                <div class="form-group">
                    <label for="numeroEmpresa">Número da Empresa</label>
                    <input id="numeroEmpresa" name="numeroEmpresa" type="text" value="{{ $data->numeroEmpresa or old('numeroEmpresa')  }}" placeholder="Número da empresa se houver" class="form-control" disabled>
                </div>

                <!-- Text ENDEREÇO DE UMA IMAGEM DA EMPRESA SE HOUVER -->
                <div class="form-group">
                    <label for="imagem">Endereço da sua imagem</label>
                    <input id="imagem" name="imagem" type="text" value="{{ $data->imagem or old('imagem')  }}" placeholder="Ex: http://www.seusite.com.br/imagens/imagem.jpg" class="form-control" disabled>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label for="website">Website da empresa</label>
                    <input id="website" name="website" type="text" value="{{ $data->website or old('website')  }}" placeholder="Ex: www.suaempresa.com.br" class="form-control" disabled>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">
                    <label for="active">Ativo</label>
                    <label class="checkbox-inline" for="active-0">
                        <input type="checkbox" name="active" id="active-0" value="1" disabled
                               @if((isset($data->active) && ($data->active == 1)))
                               checked >
                        Sim
                    </label>
                    <label class="checkbox-inline" for="active-1">
                        <input type="checkbox" name="active" id="active-1" value="0" disabled
                               @else
                               checked >
                        Não
                    </label>
                    @endif
                    <br><br>
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
                    <form class="form" method="post" action="/painel/lists/add">
                        {{csrf_field()}}

                        <!-- Select País -->
                        <div class="form-group">
                            <label for="pais_id">País</label>
                            <select name="pais_id" class="form-control">
                                @foreach($paises as $pais)
                                    <option value="{{  $pais->id }}">{{ $pais->nome }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">Não encontrou o PAÍS, <a href="{{ url('/painel/countries/add') }}">cadastre aqui</a></span>
                        </div>

                        <!-- Select Estado -->
                        <div class="form-group">
                            <label for="estado_id">Estado</label>
                            <select name="estado_id" class="form-control">
                                @foreach($estados as $estado)
                                    <option value="{{  $estado->id }}">{{ $estado->nome }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">Não encontrou o ESTADO, <a href="{{ url('/painel/estados/add') }}">cadastre aqui</a></span>
                        </div>

                        <!-- Select Cidade -->
                        <div class="form-group">
                            <label for="cidade_id">Cidade</label>
                            <select name="cidade_id" class="form-control">
                                @foreach($cidades as $cidade)
                                    <option value="{{  $cidade->id }}">{{ $cidade->nome }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">Não encontrou a CIDADE, <a href="{{ url('/painel/cities/add') }}">cadastre aqui</a></span>
                        </div>

                        <!-- Select Departamento -->
                        <div class="form-group">
                            <label for="departamento_id">Departamento</label>
                            <select name="departamento_id" class="form-control">
                                @foreach($departamentos as $departamento)
                                    <option value="{{  $departamento->id }}">{{ $departamento->nome }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">Não encontrou o DEPARTAMENTO, <a href="{{ url('/painel/departamentos/add') }}">cadastre aqui</a></span>
                        </div>

                        <!-- Text NOME DA EMPRESA -->
                        <div class="form-group">
                            <label for="nome">Nome da empresa</label>
                            <input id="nome" name="nome" type="text" placeholder="Nome da empresa" value="{{ $data->nome or old('nome')  }}" class="form-control" required="">
                        </div>

                        <!-- Text ENDEREÇO DA EMPRESA -->
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input id="endereco" name="endereco" type="text" placeholder="Localização da empresa, Rua, Avenida.. outros" value="{{ $data->endereco or old('endereco')  }}" class="form-control" required="">
                        </div>

                        <!-- Text CNPJ DA EMPRESA -->
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input id="cnpj" name="cnpj" type="text" placeholder="CNPJ da empresa" value="{{ $data->cnpj or old('cnpj')  }}" class="form-control" required="">
                        </div>

                        <!-- Prepended E-MAIL DA EMPRESA -->
                        <div class="form-group">
                            <label for="email">E-mail da empresa</label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input id="email" name="email" class="form-control" placeholder="e-mail usado para contato da sua empresa" value="{{ $data->email or old('email')  }}" type="text" required="">
                            </div>
                        </div>

                        <!-- Text FONE0 - PRINCIPAL -->
                        <div class="form-group">
                            <label for="fone0">Fone:</label>
                            <input id="fone0" name="fone0" type="text" placeholder="Ex: (xx) xxxxx-xxxx" value="{{ $data->fone0 or old('fone0')  }}" class="form-control" required="">
                        </div>

                        <!-- Text FONE1 - SECUNDÁRIO SE HOUVER -->
                        <div class="form-group">
                            <label for="fone1">Fone Alternativo: </label>
                            <input id="fone1" name="fone1" type="text" placeholder="Se houver" value="{{ $data->fon1 or old('fone1')  }}" class="form-control">
                        </div>

                        <!-- Text FONE2 - SEGUNDO SECUNDÁRIO -->
                        <div class="form-group">
                            <label for="fone2">Fone Alternativo:</label>
                            <input id="fone2" name="fone2" type="text" placeholder="Se houver" value="{{ $data->fone2 or old('fone2')  }}" class="form-control">
                        </div>

                        <!-- Text FONE WHATSAPP -->
                        <div class="form-group">
                            <label for="foneW">Fone Whatsapp</label>
                            <input id="foneW" name="foneW" type="text" placeholder="Se houver" value="{{ $data->foneW or old('foneW')  }}" class="form-control">
                        </div>

                        <!-- Text NOME GERENTE OU DONO (RESPONSÁVEL PELO CADASTRO) -->
                        <div class="form-group">
                            <label for="nomeGerente">Nome Responsável</label>
                            <input id="nomeGerente" name="nomeGerente" value="{{ $data->nomeGerente or old('nomeGerente')  }}" type="text" placeholder="Nome de uma pessoa responsável pela empresa" class="form-control" required="">
                        </div>

                        <!-- Text SOBRE NOME DA PESSOA RESPONSÁVEL -->
                        <div class="form-group">
                            <label for="sobrenomeGerente">Sobre Nome do Responsável</label>
                            <input id="sobrenomeGerente" name="sobrenomeGerente" value="{{ $data->sobrenomeGerente or old('sobrenomeGerente')  }}" type="text" placeholder="Sobre nome da mesma pessoa que foi digitado o nome" class="form-control" required="">
                        </div>

                        <!-- Text NÚMERO DA EMPRESA SE HOUVER -->
                        <div class="form-group">
                            <label for="numeroEmpresa">Número da Empresa</label>
                            <input id="numeroEmpresa" name="numeroEmpresa" type="text" value="{{ $data->numeroEmpresa or old('numeroEmpresa')  }}" placeholder="Número da empresa se houver" class="form-control">
                        </div>

                        <!-- Text ENDEREÇO DE UMA IMAGEM DA EMPRESA SE HOUVER -->
                        <div class="form-group">
                            <label for="imagem">Endereço da sua imagem</label>
                            <input id="imagem" name="imagem" type="text" value="{{ $data->imagem or old('imagem')  }}" placeholder="Ex: http://www.seusite.com.br/imagens/imagem.jpg" class="form-control">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label for="website">Website da empresa</label>
                            <input id="website" name="website" type="text" value="{{ $data->website or old('website')  }}" placeholder="Ex: www.suaempresa.com.br" class="form-control">
                        </div>

                        <!-- Multiple Checkboxes (inline) -->
                        <div class="form-group">
                            <label for="active">Ativo</label>
                            <label class="checkbox-inline" for="active-0">
                                <input type="checkbox" name="active" id="active-0" value="1">
                                Sim
                            </label>
                            <label class="checkbox-inline" for="active-1">
                                <input type="checkbox" name="active" id="active-1" value="0">
                                Não
                            </label>
                        </div>

                        <!--botao Novo -->
                        <div class="form-group">
                            <input type="submit" value="Salvar" class="btn btn-success">
                        </div>
                        @endif
                    </form>
        @endsection