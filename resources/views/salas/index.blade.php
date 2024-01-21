@extends('layouts.plantilla')
@section('title', 'Lista de Salas')

@section('content')
      
        <div class="container-fluid px-4">
            <h1 class="mt-4">Salas Creadas Como Organizador</h1>
            <div class="card mb-4">
                <div class="card-body">
                    Aqui puedes ver a todas las salas creadas para sus distintos proyectos, donde podrá iniciarla para hacer sus reuniones con su equipo de desarrollo.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Visualizando Salas
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Proyecto</th>
                                <th>Asunto</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($salas as $sala)
                                <tr>
                                    <td>{{$sala->proyecto->title}}</td>
                                    <td>{{$sala->asunto}}</td>
                                    <td>{{$sala->estado->name}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                @if ($sala->estado->id == 3)
                                                    <a href="{{ route('salas.previa',$sala) }}" class="btn btn-success btn-sm disabled" role="button" aria-disabled="true">ingresar</a>    
                                                @else
                                                    <a href="{{ route('salas.previa',$sala) }}" class="btn btn-success btn-sm" role="button" aria-disabled="false">ingresar</a>  
                                                @endif
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <form action="{{route('salas.destroy',$sala)}}" class="formulario-eliminar" method="POST">
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
                                <th>Asunto</th>
                                <th>Estado</th>
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
                    title: 'Sala eliminada',
                    showConfirmButton: false,
                    timer: 1100
                })
            </script>
    @endif

    @if(session('finalizo') == 'si')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Sala Finalizada',
                    showConfirmButton: false,
                    timer: 1300
                })
            </script>
    @endif
        
@endsection