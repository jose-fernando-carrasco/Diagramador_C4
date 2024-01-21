@extends('layouts.plantilla')
@section('title', 'Lista de Usuarios')

@section('content')
      
        <div class="container-fluid px-4">
            <h1 class="mt-4">Usuarios del Software</h1>
            <div class="card mb-4">
                <div class="card-body">
                    Aqui puedes ver a todos los usuarios del software que se han registrado para crear diagramas C4, donde podrás visualizar o eliminar a cada usuario.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Visualizando usuarios
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if ($user->roles()->first() == null)
                                        <td>Normal</td>
                                    @else
                                        <td>{{$user->roles()->first()->name}}</td>
                                    @endif
                                    
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <a href="{{route('users.show',$user)}}" class="btn btn-primary btn-sm">ingresar</a>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <form action="{{route('users.destroy',$user)}}" class="formulario-eliminar" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" id="botoncito" class="btn btn-danger btn-sm">eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    
@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('info') == 'ok')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario eliminado',
                    showConfirmButton: false,
                    timer: 1100
                })
            </script>
    @endif

    @if(session('info') == 'adm')
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Advertencia',
                text: 'no puedes eliminar al administrador'
            })
            </script>
    @endif

        
   
@endsection