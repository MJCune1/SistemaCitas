<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
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
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            @hasrole('administrador')
                            <li><a href="{{ url('/usuarios') }}">usuarios</a></li>
                            <li><a href="{{ url('/recipes') }}">recipes</a></li>
                            <li><a href="{{ url('/historia') }}">historia</a></li>
                            <li><a href="{{ url('/citas') }}">usuarios</a></li>
                            @endhasrole

                            @hasrole('secretaria')
                            <li><a href="{{ url('/citas') }}">Citas</a></li>
                            @endhasrole

                            @hasrole('farmaceuta')
                                <li><a href="{{ url('/recipes') }}">Recipes</a></li>
                            @endhasrole

                            @hasrole('medico')
                            <li><a href="{{ url('/usuarios') }}">usuarios</a></li>
                            <li><a href="{{ url('/historias') }}">Historias</a></li>
                            <li><a href="{{ url('/miscitas') }}">Mis Citas</a></li>
                            <li><a href="{{ url('/recipes') }}">Recipes</a></li>
                            @endhasrole
                            @hasrole('paciente')
                            <li><a href="{{ url('/home') }}">Mis Citas</a></li>
                            @endhasrole

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->roles[0]->name." ".Auth::user()->nombre." ". Auth::user()->apellido }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="application/javascript">
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.form-delete').attr('action', $(e.relatedTarget).data('action'));
            $(this).find('.nombre').text($(e.relatedTarget).data('name'));
        });
    </script>

</body>
</html>
