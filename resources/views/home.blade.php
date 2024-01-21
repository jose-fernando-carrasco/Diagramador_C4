@extends('layouts.plantilla')
@section('title', 'home')

@section('css')
 <style>
    .tama{
        height: 650px;
    }
 </style>
@endsection

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://mycontenedor23.s3.amazonaws.com/segundo/complementarios/fondoHome.png" class="d-block w-100 tama" alt="...">
        {{-- <img src="https://static4.depositphotos.com/1000816/483/i/450/depositphotos_4839447-stock-photo-hand-drawing-diagram-isolated-on.jpg" class="d-block w-100 tama" alt="..."> --}}
      </div>
      <div class="carousel-item">
        <img src="https://mycontenedor23.s3.amazonaws.com/segundo/complementarios/fondoHomeLufy.png" class="d-block w-100 tama" alt="...">
        {{-- <img src="https://c1.wallpaperflare.com/preview/605/38/531/mark-marker-hand-leave.jpg" class="d-block w-100 tama" alt="..."> --}}
      </div>
      {{-- <div class="carousel-item">
        <img src="https://mycontenedor23.s3.amazonaws.com/segundo/complementarios/fondoHome.png" class="d-block w-100 tama" alt="...">
      </div> --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection