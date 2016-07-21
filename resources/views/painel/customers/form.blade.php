@extends('layouts.painel.templatePainel')

@section('content')
<!-- título da sessão -->
<div class="page-header">
    <h1 class="title text-uppercase">Gerenciar: <b>Clientes</b></h1>
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
        <form class="form" method="post" action="/painel/customers/edt/{{$data->id}}">
            {{csrf_field()}}
             <!-- Select Empresa na lista -->
            <div class="form-group">
                <label for="lista_id">Empresa</label>
                <select name="lista_id" class="form-control">
                    @foreach($listas as $lista)
                        <option value="{{ $lista->id }}"
                                @if((isset($data->lista_id)) && ($data->lista_id == $lista->id))
                                selected
                                @endif >
                            {{ $lista->nome }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">Não encontrou o EMPRESA, <a href="{{ url('/painel/lists/add') }}">cadastre aqui</a></span>
            </div>

            <!-- Select Cidade -->
            <div class="form-group">
                <label for="cidade_id">Cidade</label>
                <select name="cidade_id" class="form-control">
                    @foreach($cidades as $city)
                        <option value="{{ $city->id }}"
                                @if((isset($data->cidade_id)) && ($data->cidade_id == $city->id))
                                selected
                                @endif >
                            {{ $city->nome }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">Não encontrou a CIDADE, <a href="{{ url('/painel/cities/add') }}">cadastre aqui</a></span>
            </div>

            <!-- Text NOME DA EMPRESA -->
            <div class="form-group">
                <label for="respNomeContrato">Responsável pelo contrato</label>
                <input id="respNomeContrato" name="respNomeContrato" type="text" placeholder="Nome da empresa" value="{{ $data->respNomeContrato or old('respNomeContrato')  }}" class="form-control" required="">
            </div>

            <!-- Text ENDEREÇO -->
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input id="endereco" name="endereco" type="text" placeholder="Localização da empresa, Rua, Avenida.. outros" value="{{ $data->endereco or old('endereco')  }}" class="form-control" required="">
            </div>
            <!-- Text ENDEREÇO BAIRRO -->
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input id="bairro" name="bairro" type="text" placeholder="Nome do bairro" value="{{ $data->bairro or old('bairro')  }}" class="form-control" required="">
            </div>
            <!-- Text ENDEREÇO NÚMERO -->
            <div class="form-group">
                <label for="numero">Número do local</label>
                <input id="numero" name="numero" type="text" placeholder="Ex, 2200" value="{{ $data->numero or old('numero')  }}" class="form-control" required="">
            </div>
            <!-- Text ENDEREÇO CEP -->
            <div class="form-group">
                <label for="cep">CEP</label>
                <input id="cep" name="cep" type="text" placeholder="Ex: 76916-000" value="{{ $data->cep or old('cep')  }}" class="form-control" required="">
            </div>

            <!-- Text CNPJ DA EMPRESA -->
            <div class="form-group">
                <label for="cpfCnpj">CPF/CNPJ</label>
                <input id="cpfCnpj" name="cpfCnpj" type="text" placeholder="CPF ou CNPJ" value="{{ $data->cpfCnpj or old('cpfCnpj')  }}" class="form-control" required="">
            </div>

            <!-- Prepended E-MAIL DA EMPRESA -->
            <div class="form-group">
                <label for="email">E-mail</label>
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

            <!-- Text FONE WHATSAPP -->
            <div class="form-group">
                <label for="foneW">Fone WhatsApp</label>
                <input id="foneW" name="foneW" type="text" placeholder="Se houver" value="{{ $data->foneW or old('foneW')  }}" class="form-control">
            </div>

            <!-- Text VALOR DO CONTRATO LIQUIDO TOTAL -->
            <div class="form-group">
                <label for="valorContrato">Valor do Contrato</label>
                <input id="valorContrato" name="valorContrato" value="{{ $data->valorContrato or old('valorContrato')  }}" type="text" placeholder="Valor do contrato total, 'ex: 1000'" class="form-control" required="">
            </div>

            <!-- Text DESCONTO NO VALOR DO CONTRATO -->
            <div class="form-group">
                <label for="desconto">Desconto para o cliente</label>
                <input id="desconto" name="desconto" value="{{ $data->desconto or old('desconto')  }}" type="text" placeholder="'Ex: 10', será calculado o valor do desconto no preço total" class="form-control" required="">
            </div>

            <!-- Text QUANTIDADE DE MESES DE DURAÇÃO DO CONTRATO -->
            <div class="form-group">
                <label for="quantideMeses">Duração do contrato em mesês</label>
                <input id="quantideMeses" name="quantideMeses" type="text" value="{{ $data->quantideMeses or old('quantideMeses')  }}" placeholder="Tempo de duração do contrato em mesês, 1 ano = 12 mesês, 'ex: 12'" class="form-control">
            </div>

            <!-- Text DATA DE ENTRADA DO CONTRATO -->
            <div class="form-group">
                <label for="dataEntrada">Data de Início do contrato</label>
                <input id="dataEntrada" name="dataEntrada" type="text" value="{{ $data->dataEntrada or old('dataEntrada')  }}" placeholder="" class="form-control">
            </div>

            <!-- Text DATA DE FIM DO CONTRATO -->
            <div class="form-group">
                <label for="dataVencimento">Data do vencimento do contrato</label>
                <input id="dataVencimento" name="dataVencimento" type="text" value="{{ $data->dataVencimento or old('dataVencimento')  }}" placeholder="" class="form-control">
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label for="active">Ativo</label>
                <label class="checkbox-inline" for="active-0">
                    <input type="checkbox" name="ativo" id="active-0" value="1"
                           @if((isset($data->ativo) && ($data->ativo == 1)))
                           checked >
                    Sim
                </label>
                <label class="checkbox-inline" for="active-1">
                    <input type="checkbox" name="ativo" id="active-1" value="0"
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
            <form class="form" method="post" action="/painel/customers/del/{{$data->id}}">
                {{csrf_field()}}
                <!-- Select Empresa na Lista -->
                <div class="form-group">
                    <label for="lista_id">Empresa</label>
                    <select name="lista_id" class="form-control" disabled>
                        @foreach($listas as $lista)
                            <option value="{{ $lista->id }}"
                                    @if((isset($data->lista_id)) && ($data->lista_id == $lista->id))
                                    selected
                                    @endif >
                                {{ $lista->nome }}
                            </option>
                        @endforeach
                    </select>
                    <span class="help-block">Não encontrou o EMPRESA, <a href="{{ url('/painel/lists/add') }}">cadastre aqui</a></span>
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

                <!-- Text NOME DA EMPRESA -->
                <div class="form-group">
                    <label for="respNomeContrato">Responsável pelo contrato</label>
                    <input id="respNomeContrato" name="respNomeContrato" type="text" placeholder="Nome da empresa" value="{{ $data->respNomeContrato or old('respNomeContrato')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Text ENDEREÇO -->
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input id="endereco" name="endereco" type="text" placeholder="Localização da empresa, Rua, Avenida.. outros" value="{{ $data->endereco or old('endereco')  }}" class="form-control" required="" disabled>
                </div>
                <!-- Text ENDEREÇO BAIRRO -->
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input id="bairro" name="bairro" type="text" placeholder="Nome do bairro" value="{{ $data->bairro or old('bairro')  }}" class="form-control" required="" disabled>
                </div>
                <!-- Text ENDEREÇO NÚMERO -->
                <div class="form-group">
                    <label for="numero">Número do local</label>
                    <input id="numero" name="numero" type="text" placeholder="Ex, 2200" value="{{ $data->numero or old('numero')  }}" class="form-control" required="" disabled>
                </div>
                <!-- Text ENDEREÇO CEP -->
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input id="cep" name="cep" type="text" placeholder="Ex: 76916-000" value="{{ $data->cep or old('cep')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Text CNPJ DA EMPRESA -->
                <div class="form-group">
                    <label for="cpfCnpj">CPF/CNPJ</label>
                    <input id="cpfCnpj" name="cpfCnpj" type="text" placeholder="CPF ou CNPJ" value="{{ $data->cpfCnpj or old('cpfCnpj')  }}" class="form-control" required="" disabled>
                </div>

                <!-- Prepended E-MAIL DA EMPRESA -->
                <div class="form-group">
                    <label for="email">E-mail</label>
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

                <!-- Text FONE WHATSAPP -->
                <div class="form-group">
                    <label for="foneW">Fone WhatsApp</label>
                    <input id="foneW" name="foneW" type="text" placeholder="Se houver" value="{{ $data->foneW or old('foneW')  }}" class="form-control" disabled>
                </div>

                <!-- Text VALOR DO CONTRATO LIQUIDO TOTAL -->
                <div class="form-group">
                    <label for="valorContrato">Valor do Contrato</label>
                    <input id="valorContrato" name="valorContrato" value="{{ $data->valorContrato or old('valorContrato')  }}" type="text" placeholder="Valor do contrato total, 'ex: 1000'" class="form-control" required="" disabled>
                </div>

                <!-- Text DESCONTO NO VALOR DO CONTRATO -->
                <div class="form-group">
                    <label for="desconto">Desconto para o cliente</label>
                    <input id="desconto" name="desconto" value="{{ $data->desconto or old('desconto')  }}" type="text" placeholder="'Ex: 10', será calculado o valor do desconto no preço total" class="form-control" required="" disabled>
                </div>

                <!-- Text QUANTIDADE DE MESES DE DURAÇÃO DO CONTRATO -->
                <div class="form-group">
                    <label for="quantideMeses">Duração do contrato em mesês</label>
                    <input id="quantideMeses" name="quantideMeses" type="text" value="{{ $data->quantideMeses or old('quantideMeses')  }}" placeholder="Tempo de duração do contrato em mesês, 1 ano = 12 mesês, 'ex: 12'" class="form-control" disabled>
                </div>

                <!-- Text DATA DE ENTRADA DO CONTRATO -->
                <div class="form-group">
                    <label for="dataEntrada">Data de Início do contrato</label>
                    <input id="dataEntrada" name="dataEntrada" type="text" value="{{ $data->dataEntrada or old('dataEntrada')  }}" placeholder="" class="form-control" disabled>
                </div>

                <!-- Text DATA DE FIM DO CONTRATO -->
                <div class="form-group">
                    <label for="dataVencimento">Data do vencimento do contrato</label>
                    <input id="dataVencimento" name="dataVencimento" type="text" value="{{ $data->dataVencimento or old('dataVencimento')  }}" placeholder="" class="form-control" disabled>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">
                    <label for="active">Ativo</label>
                    <label class="checkbox-inline" for="active-0">
                        <input type="checkbox" name="ativo" id="active-0" value="1"
                               @if((isset($data->ativo) && ($data->ativo == 1)))
                               checked disabled>
                        Sim
                    </label>
                    <label class="checkbox-inline" for="active-1">
                        <input type="checkbox" name="ativo" id="active-1" value="0"
                               @else
                               checked disabled>
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
                    <form class="form" method="post" action="/painel/customers/add">
                        {{csrf_field()}}

                        <!-- Select A EMPRESA NA LISTA -->
                        <div class="form-group">
                            <label for="lista_id">Empresa</label>
                            <select name="lista_id" class="form-control">
                                @foreach($listas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">Não encontrou a EMPRESA, <a href="{{ url('/painel/lists/add') }}">cadastre aqui</a></span>
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

                        <!-- Text NOME DA EMPRESA -->
                        <div class="form-group">
                            <label for="respNomeContrato">Responsável pelo contrato</label>
                            <input id="respNomeContrato" name="respNomeContrato" type="text" placeholder="Nome da empresa" value="{{ $data->respNomeContrato or old('respNomeContrato')  }}" class="form-control" required="">
                        </div>

                        <!-- Text ENDEREÇO -->
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input id="endereco" name="endereco" type="text" placeholder="Localização da empresa, Rua, Avenida.. outros" value="{{ $data->endereco or old('endereco')  }}" class="form-control" required="">
                        </div>
                        <!-- Text ENDEREÇO BAIRRO -->
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input id="bairro" name="bairro" type="text" placeholder="Nome do bairro" value="{{ $data->bairro or old('bairro')  }}" class="form-control" required="">
                        </div>
                        <!-- Text ENDEREÇO NÚMERO -->
                        <div class="form-group">
                            <label for="numero">Número do local</label>
                            <input id="numero" name="numero" type="text" placeholder="Ex, 2200" value="{{ $data->numero or old('numero')  }}" class="form-control" required="">
                        </div>
                        <!-- Text ENDEREÇO CEP -->
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input id="cep" name="cep" type="text" placeholder="Ex: 76916-000" value="{{ $data->cep or old('cep')  }}" class="form-control" required="">
                        </div>

                        <!-- Text CNPJ DA EMPRESA -->
                        <div class="form-group">
                            <label for="cpfCnpj">CPF/CNPJ</label>
                            <input id="cpfCnpj" name="cpfCnpj" type="text" placeholder="CPF ou CNPJ" value="{{ $data->cpfCnpj or old('cpfCnpj')  }}" class="form-control" required="">
                        </div>

                        <!-- Prepended E-MAIL DA EMPRESA -->
                        <div class="form-group">
                            <label for="email">E-mail</label>
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

                        <!-- Text FONE WHATSAPP -->
                        <div class="form-group">
                            <label for="foneW">Fone WhatsApp</label>
                            <input id="foneW" name="foneW" type="text" placeholder="Se houver" value="{{ $data->foneW or old('foneW')  }}" class="form-control">
                        </div>

                        <!-- Text VALOR DO CONTRATO LIQUIDO TOTAL -->
                        <div class="form-group">
                            <label for="valorContrato">Valor do Contrato</label>
                            <input id="valorContrato" name="valorContrato" value="{{ $data->valorContrato or old('valorContrato')  }}" type="text" placeholder="Valor do contrato total, 'ex: 1000'" class="form-control" required="">
                        </div>

                        <!-- Text DESCONTO NO VALOR DO CONTRATO -->
                        <div class="form-group">
                            <label for="desconto">Desconto para o cliente</label>
                            <input id="desconto" name="desconto" value="{{ $data->desconto or old('desconto')  }}" type="text" placeholder="'Ex: 10', será calculado o valor do desconto no preço total" class="form-control" required="">
                        </div>

                        <!-- Text QUANTIDADE DE MESES DE DURAÇÃO DO CONTRATO -->
                        <div class="form-group">
                            <label for="quantideMeses">Duração do contrato em mesês</label>
                            <input id="quantideMeses" name="quantideMeses" type="text" value="{{ $data->quantideMeses or old('quantideMeses')  }}" placeholder="Tempo de duração do contrato em mesês, 1 ano = 12 mesês, 'ex: 12'" class="form-control">
                        </div>

                        <!-- Text DATA DE ENTRADA DO CONTRATO -->
                        <div class="form-group">
                            <label for="dataEntrada">Data de Início do contrato</label>
                            <input id="dataEntrada" name="dataEntrada" type="text" value="{{ $data->dataEntrada or old('dataEntrada')  }}" placeholder="" class="form-control">
                        </div>

                        <!-- Text DATA DE FIM DO CONTRATO -->
                        <div class="form-group">
                            <label for="dataVencimento">Data do vencimento do contrato</label>
                            <input id="dataVencimento" name="dataVencimento" type="text" value="{{ $data->dataVencimento or old('dataVencimento')  }}" placeholder="" class="form-control">
                        </div>

                        <!-- Multiple Checkboxes (inline) -->
                        <div class="form-group">
                            <label for="ativo">Ativo</label>
                            <label class="checkbox-inline" for="active-0">
                                <input type="checkbox" name="ativo" id="active-0" value="1">
                                Sim
                            </label>
                            <label class="checkbox-inline" for="active-1">
                                <input type="checkbox" name="ativo" id="active-1" value="0">
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