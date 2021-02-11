@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Aggiungi la tua Birra fatta in casa</h1>
@endsection

@section('content')
<form action="{{ route('beers.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="name">Nome della Birra</label>
        <input type="text" class="form-control" name="name"  id="name" placeholder="Nome della Birra">
    </div>
    <div class="form-group">
        <label for="brand">La tua marca</label>
        <input type="text" class="form-control" name="brand" id="brand" placeholder="La tua marca">
    </div>
    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Prezzo">
    </div>
    <div class="form-group">
        <label for="content">Grado alcolico</label>
        <input type="text" class="form-control" name="content"  id="content" placeholder="Grado alcolico">
    </div>
    
    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('beers.index') }}" class="btn btn-secondary">Indietro</a>
</form>
@endsection