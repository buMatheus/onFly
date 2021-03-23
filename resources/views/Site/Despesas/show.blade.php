@extends('Site.layout')
@section('js_link')
    <script src="/js/jsNewDespesa.js"></script>
@endsection
@section('css_link')
    <link rel="stylesheet" href="/css/Despesa/show.css">
@endsection
@section('title', 'Despesas')
@section('middle')
<div class="conteudo">
    <div class="col-md-10 offset-md-1">
        <div class="row">
        <div id="imagem-container" class="col-md-6">
            <img src="/img/Despesas/{{ $despesa->imagem }}" class="img-fluid">
        </div>
        <div id="info-container" class="col-md-4">
            <h3 class="despesa-data">{{ date('d/m/Y',strtotime($despesa->date))}}</h3>
            <p class="despesa-valor">R${{ $despesa->valor}}</p>
            <a href="#" class="btn btn-primary" id="alterar-submit">Alterar</a>
            <a href="#" class="btn btn-primary" id="excluir-submit">Excluir</a>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Descrição da despesa:</h3>
            <p class="event-description">{{ $despesa->descricao }}</p>
        </div>
        </div>
    </div>
</div>
@endsection