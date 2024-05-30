<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasModel;

class CategoriaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return CategoriasModel::all(); // retornara todos los registros que esten de la BD en json
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$categoria = CategoriasModel::create($request->all());
        $categoria = new CategoriasModel();

        $categoria->nombreCategoria = $request['name'];
        $categoria->Descripcion = $request['description'];
        $categoria->UsuarioCreador = $request['creator'];
        $categoria->FechaCreacion = $request['created_at'];
        $categoria->save();
        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return CategoriasModel::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $categoria = CategoriasModel::findOrFail($id);
       // $categoria->update($request->all());
        $categoria->nombreCategoria = $request['nombreCategoria'];
        $categoria->Descripcion = $request['Descripcion'];
        $categoria->UsuarioCreador = $request['UsuarioCreador'];
        $categoria->FechaCreacion = $request['FechaCreacion'];
        $categoria->save();
        return response()->json($categoria,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        CategoriasModel::findOrFail($id)->delete();
        return response()->json('Elemento borrado: ',204);
    }
}
