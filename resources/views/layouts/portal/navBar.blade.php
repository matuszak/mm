<!--Barra de navegação no topo da pagina fixo <nav class="navbar navbar-padrao navbar-fixed-top sticky"> -->
<nav class="nav">
        <!--  <ul class="nav navbar-nav"> -->
            <ul class="menu-home">

                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/painel') }}">Dashboard</a></li>
                <li><a href="{{ url('/about') }}">Sobre</a></li>
                <li><a href="{{ url('/contact') }}">Contato</a></li>
                <!-- Right Side Of Navbar -->
                <!-- Authentication Links-->
                @if (Auth::guest())
                    <li class="navbar-right"><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li class="dropdown navbar-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <p class="navbar-text">{{ Auth::user()->name }}</p>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}">
                            <i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
</nav>
