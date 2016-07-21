<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Principal
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Portal</a></li>
                <li><a href="{{ url('/painel') }}">Painel</a></li>
                <li><a href="{{ url('/painel/lists') }}">Agenda</a></li>
                <li><a href="{{ url('/painel/customers') }}">Clientes</a></li>
                <li><a href="{{ url('/painel/cities') }}">Cidades</a></li>
                <li><a href="{{ url('/painel/estados') }}">Estados</a></li>
                <li><a href="{{ url('/painel/countries') }}">Países</a></li>
                <li><a href="{{ url('/painel/departamentos') }}">Departamentos</a></li>
                <li><a href="{{ url('/painel/roles') }}">Papéis</a></li>
                <li><a href="{{ url('/painel/permissions') }}">Permissões</a></li>
                <li><a href="{{ url('/painel/rps') }}">RP</a></li>
                <li><a href="{{ url('/painel/users') }}">Usuários</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>