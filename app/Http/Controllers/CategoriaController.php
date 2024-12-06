<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $lista = Categoria::where('nombre','like','%'.$busqueda.'%')->get();
        return view('categorias.index')->with(compact('lista','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            'nombre' => 'required|unique:categorias|max:255',
          ],
          [
            'nombre.required' => 'Debes llenar el campo de nombre.',
            'nombre.unique' => 'El nombre de la categoría ya existe.',
            'nombre.max' => 'El nombre de la categoría no debe exceder 255 caracteres.'
          ]
        );

        $cat = new Categoria;
        $cat->nombre = $request->nombre;
        $cat->save();

        return redirect(route('cats.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Categoria::find($id);
        return view('categorias.edit')->with(compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => ['required',\Illuminate\Validation\Rule::unique('categorias')->ignore($id),'max:255'],
          ],
          [
            'nombre.required' => 'Debes llenar el campo de nombre.',
            'nombre.unique' => 'El nombre de la categoría ya existe.',
            'nombre.max' => 'El nombre de la categoría no debe exceder 255 caracteres.'
          ]
        );
        $cat = Categoria::find($id);
        $cat->nombre = $request->nombre;
        $cat->save();

        return redirect(route('cats.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id);
        if( $cat!=null ) {
            $cat->delete();
        }
        return redirect(route('cats.index'));
    }


    public function indexREST()
    {
        $lista = Categoria::all();
        return $lista;
    }

    public function showREST($id)
    {
        $cat = Categoria::find($id);
        return $cat;
    }

    public function storeREST(Request $request)
    {
        /*$validated = $request->validate([
            'nombre' => 'required|unique:categorias|max:255',
          ],
          [
            'nombre.required' => 'Debes llenar el campo de nombre.',
            'nombre.unique' => 'El nombre de la categoría ya existe.',
            'nombre.max' => 'El nombre de la categoría no debe exceder 255 caracteres.'
          ]
        );*/

        if( $request->nombre ) {
            $cat = new Categoria;
            $cat->nombre = $request->nombre;
            $cat->save();

            $response['mensaje'] = 'OK';
        } else {
            $response['mensaje'] = 'Falta el campo NOMBRE';
        }
        return $response;
    }

    public function updateREST(Request $request, $id)
    {
        /*$validated = $request->validate([
            'nombre' => ['required',\Illuminate\Validation\Rule::unique('categorias')->ignore($id),'max:255'],
          ],
          [
            'nombre.required' => 'Debes llenar el campo de nombre.',
            'nombre.unique' => 'El nombre de la categoría ya existe.',
            'nombre.max' => 'El nombre de la categoría no debe exceder 255 caracteres.'
          ]
        );*/
        if( $request->nombre ) {
            $cat = Categoria::find($id);
            if( $cat!=null ) {
                $cat->nombre = $request->nombre;
                $cat->save();

                $response['mensaje'] = 'OK';
            } else {
                $response['mensaje'] = 'La categoría ' . $id . ' no existe';
            }
        } else {
            $response['mensaje'] = 'Falta el campo NOMBRE';
        }
        return $response;
    }

    public function destroyREST($id)
    {
        $cat = Categoria::find($id);
        if( $cat!=null ) {
            $cat->delete();

            $response['mensaje'] = 'OK';
        } else {
            $response['mensaje'] = 'La categoría ' . $id . ' no existe';
        }
        return $response;
    }

}
