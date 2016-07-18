@extends('layouts.painel.templatePainel')

@section('content')
<div class="clear"></div>

<div class="container">
    <h1 class="title">
        Listagem e gerenciamento dos Países
    </h1>
    <div>
        <p class='text-right text-uppercase'>
            <a href="{{ url('/painel/contries/add') }}" class="btn btn-success">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                novo registro
            </a>
        </p>
    </div>

    <table class="table table-hover">
        <th class="title text-uppercase">Nome</th>
        <th class="title text-uppercase">User</th>
        <th class="title text-uppercase" width="121px">Gestão</th>
        @forelse($paises as $pais)
            <tr>
                <td>
                    {{ $pais->nome }}
                </td>
                <td>
                    {{ $pais->user_id }}
                </td>
                <td class="text-center">
                    <a href="/painel/contries/show/{{$pais->id}}" class="btn btn-info btn-sm">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </a>
                    <!-- (Botão para editar) -->
                    <a href="/painel/contries/edt/e/{{$pais->id}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <!-- (Botão para excluir/deletar) -->
                    <a href="/painel/contries/del/d/{{$pais->id}}" class="btn btn-danger btn-sm">
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
</div>
@endsection
