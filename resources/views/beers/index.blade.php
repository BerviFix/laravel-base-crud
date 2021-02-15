@extends('layouts.main')

@section('header')
     <h1 class="mt-5">Le noste Birre</h1>
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Prezzo</th>
                <th>Grado alcolico</th>
                <th>Creato il</th>
                <th>Aggiornato il</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($beers as $beer)
                <tr>
                    <td>{{ $beer->id }}</td>
                    <td>{{ $beer->name }}</td>
                    <td>{{ $beer->brand }}</td>
                    <td>{{ $beer->price }} €</td>
                    <td>{{ $beer->content }} %</td>
                    <td>{{ $beer->created_at }}</td>
                    <td>{{ $beer->updated_at }}</td>
                    <td>
                        <a href="{{ route('beers.show',  $beer->id) }}" class="btn btn-outline-light">Mostra</a>
                    </td>
                    <td>
                        <a href="{{ route('beers.edit', $beer->id) }}" class="btn btn-outline-light">Modifica</a>
                    </td>
                    <td>
                        <form action="{{ route('beers.destroy', $beer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>    
            @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
     <div class="text-right">
         <a href="{{ route('beers.create') }}" class="btn btn-primary">Aggiunig una birra di tua creazione</a>
     </div>
@endsection