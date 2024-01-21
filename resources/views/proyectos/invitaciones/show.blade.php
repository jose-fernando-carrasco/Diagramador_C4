@extends('layouts.plantilla')
@section('title', 'Show Invitacion')

@section('css')
    <link href="/css/formulario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Invitacion Al Proyecto</h2>
                    <form action="{{ route('invitacionesP.aceptar', $invitacion)}}" method="POST">
                        @csrf
                        @method('put')
                        <label class="text-primary h5">TITULO DEL PROYECTO</label>
                        <input class="form-control" name="title" type="text" value="{{$invitacion->proyecto->title}}" readonly>

                        <br>
                        <label class="text-primary h5 pt-1">DESCRIPCION</label>
                        <Textarea class="form-control" name="descripcion" rows="3" placeholder="Opcional.." readonly>{{$invitacion->proyecto->descripcion}}</Textarea>
                        <input name="user_id" type="hidden" value="{{auth()->user()->id}}">
                        
                        <label class="text-primary h5 pt-3">ESTADO DE LA INVITACION</label>
                        @if ($invitacion->aceptado == false)
                            <input class="form-control" type="text" value="No Aceptado" readonly>
                        @else
                            <input class="form-control" type="text" value="Aceptado" readonly>
                        @endif
                        
                        <div class="p-t-30">
                            <button class="btn btn-primary" type="submit">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('aceptado') == 'yala')
            <script>
                Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Invitacion ya Aceptada'
            })
            </script>
    @endif
@endsection
