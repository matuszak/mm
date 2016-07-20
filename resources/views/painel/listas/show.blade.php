@extends('layouts.painel.templatePainel')

@section('content')

    <div class="clear"></div>

    <div class="container">
        <div class="page-header">
            <h1 class="title text-uppercase">
                @foreach($data as $empresa)
                Detalhes: <b>Empresa >> {{ $empresa->nome }}</b>
            </h1>
        </div>
    </div>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Dados detalhados:</div>
        <div class="panel-body">
            <p class="text-justify">A empresa <u>{{ $empresa->nome }}</u>, está empresa se enquadra no departamento de <u>{{ $empresa->departamento }}</u>, está localizada no estado de(a/o) <u>{{ $empresa->estado }}</u>, na cidade <u>{{ $empresa->cidade }}</u>, endereço: <u>{{ $empresa->endereco }}</u>, possuí o CNPJ de número: <u>{{ $empresa->cnpj }}</u>
            , para contato pode ser acessada pelo e-mail: <u>{{ $empresa->email }}</u>, ou pelo(s) telefone(s): <u>{{ $empresa->fone0 }}</u> - <u>{{ $empresa->fone1 }}</u> - <u>{{ $empresa->fone2 }}</u> - Telefone do Whatsapp se houver: <u>{{ $empresa->foneW }}</u>, mais detalhes
            da empresa estará disponível na tabela abaixo.<br>
            Pessoa responsável por cadastrar ou pela empresa foi: <u>{{ $empresa->nomeGerente }} {{ $empresa->sobrenomeGerente }}</u></p>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table text-uppercase">

                <tr>
                    <td><b>Nome:</b></td>
                    <td>{{$empresa->nome}}</td>
                </tr>
                <tr>
                    <td><b>Endereço</b></td>
                    <td>{{$empresa->endereco}}</td>
                </tr>
                <tr>
                    <td><b>cidade</b></td>
                    <td>{{$empresa->cidade}}</td>
                </tr>
                <tr>
                    <td><b>Estado</b></td>
                    <td>{{$empresa->estado}}</td>
                </tr>
                <tr>
                    <td><b>País</b></td>
                    <td>{{$empresa->pais}}</td>
                </tr>
                <tr>
                    <td><b>Departamento</b></td>
                    <td>{{$empresa->departamento}}</td>
                </tr>
                <tr>
                    <td><b>cnpj</b></td>
                    <td>{{$empresa->cnpj}}</td>
                </tr>
                <tr>
                    <td><b>número da empresa</b></td>
                    <td>{{$empresa->numeroEmpresa}}</td>
                </tr>
                <tr>
                    <td><b>E-mail</b></td>
                    <td class="text-lowercase">{{$empresa->email}}</td>
                </tr>
                <tr>
                    <td><b>Url Imagem</b></td>
                    <td>{{$empresa->imagem}}</td>
                </tr>
                <tr>
                    <td><b>web site</b></td>
                    <td class="text-lowercase">{{$empresa->website}}</td>
                </tr>
                <tr>
                    <td><b>Fone Princípal</b></td>
                    <td>{{$empresa->fone0}}</td>
                </tr>
                <tr>
                    <td><b>Fone Alternativo</b></td>
                    <td>{{$empresa->fone1}}</td>
                </tr>
                <tr>
                    <td><b>Fone Alternativo</b></td>
                    <td>{{$empresa->fone2}}</td>
                </tr>
                <tr>
                    <td><b>Fone para WhatsApp</b></td>
                    <td>{{$empresa->foneW}}</td>
                </tr>
                <tr>
                    <td><b>Nome Gerente/Responsável</b></td>
                    <td>{{$empresa->nomeGerente}} {{ $empresa->sobrenomeGerente }}</td>
                </tr>
                <tr>
                    <td><b>Ativa</b></td>
                    <td>@if((isset($empresa->active)) && ($empresa->active == 1))
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b>Observação</b></td>
                    <td>{{$empresa->obs}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection