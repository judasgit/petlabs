<div class="modal" tabindex="-1" id="busquedaProductos">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Búsqueda de Productos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Inventario</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $productos as $p )
                <tr>
                    <td>{{$p->categoria->nombre}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->cantidad}}</td>
                    <td>${{$p->precio}}</td>
                    <td><button class="btn btn-success" onclick="agregaProducto({{$p->id}},'{{$p->categoria->nombre}}','{{$p->nombre}}',{{$p->precio}},{{$p->cantidad}})"><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>