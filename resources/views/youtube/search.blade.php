@extends('layouts.base')

@section('contenido')
<div class="content">
    <h2>Resultados de búsqueda en YouTube</h2>
    
    <form action="{{ route('youtube.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Ingresa palabras clave" required>
            <input type="number" name="maxResults" class="form-control" placeholder="Número de resultados" value="" min="1">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    @if(isset($results))
        <div class="row">
            @foreach($results as $video)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Miniatura del video -->
                        <img src="{{ $video['snippet']['thumbnails']['default']['url'] }}" class="card-img-top" alt="Miniatura">
                        
                        <div class="card-body">
                            <!-- Título del video -->
                            <h5 class="card-title">{{ $video['snippet']['title'] }}</h5>
                            <!-- Descripción -->
                            <p class="card-text">{{ $video['snippet']['description'] }}</p>
                            <!-- Link al video en YouTube -->
                            <a href="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}" class="btn btn-primary" target="_blank">Ver en YouTube</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron resultados.</p>
    @endif
</div>
@endsection
