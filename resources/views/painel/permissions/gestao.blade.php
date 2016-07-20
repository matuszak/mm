@extends('layouts.painel.templatePainel')

@section('content')
    <div class="clear"></div>

    <div class="container">
        <div class="page-header">
            <h1 class="title text-uppercase">
                Gestão: <b>Permissões</b>
            </h1>
        </div>
        <div>
            <form class="form-search form form-inline text-left" method="post" action="/painel/permissions/search">
                {{csrf_field()}}
                <input type="text" name="search" placeholder="Pesquisar" class="form-control">
                <input type="submit" value="Buscar" class="btn btn-default">
            </form>
            <p class='text-right text-uppercase'>
                <a href="{{ url('/painel/permissions/add') }}" class="btn btn-success">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    novo registro
                </a>
            </p>
        </div>

        <table class="table table-hover">
            <th class="title text-uppercase">Nome</th>
            <th class="title text-uppercase">Descrição</th>
            <th class="title text-uppercase" width="121px">Gestão</th>
            @forelse($data as $permission)
                <tr>
                    <td class="text-lowercase">
                        {{ $permission->name }}
                    </td>
                    <td class="">
                        {{ $permission->label }}
                    </td>
                    <td class="text-center">
                        <a href="/painel/permissions/show/{{$permission->id}}" class="btn btn-info btn-sm">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para editar) -->
                        <a href="/painel/permissions/edt/{{$permission->id}}/e" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/painel/permissions/del/{{$permission->id}}/d" class="btn btn-danger btn-sm">
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
