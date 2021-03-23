@extends('Site.layout')
@section('css_link')
    <link rel="stylesheet" href="/css/Despesa/showAll.css">
@endsection
@section('title', 'Despesas')
@section('middle')
    <div id="events-container" class="col-md-12">
        <a href="/Despesa/new" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                </svg>
                Despesa
        </a>
        <h2>Lista de todas as despesas</h2>
        <div id="cards-container" class="row">
            @foreach($despesas as $despesa)
            <div class="card col-md-3">
                <img src="/img/Despesas/{{ $despesa->imagem }}" alt="{{ $despesa->imagem }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y',strtotime($despesa->date))}}</p> <!--colocar mascara-->
                    <h5 class="card-title">{{$despesa->descricao }}</h5>
                    <p class="card-participants">R${{$despesa->valor}}</p> <!--colocar mascara-->
                    <a href="/Despesa/edit/{{ $despesa->id }}" class="btn btn-primary">Editar</a>
                    <form action="/Despesa/{{ $despesa->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                    </form>
                    <a href="/Despesa/{{ $despesa->id }}" class="btn btn-primary">Detalhar</a>
                    
                </div>
            </div>
            @endforeach
            @if(count($despesas) == 0)
            <p>Não há despesas cadastradas!</p>
            @endif
        </div>
    </div>
@endsection