<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasModel;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class CategoriasController extends Controller
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = CategoriasModel::latest('id')->paginate(5); // Asignamos a la variable categorias los registros de la base de datos llamada categories.
        return view('Categories.index', compact('categorias')); // Mandamos un arreglo con la variable categorias a la vista.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // Guardamos la informacion del formulario
        $categorias = new CategoriasModel();
        $categorias->NombreCategoria = $request["NombreCategoria"];
        $categorias->Descripcion =  $request["Descripcion"];
        $categorias->FechaCreacion =  date("Y-m-d H:i:s");
        $categorias->UsuarioCreador = "Sebas";
        $categorias->save();
        return redirect()->route('categorias.index')->with('Mensaje', 'Registro creado');
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
        $categoriaReg = CategoriasModel::findOrFail($id); // Hacemos una consulta en base a un id.
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
        $categoriaRequest = request()->except(['_token', '_method']);
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
        CategoriasModel::destroy($id);
        return redirect('categorias')->with('Mensaje', 'Registro eliminado');
    }
}
