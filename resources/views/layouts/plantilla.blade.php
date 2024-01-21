<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title> @yield('title') </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <style>
            .badge {
                 position: absolute;
                 top: -3px;
                 right: 20px;
                }
         </style>
        @yield('css')

        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('dashboard')}}">Diagramador C4</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 hide" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group"></div>
            </form>
            <!-- Navbar-->
            <div class="dropdown">


                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="group" class="h5">
                        <i class="fa fa-solid fa-bell"></i> {{-- sumar con las invitaciones de salas --}}
                        <span id="notificaciones" class="notificaciones badge"></span>
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item text-primary fw-bold" href="{{ route('invitacionesP.index') }}">Invitaciones para unirse a Proyecto</a></li>
                    <div class="cuerpo-invitaciones"></div>        
                    <li><a class="dropdown-item text-primary fw-bold" href="{{-- {{route('invitacionsalas.index')}} --}}">Invitaciones para unirse a sala</a></li>      
                    <div class="cuerpo-invitaciones-salas"></div> 
                </ul>
            </div>
            

            <h5 class="text-light px-2">{{auth()->user()->name}}</h5>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('users.show',auth()->user())}}">Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @can('users.index')
                                <div class="sb-sidenav-menu-heading">Privado</div>
                                <a class="nav-link" href="{{route('users.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw"></i></i></div>
                                    Usuarios
                                </a>
                            @endcan
                            <div class="sb-sidenav-menu-heading">DISEÑO DE SOFTWARE</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Proyectos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('proyectos.create') }}">Crear Nuevo</a>
                                    <a class="nav-link" href="{{ route('proyectos.index') }}">Lista de Proyectos</a>
                                    <a class="nav-link" href="{{ route('invitacionesP.index')}}">Invitaciones</a>
                                </nav>
                            </div>

                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Salas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{ route('salas.create') }}">Crear Sala</a>
                                    <a class="nav-link" href="{{ route('salas.index') }}">Lista de Salas</a>
                                    <a class="nav-link" href="{{ route('invitacionsalas.index') }}">Invitaciones a salas</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">CONTACTANOS</div>
                            <a class="nav-link" href="http://Wa.me/+59171029903" target="_blank">
                                <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-square-phone"></i></div>
                                Whatsapp
                            </a>                         
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Desarrollador:</div>
                        Fernando Carrasco
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <main>
                    {{-- <div class="container-fluid px-4"> --}}
                    <div style="position:relative;"> 
                        {{-- <div class="contenedor"> --}}
                            @yield('content')
                        {{-- </div> --}}
                    </div>
                </main>
            </div>
        </div>

        <script  src="/js/app.js"></script>
	    <script  src="/js/en-sesion.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        {{-- <script src="{{ asset('js/datatables-simple-demo.js') }}"></script> --}}

        @yield('js')
    </body>
</html>
