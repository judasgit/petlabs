@extends('layouts.base')
@section('contenido')
<div class="seccion-catalogo">
    <br><br><br><br>
    <div class="row">
        <div class="col-3"><h1>Ventas</h1></div>
        <div class="col-2">
            <a href="{{route('ventas.create')}}" class="btn btn-info boton-mas"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <br><br>
    
    <div class="row justify-content-center">
        <div class="col-3"><h3 class="titulo-catalogo">FOLIO</h3></div>
        <div class="col-3"><h3 class="titulo-catalogo">FECHA</h3></div>
        <div class="col-3"><h3 class="titulo-catalogo">TOTAL</h3></div>
        <div class="col-3"><h3 class="titulo-catalogo">ACCIONES</h3></div>
    </div>

    @foreach( $lista as $v )
    <div class="row justify-content-center">
        <div class="col-3"><p class="txt-catalogo">{{$v->id}}</p></div>
        <div class="col-3"><p class="txt-catalogo">{{$v->fecha}}</p></div>
        <div class="col-3"><p class="txt-catalogo">{{$v->total}}</p></div>
        <div class="col-3 contenedor-acciones">
            <a href="{{route('ventas.edit',$v->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form-inline" action="{{route('ventas.destroy',$v->id)}}" method="POST" id="form{{$v->id}}">
                @method('DELETE')
                @csrf
                <a href="#" class="btn btn-danger" onclick="borrar({{$v->id}},'{{$v->fecha}}','{{$v->total}}')"><i class="fa-solid fa-trash-can"></i></a>
            </form>
        </div>
    </div>
    @endforeach
</div>
<script type="text/javascript">
    function borrar(id, fecha, total) {
        var confimar = confirm('¿Deseas cancelar la venta con folio #'+id+
                                ', fecha '+fecha+' y total $'+total+'?');
        if( confimar ) {
            var formulario = document.getElementById('form'+id);
            formulario.submit();
        }
    }
</script>
@endsection