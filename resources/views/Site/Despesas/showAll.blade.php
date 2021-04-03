@extends('Site.Layouts.main')
@section('title', 'Despesas')
@section('css_link')
    <link rel="stylesheet" href="/css/Despesa/showAll.css">
@endsection
@section('middle')
    <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
                <p class="msg">{{ session('msg')}}</p>
            @endif
        </div>
        <div class="row">
            @if($despesas->isEmpty())
                <p class="msg">Lista de despesas vazia</p>
            @endif
        </div>
        <div class="container" id="despesa-container">
            <div class="row">
                <div class="col-12" id="row-add">  
                <a href="/Despesa/create" class="btn" id="add">adicionar</a>
                </div>
                <div class="col-12">  
                <h2>Lista de todas as despesas</h2>
                </div>
            </div>           
            <div class="row" id="cards-container">
                @foreach($despesas as $despesa)
                <div class="card col-md-3">
                    <div class="row">
                        <img src="/storage/img/Despesas/{{ $despesa->imagem }}" alt="{{ $despesa->imagem }}">
                    </div>
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y',strtotime($despesa->date))}}</p>
                        <p class="card-description">{{$despesa->descricao }}</p>
                        <p class="card-participants">R${{$despesa->valor}}</p>
                        <a href="/Despesa/{{ $despesa->id }}" class="btn" id="show">Detalhar</a>
                        <a href="/Despesa/{{ $despesa->id }}/edit" class="btn" id="edit">Editar</a>
                        <form action="/Despesa/{{ $despesa->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirmar()" type="submit" class="btn btn-danger delete-btn" id="delete"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form> 
                    </div>
                </div>
                @endforeach
                @if(count($despesas) == 0)
                <p>Não há despesas cadastradas!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js_link')
    <script src="/js/jsShowAll.js"></script>
@endsection