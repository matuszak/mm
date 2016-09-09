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

    <!--Camera -->
    <link rel="stylesheet" href="{{ url('assets/slider/css/camera.css') }}">

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
<!-- HEADER OF SITE -->
<header class="header-logo">
    <h1 class="oculta">{{$title or 'mm - marketing digital'}}</h1>
    <div class="clear"></div>
<!-- Profile Line -->
    <div class="lineProfile">
        <div class="col-md-9"></div>
        <div class="col-md-3"><a href="/login" class="btn-profile text-uppercase">acessar sua conta</a></div>
    </div>
    <div class="subline"></div>
<!-- Close Profile Line -->
<!-- TOP MENU -->
    <div>
        @include('layouts.portal.nav')
    </div>
    <div class="subMenu-linha"></div>
</header>
<!-- GENERAL CONTENT -->
<div class="container-fluid">
    <!-- conteúdo dinâmico -->
    @yield('content')
</div>
<!-- FOOTER -->
<footer class="preRodape amareloEscuro fontBranca">
    Apenas testando
</footer>
<footer class="rodape asfaltoEscuro fontBranca">
    <h1>Rodapé ficará aqui nesta parte</h1>
</footer>

<!-- SCRIPTS -->
<!-- javascripts jqquery -->
<script src="{{ url('assets/all/js/jquery.min.js') }}"></script>
<!-- javascripts jquery-ui -->
<script src="{{ url('assets/all/js/jquery-ui.min.js') }}"></script>
<!-- javascripts -->
<script src="{{ url('assets/all/js/bootstrap.min.js') }}"></script>
<!--jQuery Easing -->
<script type="text/javascript" src="{{ url('assets/slider/js/jquery.easing.1.3.js') }}"></script>
<!--jQuery Mobilie -->
<script type="text/javascript" src="{{ url('assets/slider/js/jquery.mobile.customized.min.js') }}"></script>
<!--Equal Heights -->
<script type="text/javascript" src="{{ url('assets/slider/js/jquery.equalheights.js') }}"></script>
<!--Camera -->
<script type="text/javascript" src="{{ url('assets/slider/js/camera.min.js') }}"></script>

<script>
    $(document).ready(function () {
        jQuery('#camera_wrap').camera({
            loader: false,
            pagination: false,
            thumbnails: false,
            height: '31.92857142857143%',
            minHeight: '200',
            caption: true,
            navigation: true,
            fx: 'mosaic',
            portrait: false,
        });
    });
</script>

</body>
</html>
