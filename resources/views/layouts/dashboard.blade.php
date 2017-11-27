<!Doctype html>

<html lang="ES">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edificapp</title>

        <!--Llamamos al archivo css a través de CDN-->
        <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


        <link media="all" type="text/css" rel="stylesheet" href="http://edificapp-new.app/../css/style.css">

        <link media="all" type="text/css" rel="stylesheet" href="http://edificapp-new.app/../css/oskrStyle.css">


        <link media="all" type="text/css" rel="stylesheet" href="http://edificapp-new.app/../css/jquery.steps.css">
        @yield('css')
        <!-- Llamamos al css de la libreria select2-->
        <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

        <!-- Llamamos al css de la libreria owlcarousel-->
        <link media="all" type="text/css" rel="stylesheet" href="http://edificapp-new.app/../css/owl.carousel.css">
        <link media="all" type="text/css" rel="stylesheet" href="http://edificapp-new.app/../css/owl.theme.default.css">

    </head>

    <body>
        <div class="conten">

            <header>
                <h1 hidden=>Edificapp</h1>


                <nav class="navbar" role="navigation" id="navbar" data-spy="affix" data-offset-top="500">
                    <div class="container-fluid navegacion">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-bars fa-2x"></i>

                                </button>
                                <i class="boton fa fa-caret-square-o-left fa-2x"></i>
                            </div><!--navbar-header-->

                            <div class="collapse navbar-collapse" id="collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Inicio</a></li>
                                    <li><a href="#directorio">Directorio de Especialistas</a></li>
                                    <li><a href="../cliente/cliente.html">Solicita Cotización</a></li>
                                    <li><a href="#inicio">Ideas Inspiradoras</a></li>
                                    <li><a href="#inicio">Blog</a></li>
                                    <li><a href="#inicio">Ayuda</a></li>
                                </ul>
                            </div> <!--collapse-->
                        </div>

                    </div><!--container navegacion-->
                </nav>
                <!--fin Barra Navegación-->
            </header>

            <div class="container-fluid" id="enlace">
                <div class="container">
                    <div class="col-sm-6 col-md-6">
                        <p>¿QUIERES QUE TU PERFIL COMO PROFESIONAL SEA EL MAS VISTO?</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <a href="membresia" class="btn btn-lg col-md-12" role="button">Conoce nuestros planes</a>
                    </div>
                </div>
            </div> <!--container enlace-->
            @include('alertas.errors')
            @include('alertas.success')

            <div class="barra-lateral cerrar">
                <section>
                    <aside>
                        <div class="user-info">
                            <div>
                                <img class="img-circle" src="{{ Auth::user()->avatar }}" width="80">
                            </div>
                            <div class="container-info">
                                <p>{{ Auth::user()->name }}</p>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div><!--user info-->
                        <nav class="navbar" role="navigation" id="navbar">
                            <div class="navegacion">
                                    <div class="navbar-header">
                                        <a class="navbar-brand" href="#inicio"><h1></h1></a>
                                    </div><!--navbar-header aside-->

                                    <div>
                                        <ul class="nav">
                                            <li><a href="/dashboard"><i class="fa fa-home fa-fw"></i>DashBoard</a></li>
                                            <li><a href="/cuenta">Mi Cuenta</a></li>
                                        @if (Auth::user()->rol == "especialista")
                                            <li><a href="/especializaciones">Mis Especializaciones</a></li>
                                            <li><a href="/contratos">Mis Contratos</a></li>
                                            <li><a href="/calificaciones">Mis Calificaciones</a></li>
                                            <li><a href="/proyectos">Mis Proyectos</a></li>
                                            <li><a href="/buscar-contratos">Encuentra Contratos</a></li>
                                            <li><a href="/membresia">Membresia</a></li>
                                        @endif
                                            <li><a href="/cotizaciones">Crea un proyecto</a></li>
                                            <li><a href="/especialistas">Encuentra Especialistas</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Salir
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div> <!--collapse aside-->
                            </div><!--container navegacion aside-->
                        </nav>
                    <!--fin Barra Navegación aside-->
                    </aside>
                </section>
            </div><!-- barra lateral-->

            <div class="contenido">
                    @yield('content')
            </div><!--contenido-->

        <!-- JQuery CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script>
            $('#especializacion').change(function(event){
                $.get("/especializaciones/actividades/"+event.target.value+"", function(response, especializaciones){
                    console.log(response);
                    $('#actividades').empty();
                    for(i=0; i<response.length; i++){
                        //console.log("<option values='"+response[i].id+"'>"response[i].nombre+"</option>");
                        $('#actividades').append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
                    }
                });
            });
        </script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <script src="https://use.fontawesome.com/bb6d0f8827.js"></script>

        <!--Llamamos al archivo datatables CDN-->
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#tabla').DataTable();
            } );
        </script>

        <!--script select2-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <!--script steps-->
        <script type="text/javascript" src="{{asset('js/jquery.steps.js')}}"></script>
        <!--script owlcarousel-->
        <script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/javascript.js')}}"></script>

        @yield('js')
        <!--script maps-->


    </body>

</html>

