@extends('Site.Layouts.main')
@section('title', 'On Fly')
@section('css_link')
    <link rel="stylesheet" href="/css/Home/index.css">
@endsection
@section('middle')
    <div class="container-fluid">
      <!-- slider -->
      <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
          <li data-target="#mainSlider" data-slide-to="1"></li>
          <li data-target="#mainSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/viagem-corporativa.jpg" class="d-block w-100" alt="Viagens corporativas">
          </div>
          <div class="carousel-item">
            <img src="img/gestao-1.jpg" class="d-block w-100" alt="Gestao de viagens corporativas">
          </div>
          <div class="carousel-item">
            <img src="img/gastos-por-grafico.png" class="d-block w-100" alt="Grafico de despesas">
          </div>
        </div>
        <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
@endsection
