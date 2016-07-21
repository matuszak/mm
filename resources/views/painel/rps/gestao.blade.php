@extends('layouts.painel.templatePainel')

@section('content')
    <div class="clear"></div>

    <div class="container">
        <div class="page-header">
            <h1 class="title">
                Permissions Roles
            </h1>
        </div>
        <div>
            <form class="form-search form form-inline text-left" method="post" action="/painel/rps/search">
                {{csrf_field()}}
                <input type="text" name="search" placeholder="Pesquisar" class="form-control">
                <input type="submit" value="Buscar" class="btn btn-default">
            </form>
            <p class='text-right text-uppercase'>
                <a href="{{ url('/painel/rps/add') }}" class="btn btn-success">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    novo registro
                </a>
            </p>
        </div>

        <div class="text-center">
            {{ $data->links() }}
        </div>
    </div>
@endsection
