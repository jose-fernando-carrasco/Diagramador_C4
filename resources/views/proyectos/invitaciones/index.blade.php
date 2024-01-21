@extends('layouts.plantilla')
@section('title', 'Invitaciones')

@section('css')
    
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Invitaciones a Proyectos</h1>
    <div class="card mb-4">
        <div class="card-body">
            Aqui puedes ver todas las invitaciones de los proyectos a las cuales has sido invitado para formar parte del equipo de desarrollo.
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Visualizando Invitaciones
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Proyecto</th>
                        <th>Remitente</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($invitaciones as $invitacion)
                        <tr>
                            <td>{{$invitacion->proyecto->title}}</td>
                            <td>{{$invitacion->user_envio->name}}</td>

                            @if ($invitacion->aceptado == 1)
                                <td>Aceptado</td>                                
                            @else
                                <td>No Aceptado</td> 
                            @endif
                            
                            <td>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{ route('invitacionesP.show', $invitacion)}}" class="btn btn-primary btn-sm">ingresar</a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <form action="{{ route('invitacionesP.destroy', $invitacion)}}" class="formulario-eliminar" method="POST">
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
                        <th>Remitente</th>
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
                    title: 'Invitacion eliminada',
                    showConfirmButton: false,
                    timer: 1100
                })
            </script>
    @endif

    @if(session('aceptado') == 'ok')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Invitacion Aceptada',
                    showConfirmButton: false,
                    timer: 1100
                })
            </script>
    @endif

@endsection