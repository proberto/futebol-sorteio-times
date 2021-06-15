<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futebol</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/estilo.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/painel.css') }}" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script language="javascript">
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
 </script>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                 data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Futebol</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-user fa-2x"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="col-sm-2">
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{ route('home') }}">
                                <span class="glyphicon glyphicon-home"></span>
                                Inicio
                            </a>
                        </h4>
                    </div>
                </div>

                <!--Menu de Navegação Lateral-->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup1" aria-controls="colListGroup1" aria-expanded="false"
                             data-toggle="collapse">

                                <span class="glyphicon glyphicon-user"></span>

                                Usuários
                            </a>
                        </h4>
                    </div>

                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup1" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('usuarios.create') }}">Cadastrar</a></li>
                            <li class="list-group-item"><a href="{{ route('usuarios.index') }}">Listar</a></li>

                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <!-- /. Menu de Navegação Lateral-->
                <!--Menu de Navegação Lateral-->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup2" aria-controls="colListGroup2" aria-expanded="false"
                               data-toggle="collapse">

                                <span class="glyphicon glyphicon-user"></span>

                                Jogadores
                            </a>
                        </h4>
                    </div>

                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup2" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('jogador.create') }}">Cadastrar</a></li>
                            <li class="list-group-item"><a href="{{ route('jogador.index') }}">Listar</a></li>

                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <!-- /. Menu de Navegação Lateral-->
                <!--Menu de Navegação Lateral-->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup3" aria-controls="colListGroup3" aria-expanded="false"
                               data-toggle="collapse">

                                <span class="glyphicon glyphicon-ok"></span>

                                Presença
                            </a>
                        </h4>
                    </div>

                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup3" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('presenca.create') }}">Confirmar</a></li>
                            <li class="list-group-item"><a href="{{ route('presenca.index') }}">Lista de jogos</a></li>
                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <!-- /. Menu de Navegação Lateral-->
                <!--Menu de Navegação Lateral-->
                <div class="panel panel-primary">
                    <div id="colGroup1" role="tab" class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#colListGroup4" aria-controls="colListGroup4" aria-expanded="false"
                               data-toggle="collapse">

                                <span class="glyphicon glyphicon-refresh"></span>

                                Sorteio
                            </a>
                        </h4>
                    </div>

                    <div role="tabpanel" class="panel-collapse collapse" id="colListGroup4" aria-expanded="false">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('sorteio')}}">Sortear Times</a></li>
                            <li class="list-group-item"><a href="#">Ver Times</a></li>


                        </ul>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <!-- /. Menu de Navegação Lateral-->
            </div>

            <div class="col-sm-10">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
