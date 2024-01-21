@extends('layouts.plantilla')
@section('title', 'Invitaciones a salas')

@section('css')
    
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Invitaciones a Salas</h1>
    <div class="card mb-4">
        <div class="card-body">
            Aqui puedes ver todas las invitaciones a las diferentes salas a las cuales has sido invitado para formar parte de reuniones, solo puedes entrar si el organizador ya inició la sala.
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
                        <th>Asunto</th>
                        <th>Remitente</th>
                        <th>Sala</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invitaciones as $invitacion)
                        <tr>
                            <td>{{$invitacion->proyecto->title}}</td>
                            <td>{{$invitacion->sala->asunto}}</td>
                            <td>{{$invitacion->user_sala_envio->name}}</td>
                            <td>{{$invitacion->sala->estado->name}}</td>        
                            <td>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        @if ($invitacion->sala->estado->id == 2)
                                            <a href="{{ route('salas.show', [$invitacion->sala->id, $invitacion->diagrama->id]) }}" class="btn btn-primary btn-sm" role="button" aria-disabled="false">ingresar</a>
                                        @else
                                            <a href="{{ route('salas.show', [$invitacion->sala->id, $invitacion->diagrama->id]) }}" class="btn btn-primary btn-sm disabled" role="button" aria-disabled="true">ingresar</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <form action="{{ route('invitacionsalas.destroy', $invitacion)}}" class="formulario-eliminar" method="POST">
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
                        <th>Remitente</th>
                        <th>Sala</th>
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