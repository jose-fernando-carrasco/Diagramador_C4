@extends('layouts.plantilla')
@section('title', 'Creando Proyecto')

@section('css')
    <link href="/css/formulario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Creando Proyecto</h2>
                    <form action="{{ route('proyectos.store')}}" method="POST">
                        @csrf
                    
                        <label class="text-primary h5">TITULO DEL PROYECTO</label>
                        <input class="form-control" name="title" type="text" placeholder="ejemplo: software de venta" value="{{old('title')}}">
                        @error('title')
                            <small class="text-danger">Debe ingresar el titulo</small>
                        @enderror

                        <br>
                        <label class="text-primary h5 pt-1">DESCRIPCION</label>
                        <Textarea class="form-control" name="descripcion" rows="3" placeholder="Opcional..">{{old('descripcion')}}</Textarea>
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
                title: 'Proyecto Creado',
                showConfirmButton: false,
                timer: 1100
            })
        </script>
    @endif
@endsection
