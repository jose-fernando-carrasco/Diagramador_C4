@extends('layouts.plantilla')
@section('title', 'Creando Sala')

@section('css')
    <link href="/css/formulario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Creando Sala</h2>
                    <form action="{{ route('salas.store')}}" method="POST">
                        @csrf
                    
                        <label class="text-primary h5">SELECCIONAR PROYECTO</label>
                        <select class="form-select" name="proyecto_id" aria-label="Default select example">
                            @foreach ($proyectos as $proyecto)
                                <option value="{{$proyecto->id}}" selected>{{$proyecto->title}}</option>
                            @endforeach
                        </select>                       

                        <br>
                        <label class="text-primary h5 pt-1">ASUNTO</label>
                        <input class="form-control" name="asunto" type="text" placeholder="ejemplo: sala para el proyecto software de venta" value="{{old('asunto')}}">
                        @error('asunto')
                            <small class="text-danger">Debe ingresar el asunto</small>
                        @enderror

                        <input name="user_id" type="hidden" value="{{auth()->user()->id}}">
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
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
                title: 'Sala Creada',
                showConfirmButton: false,
                timer: 1100
            })
        </script>
    @endif

@endsection
