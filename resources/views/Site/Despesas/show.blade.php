@extends('Site.Layouts.main')
@section('css_link')
    <link rel="stylesheet" href="/css/Despesa/show.css">
@endsection
@section('title', 'Despesa detalhada')
@section('middle')
    <div class="conteudo">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div id="imagem-container" class="col-md-6">
                    <img src="/storage/img/Despesas/{{ $despesa->imagem }}" class="img-fluid">
                </div>
                <div id="info-container" class="col-md-4">
                    <h3 class="despesa-data">{{ $despesa->date }}</h3>
                    <p class="despesa-valor">R${{ $despesa->valor}}</p>
                    <div class="row" id="btns">
                        <a href="/Despesa/{{ $despesa->id }}/edit" class="btn btn-primary" id="alterar-submit">Editar</a>
                        <form action="/Despesa/{{ $despesa->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" id="delete">Excluir</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12" id="description-container">
                    <h3>Descrição da despesa:</h3>
                    <p class="event-description">{{ $despesa->descricao }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection