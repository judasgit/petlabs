<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda en YouTube</title>
</head>
<body>
    <h1>Resultados de Búsqueda en YouTube</h1>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ route('youtube.search') }}" method="GET">
        <input type="text" name="keywords" placeholder="Ingrese palabras clave" required>
        <input type="number" name="maxResults" placeholder="Número de resultados" min="1" max="50" value="5">
        <button type="submit">Buscar</button>
    </form>

    @if(isset($videos))
        <ul>
            @foreach($videos as $video)
                <li>
                    <h3>{{ $video['snippet']['title'] }}</h3>
                    <p>{{ $video['snippet']['description'] }}</p>
                    <a href="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}" target="_blank">
                        Ver video
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
