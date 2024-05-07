<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasModel;
use Illuminate\Support\Facades\DB;  //Esta biblioteca permite hacer consultas a una tabla de base de datos en particular


class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = DB::SELECT("SELECT * FROM categories");   //Asignamos a la variable categorias los registros de la base de datos llamada categories.
        return view('Categories.index', array('categorias'=>$categorias)); //Mandamos un arreglo con la variable categorias a la vista.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardamos la informacion de del formulario
        $categorias = new CategoriasModel();
        $categorias->NombreCategoria = $request["NombreCategoria"];
        $categorias->Descripcion =  $request["Descripcion"];
        $categorias->FechaCreacion =  date("Y-m-d H:i:s");
        $categorias->UsuarioCreador = "Sebas";
        $categorias->save();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaReg = CategoriasModel::findOrFail($id);   //Hacemos una consulta en base a un id.
        return view('Categories.edit', compact('categoriaReg'));
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
        $categoriaRequest =  request()->except(['_token', '_method']);
        CategoriasModel::where('id', '=', $id)->update($categoriaRequest);
        return redirect('categorias')->with('Mensaje', 'Actualización realizada al registro');
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
        CategoriasModel::destroy($id);
        return redirect('categorias')->with('Mensaje', 'Registro eliminado');
    }
}
