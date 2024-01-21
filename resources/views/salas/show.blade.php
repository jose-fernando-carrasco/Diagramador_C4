@extends('layouts.plantilla')
@section('title', 'Sala de reunion')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/diagrama/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/diagrama/style.dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/diagrama/style.material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/diagrama/style.modern.css') }}">
    <link rel="stylesheet" href="{{ asset('css/diagrama/theme-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/diagrama/rappid.css') }}"> 
    
    @if (auth()->user()->esVisitante($sala->id))
        <style>
            .joint-free-transform{
                display: none
            }
            .handles{
                display: none
            }
        </style>
    @endif


    

@endsection

@section('content')

    <input type="hidden" class="diagrama-id form-control" name="diagrama_id" value="{{ $diagrama->id}}" readonly>
        <!-- Modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Invitando a usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form class="msgFormS" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Solo pueden ingresar miembros del proyecto</label>
                    <br>
                    <input type="hidden" class="diagrama-id2 form-control" name="diagrama_id2" value="{{ $diagrama->id}}" readonly>
                    <label for="" class="text-primary fw-bold pb-2">Proyecto</label>
                    <input type="text" class="form-control" value="{{ $proyecto->title}}" readonly>
                    <input type="hidden" class="msgSProyecto_id form-control" name="proyecto_id" value="{{ $proyecto->id}}" readonly>
                    <input type="hidden" class="form-control msgSsala_id" name="sala_id" value="{{ $sala->id}}" readonly>

                    <label class="text-primary fw-bold pt-3 pb-1">Seleccionar a los Invitados</label>         
                    <select class="form-select msgInvitadoS" name="seleU" aria-label="multiple select example">
                        @foreach ($participantes as $participante)
                            <option value="{{$participante->id}}">{{$participante->name}}</option>
                        @endforeach  
                    </select>

                    <label class="text-primary fw-bold pt-3 pb-1">Tipo de Invitado</label>         
                    <select class="form-select msgTipoS" name="tipo" aria-label="multiple select example">
                            <option value="0">Colaborador</option>
                            <option value="1">Visitante</option>
                    </select>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="botonC" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Invitar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    
    <div id="app">
        
        <div class="app-header">
            <div class="app-title">
                @if ($sala->user_id == auth()->user()->id)
                    <button type="button" class="btn btn-invitar-sala" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Invitar Unirse a la Sala
                    </button>
                    <form action="{{ route('salas.finalizar',$sala)}}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-sm btn-finalizar-sala">Finalizar sala</button>
                    </form>
                @else
                    <a href="{{ route('invitacionsalas.index')}}" class="btn btn-invitar-sala">Salirse de la sala</a>
                @endif
                
                

                        {{-- pruebas JSON --}}
                <form class="prueba mx-4" method="POST">
                    @csrf
                    <button type="submit" hidden id="BotoncitoX" class="btn btn-success">Salvar</button>
                </form>
                <input type="hidden" class="form-control diagrama_id" name="diagrama_id" value="{{ $diagrama->id}}" readonly>
                <form class="prueba2" method="POST">
                    @csrf
                    <button type="submit" hidden class="btn btn-warning">Cargar</button>
                </form>

            </div>
            {{-- @if (auth()->user()->esVisitante($sala->id))
            <div class=""></div>
            @else --}}
                <div class="toolbar-container"></div>
            {{-- @endif --}}
        </div>

            <div class="app-body">
                {{-- @if (auth()->user()->esVisitante($sala->id))
                    <button id="btnClick">
                        <div class="paper-container"></div>
                    </button>
                @else --}}
                    <div class="stencil-container"></div>
                    <button id="btnClick">
                        <div class="paper-container"></div>
                    </button>
                    <div class="inspector-container"></div>
                    <div class="navigator-container"></div>
                {{-- @endif --}}
            </div>

            
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="ImportarA" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ImportarALabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
               <h1 class="modal-title fs-5" id="ImportarALabel">Subiendo Foto de Perfil</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('users.importarArchitect')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">          
                    <div class="form-group">
                        <input name="file" type="file" accept=".xml" class="form-comtrol">
                        <input type="hidden" name="diagrama_id" value="{{$diagrama->id}}">
                        @error('file')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    @if (auth()->user()->esVisitante($sala->id))
        <input type="hidden">
    @else
        <button id="btn-convertir" class="btn btn-convertir-Architect">Exportar A</button>
        <button type="button" class="btn rounded-3 btn-importar-Architect" data-bs-toggle="modal" data-bs-target="#ImportarA">
            Importar de A
        </button>
    @endif
@endsection

@section('js')

        <script  src="/js/app.js"></script>
        <script src="/js/invitacion-salas.js"></script>
        <script src="/js/prueba-escucha.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <script type="text/javascript" src="/js/xml2json"></script> --}}

        <script src="{{ asset('js/diagrama/jquery.js') }}"></script>
        <script src="{{ asset('js/diagrama/lodash.js') }}"></script>
        <script src="{{ asset('js/diagrama/backbone.js') }}"></script>
        <script src="{{ asset('js/diagrama/graphlib.core.js') }}"></script>
        <script src="{{ asset('js/diagrama/dagre.core.js') }}"></script>
        <script src="{{ asset('js/diagrama/rappid.js') }}"></script>
        {{-- <script src="{{ asset('js/rappid.js') }}"></script> --}}

        <script src="{{ asset('js/diagrama/config/halo.js') }}"></script>
        <script src="{{ asset('js/diagrama/config/selection.js') }}"></script>
        <script src="{{ asset('js/diagrama/config/inspector.js') }}"></script>
        <script src="{{ asset('js/diagrama/config/stencil.js') }}"></script>
        <script src="{{ asset('js/diagrama/config/toolbar.js') }}"></script>
        <script src="{{ asset('js/diagrama/config/sample-graphs.js') }}"></script>
        <script src="{{ asset('js/diagrama/views/main.js') }}"></script>
        <script src="{{ asset('js/diagrama/views/theme-picker.js') }}"></script>
        <script src="{{ asset('js/diagrama/models/joint.shapes.app.js') }}"></script>
        <script src="{{ asset('js/diagrama/views/navigator.js') }}"></script>

        

        <script>
            joint.setTheme('dark');
            app = new App.MainView({
                el: '#app'
            });
            themePicker = new App.ThemePicker({
                mainView: app
            });
            themePicker.render().$el.appendTo(document.body);
            
            const Salita = get(".msgSsala_id");
            const DiagramaVista = get(".diagrama-id");


           
            
            // console.log('XD: '+DiagramaVista.value);
            
            @if (auth()->user()->esVisitante($sala->id))
                get(".stencil-container").style.display = 'none';
                get(".inspector-container").style.display = 'none';
                get(".toolbar-container").style.display = 'none';

                get(".paper-container").style.left = '0';
                get(".paper-container").style.right = '0';
                app.paper.options.interactive = false;
                // get(".paper-container").remove = false;
                // app.paper.options.width = 10000;
                console.log('Holis');
                app.graph.interactive = false;
                console.log(app.paper.options.linkView.remove );
            @endif
                
            window.onload = function() {
                BotonToggle.click();
                const creadorSala = {{$sala->user_id}};
                const autenticado = {{auth()->user()->id}}
                
                // console.log('ID del Creador de sala:'+ {{auth()->user()->id}});

                axios.get('/invitacionsalas/'+{{$sala->id}}+'/esVisitante').then(res => {
                    console.log('Visitante?');
                    if(res.data.length == 0){
                        console.log('false');
                        // get(".stencil-container").style.display = 'inline';
                    }else{
                        console.log('true');
                        // get(".stencil-container").style.display = 'none';
                        // get(".inspector-container").style.display = 'none';
                        // get(".toolbar-container").style.display = 'none';

                        // get(".paper-container").style.left = '0';
                        // get(".paper-container").style.right = '0';
                        // app.paper.options.interactive = false;
                        // app.paper.options.width = 10000;
                        // console.log(app.paper.options);
                        
                    }
                    
                    
                });
            
                

                axios.get(`/salas/mostrarDiagrama/${DiagramaVista.value}`).then(res => {
                    app.graph.fromJSON(res.data);
                });

                axios.get('/invitacionsalas/cantidad/Proyectosysalas').then(res => {
                    msgNotify.innerHTML = res.data;

                }).then(() => {

                    axios.get('/invitaciones/get/proyecto').then(res => {
                        lengthInvitacionesP = res.data.length;
                        cargarInvitaciones(res.data);

                    }).then(() => {
                        axios.get('/invitacionsalas/get/sala').then(res => {
                            lengthInvitacionesS = res.data.length;
                            cargarInvitacionesS(res.data);
                        });

                    });

                }).catch(error => {
                    console.log(error);
                });

                Echo.join('en-sesion').listen('MessageProyectoEvent', (e) => {
                    console.log(e);

                    axios.get('/invitacionsalas/cantidad/Proyectosysalas').then(res => {
                        msgNotify.innerHTML = res.data;

                    }).then(() => {
                        axios.get('/invitaciones/get/proyecto').then(res => {
                            cargarInvitaciones2(lengthInvitacionesP, res.data);
                        }).then(() => {
                            axios.get('/invitacionsalas/get/sala').then(res => {
                                cargarInvitaciones2S(lengthInvitacionesS, res.data);
                            });

                        });

                    }).catch(error => {
                        console.log(error);
                    });

                }).listen('MessageSalaEvent', (e) => {
                    axios.get('/invitacionsalas/cantidad/Proyectosysalas').then(res => {
                        msgNotify.innerHTML = res.data;

                    }).then(() => {
                        axios.get('/invitaciones/get/proyecto').then(res => {
                            cargarInvitaciones2(lengthInvitacionesP, res.data);
                        }).then(() => {
                            axios.get('/invitacionsalas/get/sala').then(res => {
                                cargarInvitaciones2S(lengthInvitacionesS, res.data);
                            });

                        });

                    }).catch(error => {
                        console.log(error);
                    });

                }).here((users) => {

                    /* result = users.filter(user => user.id != 9);
                    console.log('AQUI');
                    result.forEach(u => {
                        console.log(u.name);
                    });
                    console.log('===='); */

                }).joining((user) => {
                    /* console.log('ENTRANDO:');
                    console.log(user.name);
                    console.log('===='); */

                }).leaving((user) => {
                    /* console.log('SALIENDO:');
                    console.log(user.name);
                    console.log('===='); */
                });

                

                Echo.join(`sala.${Salita.value}`).listen('DiagramaEvent', (e) => {
                    console.log(e);
                    axios.get(`/salas/mostrarDiagrama/${DiagramaVista.value}`).then(res => {
                            app.graph.fromJSON(res.data);
                            console.log('DDDD:');
                            console.log(app.graph.toJSON());
                    });

                }).listen('SalirseEvent', (e) => {
                    console.log(e);
                    if(creadorSala != autenticado){
                        window.location.href = BaseUrl + '/dashboard';
                    }
                    
                    

                }).here((users) => {

                    result = users.filter(user => user.id != 9);
                    console.log('AQUI SALA');
                    result.forEach(u => {
                        console.log(u.name);
                    });
                    console.log('=====');

                }).joining((user) => {
                    console.log('ENTRANDO A SALA');
                    console.log(user.name);
                    console.log('=====');

                }).leaving((user) => {
                    console.log('SALIENDO DE SALA');
                    console.log(user.name);
                    console.log('=====');

                });

                
            }
        </script>

        <!-- Local file warning: -->
        <div id="message-fs" style="display: none;">
            <p>The application was open locally using the file protocol. It is recommended to access it trough a <b>Web
                    server</b>.</p>
            <p>Please see <a href="README.md">instructions</a>.</p>
        </div>

        <script>
            (function() {
                var fs = (document.location.protocol === 'file:');
                var ff = (navigator.userAgent.toLowerCase().indexOf('firefox') !== -1);
                if (fs && !ff) {
                    (new joint.ui.Dialog({
                        width: 300,
                        type: 'alert',
                        title: 'Local File',
                        content: $('#message-fs').show()
                    })).open();
                }
            })();
        </script>

    <script src="{{ asset('js/architectOna.js') }}"></script>
    <script type="text/javascript">
        const BtnConvertir = document.getElementById("btn-convertir");
        BtnConvertir.onclick = function() {
            
            var diagramita = app.graph.toJSON();
            var diagrama2 = diagramita.cells;
            var figuritas = '';
            var posi = '';
            var conectores = '';
            
            for (var i = 0; i < diagrama2.length; i++) {
                switch (diagrama2[i].type) {
                    case 'app.Link':
                        conectores = conectores+getEnlace(diagrama2[i],i+1);
                        break;
                    case 'custom.Bum':
                        figuritas = figuritas+getBun(diagrama2[i],i+1);
                        posi = posi+getPos(diagrama2[i],i+1);
                        break;
                    case 'custom.Actor':
                        figuritas = figuritas+getActor(diagrama2[i],i+1);
                        posi = posi+getPos(diagrama2[i],i+1);
                        break;
                    case 'custom.BD':
                        figuritas = figuritas+getDB(diagrama2[i],i+1);
                        posi = posi+getPos(diagrama2[i],i+1);
                        break;
                    default:
                        figuritas = figuritas+getRectangulo(diagrama2[i],i+1);
                        posi = posi+getPos(diagrama2[i],i+1);
                    }
            } 

            var newBase = getBase(figuritas, conectores, posi);

            var filename = "Josecito.xml";
            var pom = document.createElement('a');
            var bb = new Blob([newBase], {type: 'text/plain'});
            pom.setAttribute('href', window.URL.createObjectURL(bb));
            pom.setAttribute('download', filename);
            pom.dataset.downloadurl = ['text/plain', pom.download, pom.href].join(':');
            pom.draggable = true; 
            pom.classList.add('dragout');
            pom.click();
        }
    </script>
    
    @if(session('info') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Invitacion Enviada',
                showConfirmButton: false,
                timer: 1100
            })
        </script>
    @endif

    @if(session('adv') == 'no')
            <script>
                Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'no has seleccionado nada'
            })
            </script>
    @endif

@endsection