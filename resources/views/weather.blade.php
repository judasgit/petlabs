@extends('layouts.base')

@section('contenido')
    <div class="content">
    <h1>Información del Clima</h1>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if(isset($weather))
        <h2>{{ $weather['name'] }} - {{ $weather['sys']['country'] }}</h2>
        <p>Temperatura: {{ $weather['main']['temp'] }} °C</p>
        <p>Descripción: {{ $weather['weather'][0]['description'] }}</p>
        <p>Humedad: {{ $weather['main']['humidity'] }}%</p>
        <p>Viento: {{ $weather['wind']['speed'] }} m/s</p>
    @endif

    <form action="{{ route('showWeather') }}" method="GET">
        <input type="text" name="city" placeholder="Ingrese una ciudad">
        <button type="submit">Consultar Clima</button>
    </form>
</div>

@endsection
