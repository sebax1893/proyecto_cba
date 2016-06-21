<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CBA - @yield('title')</title>

    <!-- JQuery -->

    <!-- Fonts -->
    {!!Html::style('assets/font-awesome-4.6.3/css/font-awesome.min.css')!!}

    {!!Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700')!!}

    <!-- Bootstrap CSS & JS -->    
    {!!Html::style('assets/bootstrap/css/bootstrap.min.css')!!}

    <!-- Sweet Alert Style -->
    {!!Html::style('assets/sweetalert-master/dist/sweetalert.css')!!}   

    <!-- Estilo del sitio -->
    {!!Html::style('assets/css/style.css')!!}   

    <!-- DataTables Style -->
    {!!Html::style('https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css')!!}

    <!-- Datepicker Style -->
    {!!Html::style('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css')!!}    

    @yield('styles')

    <!-- <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css"> -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}   
</head>
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
                    CBA
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav"> 
                    <li><a href="{{ url('/home') }}">Home</a></li>  
                    
                    @if (true)                    

                        <li>{!!link_to_route('estudiante.index', $title = 'Gestionar estudiantes', null)!!}</li>
                        <li>{!!link_to_route('usuario.index', $title = 'Gestionar usuario', null)!!}</li>
                        <li>{!!link_to_route('tipoDocumento.index', $title = 'Gestionar tipos de documento', null)!!}</li>
                        <li>{!!link_to_route('eps.index', $title = 'Gestionar EPS', null)!!}</li>
                        <li>{!!link_to_route('tipoBanda.index', $title = 'Gestionar Tipos de banda', null)!!}</li>
                        <li>{!!link_to_route('categoria.index', $title = 'Gestionar Categorías', null)!!}</li> 
                        <li>{!!link_to_route('institucion.index', $title = 'Gestionar Instituciones', null)!!}</li>     
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Ingresar</a></li>                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                            </ul>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    {!!Html::script('assets/jQuery/jquery-2.2.3.min.js')!!} 

    {!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!} 

    <!-- DataTables JavaScript -->
    {!!Html::script('https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js')!!} 

    <!-- Sweet Alert JavaScript -->
    {!!Html::script('assets/sweetalert-master/dist/sweetalert.min.js')!!} 

    <!-- Bootstrap Datepicker JavaScript-->
    {!!Html::script('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')!!} 
    <!-- Bootstrap Datepicker Spanish JavaScript -->
    {!!Html::script('assets/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js')!!} 

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('scripts')
</body>
</html>
