@extends('layouts.painel.templatePainel')

@section('content')
<div class="clear"></div>

<div class="container">

    <div class="page-header">
        <h1 class="title text-uppercase">
            Gestão: <b>Clientes</b>
        </h1>
    </div>
    <div>
        <form class="form-search form form-inline text-left" method="post" action="/painel/customers/search">
            {{csrf_field()}}
            <input type="text" name="search" placeholder="Pesquisar" class="form-control">
            <input type="submit" value="Buscar" class="btn btn-default">
        </form>
        <p class='text-right text-uppercase'>
            <a href="{{ url('/painel/customers/add') }}" class="btn btn-success">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                novo registro
            </a>
        </p>
    </div>

    <table class="table table-hover">
        <th class="title text-uppercase">Nome</th>
        <th class="title text-uppercase">Endereço</th>
        <th class="title text-uppercase">fone</th>
        <th class="title text-uppercase">e-mail</th>
        <th class="title text-uppercase">Desc.</th>
        <th class="title text-uppercase">Valor</th>
        <th class="title text-uppercase">Val. Contrato</th>
        <th class="title text-uppercase" width="121px">Gestão</th>
        @forelse($data as $customer)
            <tr>
                <td class="text-uppercase">
                    <b>{{ $customer->respNomeContrato }}</b>
                </td>
                <td>
                    {{ $customer->endereco }}, {{ $customer->numero }}
                </td>
                <td>
                    {{ $customer->fone0 }}
                </td>
                <td>
                    {{ $customer->email }}
                </td>
                <td class="text-uppercase">
                    {{ $customer->desconto }}%
                </td>
                <td class="text-uppercase">
                   R$ {{ $customer->valorContrato }},00
                </td>
                <td class="text-uppercase">
                    R$ <?php $valor = ( ($customer->valorContrato) - ( ($customer->desconto/100) * $customer->valorContrato) ); echo $valor; ?>,00

                </td>
                <td class="text-center">
                    <a href="/painel/customers/show/{{$customer->id}}" class="btn btn-info btn-sm">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </a>
                    <!-- (Botão para editar) -->
                    <a href="/painel/customers/edt/{{$customer->id}}/e" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <!-- (Botão para excluir/deletar) -->
                    <a href="/painel/customers/del/{{$customer->id}}/d" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td><p>Nada cadastrado ainda, nesta área.</p></td>
            </tr>
        @endforelse
    </table>
    <div class="text-center">
        {{ $data->links() }}
    </div>
</div>
@endsection
