@extends('layouts.plantilla')
@section('title', 'Sala')

@section('css')
    
@endsection


@section('content')
    {{-- <h1>Previa</h1> --}}

    <!-- Button trigger modal de Elegir Diagrama -->
  <button type="button" hidden  id="boton-elegir-diagrama" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button>
  
  <!-- Modal de Elegir Diagrama-->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header d-flex justify-content-center">
          <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel"><strong>Forma de Ingresar</strong></h1>
          <button type="button" hidden class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form class="formulario-elegir">
            
            
            <div class="modal-body">
                
                <input type="hidden" class="proyecto-id form-control" name="proyecto_id" value="{{ $proyecto->id}}" readonly>
                <input type="hidden" class="sala-id form-control" name="sala_id" value="{{ $sala->id}}" readonly>
                

                <label class="h6 text-primary">Elija una opcion</label>
                <select id="elegido" class="form-select mb-3" name="sele" aria-label="multiple select example">
                    <option value="" disabled selected>Seleccione una opcion...</option>
                    <option value="1">Crear nuevo Diagrama</option>
                    <option value="2">Cargar antiguo Diagrama</option>
                </select>

                <p>
                    <button class="btn btn-primary" id="boton-opcion1" hidden type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                      Button with data-bs-target 2
                    </button>
                </p>

                <div class="collapse" id="collapseExample2">
                    <input type="text" class="proyecto-title form-control" name="proyecto_title" placeholder="titulo del diagrama a crear...">
                </div>


                <p>
                    <button class="btn btn-primary" id="boton-opcion2" hidden type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Button with data-bs-target
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                

                    <select id="diagrama-elegido" class="form-select py-2" name="" aria-label="multiple select example">
                        <option value="" disabled selected>Seleccione un diagrama antiguo...</option>
                        @foreach ($diagramas as $diagrama)
                            <option value="{{$diagrama->id}}">{{$diagrama->title}}</option>
                        @endforeach
                    </select>
               
                </div>

            </div>

            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Siguiente</button>
            </div>
        </form>

      </div>
    </div>
  </div>

@endsection


@section('js')

    <script  src="/js/app.js"></script>

    <script>
        const BotonInicio = document.getElementById("boton-elegir-diagrama");
        const FormElegir = get(".formulario-elegir");
        var ValorAct1;
        var ValorAct2;
        var select = document.getElementById('elegido');
        var DiagramaSelecionado = document.getElementById('diagrama-elegido');
        const BotonOpcion1 = document.getElementById("boton-opcion1");
        const BotonOpcion2 = document.getElementById("boton-opcion2");
        const ProyectoIdz = get(".proyecto-id");
        const ProyectoTitlez = get(".proyecto-title");
        const SalaIdz = get(".sala-id");

        window.onload = function() {
            BotonInicio.click();
            ValorAct1 = 2;
            ValorAct2 = 1;
        }

        
        select.addEventListener('change', function(){

            var selectedOption = this.options[select.selectedIndex];
            console.log(selectedOption.value + ': ' + selectedOption.text);

            if(selectedOption.value == 1 && ValorAct2 == 2){
                BotonOpcion2.click();
                ValorAct2 = 1;
            }else{
                if(selectedOption.value == 2){
                    BotonOpcion2.click();
                    ValorAct2 = 2;
                }
            }

            if(selectedOption.value == 2 && ValorAct1 == 1){
                BotonOpcion1.click();
                ValorAct1 = 2;
            }else{
                if(selectedOption.value == 1){
                    BotonOpcion1.click();
                    ValorAct1 = 1;
                }
            }
          

        });

        
        FormElegir.addEventListener("submit", event => {
            event.preventDefault();
            
            // window.location.href = BaseUrl + '/salas/show/1/1';
            console.log('Opcion: '+select.value);
            console.log('sala ID: '+SalaIdz.value);
            console.log('diagrama ID: '+DiagramaSelecionado.value);
            console.log('Request:');
            console.log('diagrama title: '+ProyectoTitlez.value);
            console.log('proyecto ID: '+ProyectoIdz.value);
            if(select.value == 2){
                axios.get(`/salas/siguiente/elegido/${SalaIdz.value}/${DiagramaSelecionado.value}`
                ).then(res => {
                    console.log(res.data);
                    window.location.href = BaseUrl + `/salas/show/${res.data[0].id}/${res.data[1].id}`;
                }).catch(error => {
                        console.log(error);
                });
            }else{
                axios.put('/salas/siguiente/crear/',{
                    title: ProyectoTitlez.value,
                    proyecto_id: ProyectoIdz.value,
                    sala_id: SalaIdz.value,
                }).then(res => {
                    console.log('siguiente');
                    console.log(res.data);
                    
                    window.location.href = BaseUrl + `/salas/show/${res.data[0].id}/${res.data[1].id}`;
                }).catch(error => {
                        console.log(error);
                });
            }
            
        
        });

    </script>
    
@endsection