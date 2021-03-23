@extends('Site.layout')
@section('js_link')
    <script src="/js/jsNewDespesa.js"></script>
@endsection
@section('css_link')
    <link rel="stylesheet" href="/css/Home/index.css">
@endsection
@section('title', 'Despesas')
@section('middle')
<div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastrar Despesa</h1>
        <form action="/Despesa" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="imagem">imagem:</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Descricao:</label>
                <textarea id="descricao" name="descricao" class="form-control" placeholder="Descricao sobre o gasto"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Valor:</label>
                <input type="number" class="form-control" name="valor" id="valor" onkeyup="validarfloat(this)" placeholder="12,34" autofocus>
            </div>
            <div class="form-group">
                <label for="date">Data da despesa:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <input type="submit" class="btn btn-primary" value="Cadastrar despesa">
        </form>
    </div> 

@endsection