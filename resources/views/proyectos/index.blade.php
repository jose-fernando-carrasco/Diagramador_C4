@extends('layouts.plantilla')
@section('title', 'Lista de Proyectos')

@section('content')
      
        <div class="container-fluid px-4">
            <h1 class="mt-4">Lista de Proyectos</h1>
            <div class="card mb-4">
                <div class="card-body">
                    Aqui puedes ver a todos los proyectos en el cual eres el organizador, recordando que solo el organizador tiene el permiso de guardar e iniciar las reuniones de su equipo de trabajo.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Visualizando proyectos
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Proyecto</th>
                                <th>Estado</th>
                                <th>Creado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($proyectos as $proyecto)
                                <tr>
                                    <td>{{$proyecto->title}}</td>
                                    <td>{{$proyecto->estadoproyecto->name}}</td>
                                    <td>{{$proyecto->created_at}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-success btn-sm">ingresar</a>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <form action="{{route('proyectos.destroy',$proyecto)}}" class="formulario-eliminar" method="POST">
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
                                <th>Proyecto</th>
                                <th>Estado</th>
                                <th>Creado</th>
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
                    title: 'Proyecto eliminado',
                    showConfirmButton: false,
                    timer: 1100
                })
            </script>
    @endif

@endsection