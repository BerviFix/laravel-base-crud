<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <main class="container">
            <h1 class="mt-5">Le noste Birre</h1>

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
                    </tr>
                </thead>

                <tbody>
                    @foreach ($beers as $beer)
                        <tr>
                            <td>{{ $beer->id }}</td>
                            <td>{{ $beer->name }}</td>
                            <td>{{ $beer->brand }}</td>
                            <td>{{ $beer->price }}</td>
                            <td>{{ $beer->content }} %</td>
                            <td>{{ $beer->created_at }}</td>
                            <td>{{ $beer->updated_at }}</td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>
