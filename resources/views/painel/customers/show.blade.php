@extends('layouts.painel.templatePainel')

@section('content')

    <div class="clear"></div>

    <div class="container">
        <div class="page-header">
            <h1 class="title text-uppercase">
                @foreach($data as $customer)
                Detalhes: <b>Cliente / Conrato prévia >> {{ $customer->respNomeContrato }}</b>
            </h1>
        </div>

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Dados detalhados:</div>
        <div class="panel-body">
            <p class="text-justify">
                CONTRATO PARTICULAR DE PRESTAÇÃO DE SERVIÇOS<br><br>

                CONTRATANTE: <u>{{$customer->respNomeContrato}}</u>, situada à <u>{{$customer->endereco}}, {{$customer->numero}}, {{$customer->bairro}}, {{$customer->cep}}, {{$customer->cidade}}, {{$customer->estado}},</u> inscrita no CGC/CNPJ <u>{{$customer->cpfCnpj}}</u> e possuindo inscrição estadual xxxx, neste ato representada por seu (Cargo), (Nome), (nacionalidade), (estado civil), residente a (Rua), (número), (bairro), (CEP), (Cidade), (Estado), inscrito no CPF/MF sob nº xxxxxxx) e portador da carteira de identidade R.G. nº xxxxxx.<br><br>

                CONTRATADO: (Nome ou razão social), situada à (Rua), (número), (bairro), (CEP), (Cidade), (Estado), inscrita no CGC/CNPJ xxxxxx e possuindo inscrição estadual xxxx, neste ato representada por seu (Cargo), (Nome), (nacionalidade), (estado civil), residente a a (Rua), (número), (bairro), (CEP), (Cidade), (Estado), inscrito no CPF/MF sob nº (seu CPF) e portador da carteira de identidade R.G. nº xxxxx .<br><br>

                Têm entre os mesmos, de maneira justa e acordada, o presente Contrato particular de Prestação de Serviços, ficando desde já aceito, pelas cláusulas abaixo descritas.<br><br>

                1. OBJETO DO CONTRATO:<br><br><br><br>



                Prestação de Serviços de manutenção mensal de 03 (três) microcomputadores, a fim de prevenção de problemas técnicos e manutenção dos problemas existentes na data da manutenção.<br><br>

                2. DO SERVIÇO:<br><br>

                2.1. Os serviços serão executados somente nas máquinas de números de série XXXXXX.XXXXXX, XXXXXX.XXXXXXX, XXXXXX.XXXXXX, localizadas na sala YYYYY do edifício sede da empresa.<br><br>

                2.2. Executar-se-ão os serviços somente uma vez a cada mês, sempre no 10º (Décimo) dia útil do mesmo.<br><br>

                2.3. O presente Contrato não abrange as despesas com peças de reposição ou substituição, que correrão por conta do CONTRATANTE, bem como investimento técnico na segurança física dos computadores.<br><br>

                2.4 - O serviço será executado de maneira que permita sua continuação por qualquer profissional da área de manutenção de microcomputadores a qualquer momento.<br><br>

                3. DO PRAZO:<br><br>

                3.1. A execução plena dos serviços se fará em um período de um ano (doze meses) contados a partir da data de assinatura deste contrato, estando apenas uma visita mensal coberta pelo contrato, correndo as demais por conta do CONTRATANTE.<br><br>

                3.2. Cabe à parte que ocasionar o rompimento do presente contrato, o pagamento de multa rescisória fixada em 20% (vinte porcento) do valor dos serviços objeto, ou seja, R$ (valor) (valor por extenso) à outra parte.<br><br>

                4. DO PAGAMENTO:<br><br>

                O pagamento do serviço, objeto deste contrato, será executado em duas parcelas, através do cheque No XXXXXXX, do Banco XXXXYYYY, no valor de R$ (valor da 1ª parcela) (valor por extenso) e do cheque No XXXXXXXX, do Banco XXXXXXYYYYY, no valor de R$ (valor da 2ª parcela) (valor por extenso), com vencimentos em (datas dos cheques), respectivamente.<br><br>

                4. DO FORO:<br><br>

                Fica eleito o Foro de <u>{{$customer->cidade}}</u> para dirimir quaisquer dúvidas que venham a surgir e não encontrem entendimentos entre as partes.<br><br>

                E por estarem justos e acertados, assinam o presente Contrato em duas vias de igual teor e valor para que o mesmo faça cumprir seus efeitos legais à partir da presente data.<br><br>

                (local), (data)<br><br>

                (empresa contratante)<br><br>

                (empresa contratada)<br><br>
__________________________________________________<br><br>
                1a Testemunha<br><br>
__________________________________________________<br><br>
                2a Testemunha<br><br>
            </p><br><br><br><br>
            <hr><br><br><br><br>
        </div>

        <div class="page-header">
            <h1 class="title text-uppercase">
                    Detalhes do: <b>Cliente >> {{ $customer->respNomeContrato }}</b>
            </h1>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table text-uppercase">

                <tr>
                    <td><b>Nome:</b></td>
                    <td>{{$customer->respNomeContrato}}</td>
                </tr>
                <tr>
                    <td><b>Endereço</b></td>
                    <td>{{$customer->endereco}}, {{$customer->numero}}</td>
                </tr>
                <tr>
                    <td><b>bairro</b></td>
                    <td>{{$customer->bairro}}</td>
                </tr>
                <tr>
                    <td><b>cep</b></td>
                    <td>{{$customer->cep}}</td>
                </tr>
                <tr>
                    <td><b>cidade</b></td>
                    <td>{{$customer->cidade}}</td>
                </tr>
                <tr>
                    <td><b>CPF/CNPJ</b></td>
                    <td>{{$customer->cpfCnpj}}</td>
                </tr>
                <tr>
                    <td><b>E-mail</b></td>
                    <td class="text-lowercase">{{$customer->email}}</td>
                </tr>
                <tr>
                    <td><b>Url Imagem</b></td>
                    <td>{{$customer->imagem}}</td>
                </tr>
                <tr>
                    <td><b>web site</b></td>
                    <td class="text-lowercase">{{$customer->website}}</td>
                </tr>
                <tr>
                    <td><b>Fone Princípal</b></td>
                    <td>{{$customer->fone0}}</td>
                </tr>
                <tr>
                    <td><b>Fone Alternativo</b></td>
                    <td>{{$customer->fone1}}</td>
                </tr>
                <tr>
                    <td><b>Fone para WhatsApp</b></td>
                    <td>{{$customer->foneW}}</td>
                </tr>
                <tr>
                    <td><b>Data do contrato (início)</b></td>
                    <td>{{$customer->dataEntrada}}</td>
                </tr>
                <tr>
                    <td><b>Duração do contrato</b></td>
                    <td>{{$customer->quantideMeses}}</td>
                </tr>
                <tr>
                    <td><b>Valor do Contrato</b></td>
                    <td>R$ {{$customer->valorContrato}},00</td>
                </tr>
                <tr>
                    <td><b>Desconto no valor</b></td>
                    <td>{{$customer->desconto}}%</td>
                </tr>
                <tr>
                    <td><b>Valor final do contrato</b></td>
                    <td>R$ <?php $valor = ( ($customer->valorContrato) - ( ($customer->desconto/100) * $customer->valorContrato) ); echo $valor; ?>,00</td>
                </tr>
                <tr>
                    <td><b>Data do contrato (fim)</b></td>
                    <td>{{$customer->dataVencimento}}</td>
                </tr>

                <tr>
                    <td><b>Ativo</b></td>
                    <td>@if((isset($customer->ativo)) && ($customer->ativo == 1))
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
    </div>

@endsection