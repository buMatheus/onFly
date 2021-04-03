@extends('Site.Layouts.main')
@section('css_link')
    <link rel="stylesheet" href="/css/Despesa/new.css">
@endsection
@section('title', 'Nova despesa')
@section('middle')
<div id="despesa-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastrar Despesa</h1>
        <form name="formulario" action="/Despesa" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="valor" id="valor" placeholder="125.34">
            </div>
            <div class="form-group">
                <label for="date">Data da despesa:</label>
                <input type="text" class="form-control" id="date" name="date" placeholder="dd/mm/AAAA">
            </div>
            <input onclick="return validar()" type="submit" class="btn btn-primary" value="Cadastrar despesa">
        </form>
    </div> 
@endsection
@section('js_link')
    <script src="/js/jsNewDespesa.js"></script>
@endsection