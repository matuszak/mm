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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>

<header class="header-logo">

    <h1 class="oculta">{{$title or 'mm - marketing digital'}}</h1>

    <div class="clear"></div>

    <div class="lineProfile">
        <div class="col-md-9"></div>
        <div class="col-md-3"><a href="/login" class="btn-profile text-uppercase">acessar sua conta</a></div>
    </div>
    <!-- close profile div -->

    <div class="subline"></div>

    <div class="mm-logo">
        <img src="{{ url('assets/all/imgs/mmlogo.png') }}" alt="logo (mm - marketing digital)" title="mm - marketing digital" class="img-logo">
    </div>
    <!-- logo mm dígital marketing close -->
    <div>
        <!--inclui menu -->
        @include('layouts.portal.nav')
    </div>
</header>
<!-- incluí conteúdo geral -->
<div class="container-fluid">
    <!-- conteúdo dinâmico -->
    @yield('content')
</div>


<!-- javascripts jqquery -->
<script src="{{ url('assets/all/js/jquery.min.js') }}"></script>

<!-- javascripts jquery-ui -->
<script src="{{ url('assets/all/js/jquery-ui.min.js') }}"></script>

<!-- javascripts -->
<script src="{{ url('assets/all/js/bootstrap.min.js') }}"></script>
<section class="preRodape asfalto fontBranca">
    Apenas testando
</section>
<section class="rodape asfaltoEscuro fontAzul">
    <h1>Rodapé ficará aqui nesta parte</h1>
</section>
</body>
</html>
