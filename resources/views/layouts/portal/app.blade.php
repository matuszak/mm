<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title or 'MM - Dígital Marketing'}}</title>

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/all/css/bootstrap.min.css') }}">

    <!--Font Icons CSS -->
    <link rel="stylesheet" href="{{ url('assets/all/css/font-awesome.min.css') }}">

    <!--Portal CSS
        <link rel="stylesheet" href="{{ url('assets/portal/css/portal.css') }}">
    -->
    <!--Portal CSS -->
    <link rel="stylesheet" href="{{ url('assets/portal/css/mm-componentes.css') }}">

    <!--Resets -->
    <link rel="stylesheet" href="{{ url('assets/portal/css/resets.css') }}">

    <!--Favorite Icon  <link rel="icon" type="image/png" href="{{ url('assets/all/imgs/favicon.png') }}">    -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/all/js/html5shiv.min.js') }}"></script>
    <script src="{{ url('assets/all/js/respond.min.js') }}"></script>
    <script src="{{ url('assets/all/js/modernizr.js') }}"></script>
    <![endif]-->

</head>
<body>

<header class="header-home">

    <div class="clear"></div>

    <h1 class="oculta">{{$title or 'MM - Marketing Digital'}}</h1>

    <div class="lineProfile">
        <div class="col-md-9"></div>
        <div class="col-md-3"><a href="/login" class="btn-profile">Acessar sua conta</a></div>
    </div>
    <!-- close profile div -->

    <div class="subline"></div>

    <div class="mm-logo">
        <img src="{{ url('assets/all/imgs/mmlogo.png') }}" alt="Logo (MM - Marketing Digital)" title="MM - Marketing Digital" class="img-logo">
    </div>
    <!-- Logo MM Dígital Marketing Close -->
<div>
    <!--Inclui Menu -->
@include('layouts.portal.nav')
    </div>
</header>
   <!-- Incluí conteúdo geral -->
    <div class="container-fluid">
        <!-- conteúdo dinâmico -->
        @yield('content')
    </div>


<!-- JavaScripts jQquery -->
<script src="{{ url('assets/all/js/jquery.min.js') }}"></script>

<!-- JavaScripts jQuery-UI -->
<script src="{{ url('assets/all/js/jquery-ui.min.js') }}"></script>

<!-- JavaScripts -->
<script src="{{ url('assets/all/js/bootstrap.min.js') }}"></script>
</body>
</html>
