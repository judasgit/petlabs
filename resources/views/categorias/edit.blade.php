@extends('layouts.base')
@section('contenido')
<div class="seccion-catalogo">
    <br><br><br><br>
    <div class="row">
        <div class="col-2">
            <a href="{{route('cats.index')}}" class="btn btn-info">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <div class="col-3"><h1>Nueva Categoría</h1></div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('cats.update',$cat->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input value="{{ $cat->nombre }}" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" required>
                    <div id="nombreHelp" class="form-text">Nombre de la categoría.</div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
            </div>
        </div>
    </form>
</div>
@endsection