@extends('layouts.base')
@section('contenido')
<div class="seccion-catalogo">
    <br><br><br><br>
    <div class="row">
        <div class="col-3"><h1>Categorías</h1></div>
        <div class="col-2">
            <a href="{{route('cats.create')}}" class="btn btn-info boton-mas"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <br><br>
    <form action="{{route('cats.index')}}" method="GET">
        <div class="row justify-content-center">
            <div class="col-2">
                <label for="busqueda" class="form-label float-right">Buscar:</label>
            </div>
            <div class="col-5">
                <input value="{{$busqueda}}" type="text" class="form-control" id="busqueda" name="busqueda">
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <div class="col-4"><h3 class="titulo-catalogo">NOMBRE</h3></div>
        <div class="col-3"><h3 class="titulo-catalogo">ACCIONES</h3></div>
    </div>

    @foreach( $lista as $cat )
    <div class="row justify-content-center">
        <div class="col-4"><p class="txt-catalogo">{{$cat->nombre}}</p></div>
        <div class="col-3 contenedor-acciones">
            <a href="{{route('cats.edit',$cat->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form-inline" action="{{route('cats.destroy',$cat->id)}}" method="POST" id="form{{$cat->id}}">
                @method('DELETE')
                @csrf
                <a href="#" class="btn btn-danger" onclick="borrar({{$cat->id}},'{{$cat->nombre}}')"><i class="fa-solid fa-trash-can"></i></a>
            </form>
        </div>
    </div>
    @endforeach
</div>
<script type="text/javascript">
    function borrar(id, nombre) {
        var confimar = confirm('¿Deseas borrar la categoría '+nombre+'?');
        if( confimar ) {
            var formulario = document.getElementById('form'+id);
            formulario.submit();
        }
    }
</script>
@endsection