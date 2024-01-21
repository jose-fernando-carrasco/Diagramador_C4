@extends('layouts.plantilla')
@section('title', 'Perfil')

@section('css')
    <style>
        .header {
            color: #36A0FF;
            font-size: 27px;
            /* padding: 10px; */
            /* text-align: center; */
            /* left: 10; */
        }

        .bigicon {
            font-size: 35px;
            color: #36A0FF;
        }
        .manito{
            height: 640px;
            width: 840px; 
            left: 0;  
        }

        .tamanitoPerlfin{
            height: 100%;
            width: 100%;
        }

        .tamanitoW{
            height: 26px;
            width: 27px;
        }

        body{margin-top:20px;}
        .icon-box.medium {
            font-size: 20px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }
        .icon-box {
            font-size: 30px;
            margin-bottom: 33px;
            display: inline-block;
            color: #ffffff;
            height: 65px;
            width: 65px;
            line-height: 65px;
            background-color: #59b73f;
            text-align: center;
            border-radius: 0.3rem;
        }
        .social-icon-style2 li a {
            display: inline-block;
            font-size: 14px;
            text-align: center;
            color: #ffffff;
            background: #59b73f;
            height: 41px;
            line-height: 41px;
            width: 41px;
        }
        .rounded-3 {
            border-radius: 0.3rem !important;
        }

        .social-icon-style2 {
            margin-bottom: 0;
            display: inline-block;
            padding-left: 10px;
            list-style: none;
        }

        .social-icon-style2 li {
            vertical-align: middle;
            display: inline-block;
            margin-right: 5px;
        }

        a, a:active, a:focus {
            color: #616161;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        .text-secondary, .text-secondary-hover:hover {
            color: #59b73f !important;
        }
        .display-25 {
            font-size: 1.4rem;
        }

        .text-primary, .text-primary-hover:hover {
            color: #ff712a !important;
        }

        p {
            margin: 0 0 20px;
        }

        .mb-1-6, .my-1-6 {
            margin-bottom: 1.6rem;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                @if ($user->hayFoto)
                    <img class="tamanitoPerlfin" src="{{asset($user->url)}}" alt="...">
                @else
                    <img class="tamanitoPerlfin" src="https://www.skillupgroup.com/wp-content/uploads/2020/02/sin-perfil.jpg" alt="...">
                @endif
                
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0">{{$user->name}}</h3>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary tamanitoW"></i>{{$user->email}}</a></li>
                        <li class="mb-3"><a href="http://Wa.me/+591{{$user->telefono}}" target="_blank"><img class="tamanitoW" src="https://mycontenedor23.s3.amazonaws.com/segundo/complementarios/whatsapp.png" alt="">&nbsp {{$user->telefono}}</a></li>
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                               <h1 class="modal-title fs-5" id="staticBackdropLabel">Subiendo Foto de Perfil</h1>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{route('users.subirfoto')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">          
                                    <div class="form-group">
                                        <input name="file" type="file" accept="image/*">
                                        @error('file')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Subir</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                    <ul class="social-icon-style2 ps-0">
                        @if ($user->id == auth()->user()->id)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                subir foto
                            </button>
                        @else
                            <button disabled type="button" class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                subir foto
                            </button>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                {{-- <img class="manito" src="https://thumbs.dreamstime.com/b/concepto-de-desarrollo-software-mediante-diagramas-flujo-usando-flowchartsbusiness-man-dibuja-un-diagrama-sobre-el-fondo-del-cielo-192475015.jpg" alt=""> --}}
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well well-sm">
                                @if ($user->id == auth()->user()->id)
                                    {{-- Editable --}}
                                    <form class="form-horizontal" action="{{route('users.update')}}" method="post">
                                        @csrf
                                        @method('put')
                                            <legend class="header">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Editar Informacion de Perfil</legend>
                                        
                                            <input id="id" name="user_id" type="hidden" value="{{$user->id}}">

                                            <div class="row py-4">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                                <div class="col-md-8">
                                                    <input id="name" name="name" type="text" placeholder="Nombre de Usuario" class="form-control" value="{{$user->name}}">
                                                    @error('name')
                                                        <small class="text-danger">Debe rellenar el nombre</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row py-4">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa-sharp fa-solid fa-at bigicon"></i></span>
                                                <div class="col-md-8">
                                                    <input id="email" name="email" type="text" placeholder="Correo Electronico" class="form-control" value="{{$user->email}}">
                                                    @error('email')
                                                        <small class="text-danger">Debe rellenar el correo</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row py-4">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                                <div class="col-md-8">
                                                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" value="{{$user->telefono}}">
                                                    @error('phone')
                                                        <small class="text-danger">Debe rellenar el telefono</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row py-4">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa-sharp fa-solid fa-lock bigicon"></i></span>
                                                <div class="col-md-8">
                                                    <input id="password" name="password" type="password" placeholder="Contraseña Antigua" class="form-control">
                                                    @error('password')
                                                        <small class="text-danger">Debe rellenar la antigua contraseña</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row py-4">
                                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa-sharp fa-solid fa-lock bigicon"></i></span>
                                                <div class="col-md-8">
                                                    <input id="password2" name="password2" type="password" placeholder="Contraseña Nueva" class="form-control">
                                                    @error('password2')
                                                        <small class="text-danger">Debe rellenar la nueva contraseña</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-2 text-center">
                                                    <button type="submit" class="btn btn-primary">&nbsp Enviar &nbsp</button>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                    </form>
                                @else
                                    {{-- No editable --}}
                                <form class="form-horizontal" action="{{route('users.update')}}" method="post">
                                    @csrf
                                    @method('put')
                                        <legend class="header">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Editar Informacion de Perfil</legend>
                                    
                                        <input id="id" name="user_id" type="hidden" value="{{$user->id}}">

                                        <div class="row py-4">
                                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                            <div class="col-md-8">
                                                <input id="name" name="name" type="text" placeholder="Nombre de Usuario" class="form-control" value="{{$user->name}}" readonly>
                                                @error('name')
                                                    <small class="text-danger">Debe rellenar el nombre</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row py-4">
                                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa-sharp fa-solid fa-at bigicon"></i></span>
                                            <div class="col-md-8">
                                                <input id="email" name="email" type="text" placeholder="Correo Electronico" class="form-control" value="{{$user->email}}" readonly>
                                                @error('email')
                                                    <small class="text-danger">Debe rellenar el correo</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row py-4">
                                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                            <div class="col-md-8">
                                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" value="{{$user->telefono}}" readonly>
                                                @error('phone')
                                                    <small class="text-danger">Debe rellenar el telefono</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-2 text-center">
                                                <button type="submit" class="btn btn-primary" disabled>&nbsp Enviar &nbsp</button>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                </form>
                                @endif
                                

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    @if(session('info') == 'no')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Contraseña Incorrecta',
                text: 'debe colocar la antigua contraseña',
            })
        </script>
    @endif

    @if(session('info') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

@endsection