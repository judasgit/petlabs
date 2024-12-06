@extends('layouts.base')
@section('contenido')
<div class="seccion-catalogo">
    <br><br><br><br>
    <div class="row">
        <div class="col-2">
            <a href="{{route('prods.index')}}" class="btn btn-info">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <div class="col-3"><h1>Modificar Producto</h1></div>
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
    <form action="{{route('prods.update',$prod->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input value="{{ $prod->nombre }}" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" required>
                    <div id="nombreHelp" class="form-text">Nombre del producto.</div>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input value="{{ $prod->descripcion }}" type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcionHelp" required>
                    <div id="descripcionHelp" class="form-text">Descripción completa del producto.</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input value="{{ $prod->cantidad }}" type="number" class="form-control" id="cantidad" name="cantidad" aria-describedby="cantidadHelp" required>
                        <div id="cantidadHelp" class="form-text">Cantidad de existencias del producto.</div>
                    </div>
                    <div class="col-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input value="{{ $prod->precio }}" type="text" class="form-control" id="precio" name="precio" aria-describedby="precioHelp" required>
                        <div id="precioHelp" class="form-text">Precio al público.</div>
                    </div>
                    <div class="col-6">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-control" id="categoria" name="categoria" aria-describedby="categoriaHelp" required>
                            @foreach( $categorias as $c )
                                <option value="{{$c->id}}" {{$c->id==$prod->id_categoria ? 'selected' : ''}}>{{$c->nombre}}</option>
                            @endforeach
                        </select>
                        <div id="categoriaHelp" class="form-text">Categoría del producto.</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
            </div>
        </div>
    </form>
</div>
@endsection