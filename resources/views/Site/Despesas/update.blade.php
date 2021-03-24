@extends('Site/Layouts/main')
@section('css_link')
    <link rel="stylesheet" href="/css/Despesa/edit.css">
@endsection
@section('title', 'Editar despesa')
@section('middle')
    <div id="despesa-create-container" class="col-md-6 offset-md-3">
        <h1>Editar Despesa</h1>
        <form action="/Despesa/update/{{$despesa->id}}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')
            <div class="form-group">
                <label for="imagem">imagem:</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file">
                <img src="/img/Despesas/{{ $despesa->imagem }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Descricao:</label>
                <textarea id="descricao" name="descricao" class="form-control">{{ $despesa->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Valor:</label>
                <input type="text" class="form-control" id="valor" name="valor" value="{{ $despesa->valor }}">
            </div>
            <div class="form-group">
                <label for="date">Data da despesa:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d',strtotime($despesa->date)) }}">
            </div>
            <input type="submit" class="btn btn-primary" value="Editar despesa">
        </form>
    </div> 
@endsection
@section('js_link')
    <script src="/js/jsNewDespesa.js"></script>
@endsection