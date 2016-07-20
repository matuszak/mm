@extends('layouts.painel.templatePainel')

@section('content')
    <div class="clear"></div>

    <div class="container">
        <div class="page-header">
            <h1 class="title">
                Listagem e gerenciamento: Papéis dos usuários/Funções que cada um pode exercer no sistema
            </h1>
        </div>
        <div>
            <form class="form-search form form-inline text-left" method="post" action="/painel/roles/search">
                {{csrf_field()}}
                <input type="text" name="search" placeholder="Pesquisar" class="form-control">
                <input type="submit" value="Buscar" class="btn btn-default">
            </form>
            <p class='text-right text-uppercase'>
                <a href="{{ url('/painel/roles/add') }}" class="btn btn-success">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    novo registro
                </a>
            </p>
        </div>

        <table class="table table-hover">
            <th class="title text-uppercase">Nome</th>
            <th class="title text-uppercase">Descrição</th>
            <th class="title text-uppercase" width="121px">Gestão</th>
            @forelse($data as $role)
                <tr>
                    <td>
                        {{ $role->name }}
                    </td>
                    <td>
                        {{ $role->label }}
                    </td>
                    <td class="text-center">
                        <a href="/painel/roles/show/{{$role->id}}" class="btn btn-info btn-sm">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para editar) -->
                        <a href="/painel/roles/edt/{{$role->id}}/e" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/painel/roles/del/{{$role->id}}/d" class="btn btn-danger btn-sm">
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
