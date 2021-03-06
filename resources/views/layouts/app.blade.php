<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title or 'MM Dígital Marketing'}}</title>

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/all/css/bootstrap.min.css') }}">

    <!--Font Icons CSS -->
    <link rel="stylesheet" href="{{ url('assets/all/css/font-awesome.min.css') }}">

    <!--Portal CSS -->
    <link rel="stylesheet" href="{{ url('assets/portal/css/portal.css') }}">

    <!--Resets -->
    <link rel="stylesheet" href="{{ url('assets/portal/css/resets.css') }}">

    <!-- JavaScripts Except case -->
    <script src="{{ url('assets/all/js/jquery-3.1.0.min.js') }}"></script>

    <!--Favorite Icon  <link rel="icon" type="image/png" href="{{ url('assets/all/imgs/favicon.png') }}">    -->

</head>
    @include('layouts.navBar')
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="{{ url('assets/all/js/bootstrap.min.js') }}"></script>
</body>
</html>
