@extends('layouts.plantilla')
@section('title', 'Show Proyecto')

@section('css')
    <link href="/css/showformulario.css" rel="stylesheet" />
    <style>
        .tamanito{
            height: 55%;
            width: 100%;
        }
        .tamOrga{
            height: 350px;
            width: 100%;
            /* border-radius: 20px; */
        }
        
    </style>
@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Invitando a usuarios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <form class="msgForm" method="POST">
                    @csrf

                    <div class="modal-body">
                        <label for="" class="text-primary fw-bold pb-2">Proyecto</label>
                        <input type="text" class="form-control" value="{{ $proyecto->title}}" readonly>
                        <input type="hidden" class="msgProyecto_id form-control" name="proyecto_id" value="{{ $proyecto->id}}" readonly>
                        <label class="text-primary fw-bold pt-3 pb-1">Seleccionar a los Invitados</label>         
                        <select id="multiple" class="msgInvitadosP form-select" name="seleU" aria-label="multiple select example">
                            @foreach ($participantes as $participante)
                                <option value="{{$participante->id}}">{{$participante->name}}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button id="botonM" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Invitar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


<div class="container px-4 px-lg-5">
    <!-- Heading Row-->
    <div class="xrow gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-5">
            @if ($proyecto->user->hayFoto)
                <img class="tamOrga img-fluid rounded mb-4 mb-lg-0" src="{{asset($proyecto->user->url)}}" alt="..." />                
            @else
                <img class="tamOrga img-fluid rounded mb-4 mb-lg-0" src="https://www.skillupgroup.com/wp-content/uploads/2020/02/sin-perfil.jpg" alt="...">
            @endif
                <h5 class="ml-2">Organizador: {{$proyecto->user->name}}</h5>
        </div>
        <div class="col-lg-7">
            <h1 class="font-weight-light">Titulo: {{$proyecto->title}}</h1>
            <p>{{ $proyecto->descripcion}}</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Invitar Unirse al Equipo
            </button>
            
        </div>
    </div>
    <!-- Call to Action-->
    <div class="card text-white bg-secondary my-3 py-2 text-center">
        <div class="card-body"><h2 class="text-white m-0">Equipo de Desarrollo</h2></div>
    </div>
    <!-- Content Row-->
    <h1 class="d-flex justify-content-center"></h1>
    <div class="xrow gx-4 gx-lg-5">

        @foreach ($users as $user)
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">{{$user->name}}</h2>
                        @if ($user->hayFoto)
                            <img class="tamanito" src="{{asset($user->url)}}" alt="">
                        @else
                            <img class="tamanito" src="https://www.skillupgroup.com/wp-content/uploads/2020/02/sin-perfil.jpg" alt="">
                        @endif
                        <p class="card-text">{{$user->name}} integrante del proyecto {{$proyecto->title}} en el cual puedes enviarle invitaciones para unirse a diferentes salas, una sala es la reunion donde podrás trabajar en conjunto con tu equipo de desarrollo para diseños de software basado en el modelo C4.</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('proyectos.expulsar',[$proyecto,$user])}}" class="formulario-eliminar" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" id="botoncito" class="btn btn-danger">Expulsar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
    
@endsection

@section('js')
    
    <script  src="/js/app.js"></script>
    <script src="/js/invitacion.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    
        
   

    @if(session('adv') == 'no')
            <script>
                Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'no has seleccionado nada'
            })
            </script>
    @endif

    @if(session('expul') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Usuario Expulsado',
                showConfirmButton: false,
                timer: 1100
            })
        </script>
    @endif

@endsection
