@extends('layouts.base')
@section('contenido')
<div class="seccion-catalogo">
    <br><br><br><br>
    <div class="row">
        <div class="col-3"><h1>Nueva Venta</h1></div>
        <div class="col-2">
            <a href="#" onclick="buscarProducto()" class="btn btn-info boton-mas"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <br><br>
    
    <div class="row justify-content-center">
        <div class="col-2"><h3 class="titulo-catalogo">CATEGORÍA</h3></div>
        <div class="col-3"><h3 class="titulo-catalogo">NOMBRE</h3></div>
        <div class="col-2"><h3 class="titulo-catalogo">CANTIDAD</h3></div>
        <div class="col-2"><h3 class="titulo-catalogo">PRECIO</h3></div>
        <div class="col-3"><h3 class="titulo-catalogo">SUBTOTAL</h3></div>
    </div>

    <div id="productos"></div>
    <br><br>
    <div id="totales">
        <p id="total" class="total">$0.00</p>
    </div>
</div>

@include('ventas.modal')

<script type="text/javascript">
    var total = 0;

    function calculaTotal() {
        alert('calculando total');
    }

    function buscarProducto() {
        myModal = new bootstrap.Modal('#busquedaProductos');
        myModal.show();
    }

    function agregaProducto(id, categoria, nombre, precio, inventario) {
        $('#productos').append(
            '<div class="row justify-content-center">' +
                '<div class="col-2">'+
                    '<h3 class="txt-catalogo">'+categoria+'</h3>' +
                '</div>' +
                '<div class="col-3">' +
                    '<h3 class="txt-catalogo">'+nombre+'</h3>' +
                '</div>' +
                '<div class="col-2">' +
                    '<input type="number" min="1" max="'+inventario+'" name="cantidad" value="1" class="form-control" onchange="calculaTotal()">' +
                '</div>' +
                '<div class="col-2">' +
                    '<h3 class="txt-catalogo">$'+precio+'</h3>' +
                '</div>' +
                '<div class="col-3">' +
                    '<h3 class="txt-catalogo">$'+precio+'</h3>' +
                '</div>' +
            '</div>'
        );
        
        //actualizar el total
        total += precio;
        $('#total').html('$'+total);

        myModal.hide();
    }

    
</script>
@endsection