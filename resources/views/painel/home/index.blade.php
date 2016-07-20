@extends('layouts.painel.templatePainel')

@section('content')
    <h1 class="page-header">Relatórios</h1>
    <div class="panel panel-default">
        <!-- Default panel contents -->

        <div class="panel-heading">Relatório de total de cadastros nas sessões</div>

        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge">{{ $totalListas }}</span>
                Agenda
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalCidades }}</span>
                Cidades
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalCustomers }}</span>
                Clientes
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalDepartamentos }}</span>
                Departamentos
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalEstados }}</span>
                Estados
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalCountries }}</span>
                Países
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalPermissions }}</span>
                Permissões
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalRoles }}</span>
                Papéis/Funções
            </li>
            <li class="list-group-item">
                <span class="badge">{{ $totalUsers }}</span>
                Usuários
            </li>
        </ul>
    </div>

@endsection
