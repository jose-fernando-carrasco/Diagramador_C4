<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Posts</title>

    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- Agregados --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">

    <style>
        .tamanito{
            height: 550px;
            width: 1200px;
        }
    </style>
</head>
<body>
    <h1 class="pl-4 pt-4"><strong>Usuarios Activos:</strong></h1>
    <div class="usersActivos p-4"></div> 
    <hr>
    <input class="auth-user" type="hidden" value="{{auth()->user()}}">
    <div class="row row-cols-1 row-cols-md-1 pl-4">

            <div class="col mb-4 d-flex justify-content-center">
                <div class="card h-100">
                    <img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/47SKPVFJW5BLNNNTE7E4IXJTTQ.jpg" class="card-img-top tamanito p-4" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->content}}</p>
                    </div>

                    <div class="p-3">
                        <h4>Comentarios:</h4>
                        <div class="contenedor-comments"></div>
                    </div>

        

                    <form class="formulario" {{-- action="{{ route('comments.store')}}" method="POST" --}}>
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control comment-input" name="content" placeholder="comentar...">
                          <input type="hidden" class="form-control post-id" name="post_id" value="{{$post->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">enviar</button>
                    </form>

                </div>
            </div>
     
    </div>


    <script  src="/js/app.js"></script>
	<script  src="/js/post.js"></script>

    {{-- bootstrap 4 --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>