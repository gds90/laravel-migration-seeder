<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Treni in partenza oggi</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center my-4">Treni in partenza oggi:</h1>
                    <table class="table-striped table border border-1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Codice Treno</th>
                                <th>Azienda</th>
                                <th>Stazione di partenza</th>
                                <th>Stazione di arrivo</th>
                                <th>Orario di partenza</th>
                                <th>Orario di arrivo</th>
                                <th>Stato</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trains as $train)
                                <tr>
                                    <td>{{ $train->id }}</td>
                                    <td>{{ $train->codice_treno }}</td>
                                    <td>{{ $train->azienda }}</td>
                                    <td>{{ $train->stazione_partenza }}</td>
                                    <td>{{ $train->stazione_arrivo }}</td>
                                    <td>{{ substr($train->orario_partenza, 0, 5) }}</td>
                                    <td>{{ substr($train->orario_arrivo, 0, 5) }}</td>
                                    <td>
                                        @if ($train->cancellato)
                                            Cancellato
                                        @elseif ($train->in_orario)
                                            In orario
                                        @else
                                            In ritardo
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
