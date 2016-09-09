<!-- Top menu -->
<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">MM - Marketing Digital...</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                        <i class="fa fa-home"></i><br>Home <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left" role="menu">
                        <li class="active"><a href="/">Início</a></li>
                        <li><a href="index-2.html">Home 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/services') }}"><i class="fa fa-tasks"></i><br>Servços</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}"><i class="fa fa-user"></i><br>Sobre</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}"><i class="fa fa-envelope"></i><br>Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
