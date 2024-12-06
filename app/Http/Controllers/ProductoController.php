<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $lista = Producto::where('nombre','like','%'.$busqueda.'%')
                    ->orWhere('descripcion','like','%'.$busqueda.'%')->get();
        return view('productos.index')->with(compact('lista','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create')->with(compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:productos|max:255',
            'descripcion' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
          ],
          [
            'nombre.required' => 'Debes llenar el campo de nombre.',
            'nombre.unique' => 'El nombre del producto ya existe.',
            'nombre.max' => 'El nombre de producto no debe exceder 255 caracteres.',
            'descripcion.required' => 'Debes dar una descripción del producto',
            'cantidad.required' => 'Debes indicar la cantidad en inventario',
            'cantidad.integer' => 'Debes ingresar un número entero para la cantidad',
            'precio.required' => 'Debes indicar el precio del producto',
            'precio.numeric' => 'Debes ingresar un número decimal para el precio',
          ]
        );

        $producto = new Producto;
        $producto->id_categoria = $request->categoria;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save();

        return redirect(route('prods.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Producto::find($id);
        $categorias = Categoria::all();
        return view('productos.edit')->with(compact('prod','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => ['required',\Illuminate\Validation\Rule::unique('productos')->ignore($id),'max:255'],
            'descripcion' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
          ],
          [
            'nombre.required' => 'Debes llenar el campo de nombre.',
            'nombre.unique' => 'El nombre del producto ya existe.',
            'nombre.max' => 'El nombre de producto no debe exceder 255 caracteres.',
            'descripcion.required' => 'Debes dar una descripción del producto',
            'cantidad.required' => 'Debes indicar la cantidad en inventario',
            'cantidad.integer' => 'Debes ingresar un número entero para la cantidad',
            'precio.required' => 'Debes indicar el precio del producto',
            'precio.numeric' => 'Debes ingresar un número decimal para el precio',
          ]
        );

        $producto = Producto::find($id);
        $producto->id_categoria = $request->categoria;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save();

        return redirect(route('prods.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Producto::find($id);
        if( $prod!=null ) {
            $prod->delete();
        }
        return redirect(route('prods.index'));
    }
}
