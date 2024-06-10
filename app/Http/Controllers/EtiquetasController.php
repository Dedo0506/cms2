<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtiquetasModel;
use Etiquetas;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class EtiquetasController extends Controller
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
        //
        $etiquetas = EtiquetasModel::latest('id')->paginate(5);
        return view('Etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Etiquetas.create');
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
        $user = auth()->user();
        $etiqueta = new EtiquetasModel(); //Creamos la variable que tenga el modelo de etiqueta.

        $etiqueta->nombreEtiqueta = $request["nombreEtiqueta"]; //TODO revisar si esto hace referencia al DOM
        $etiqueta->descripcion =  $request["descripcion"];
        $etiqueta->fechaCreacion =  date("Y-m-d H:i:s");
        $etiqueta->UsuarioCreador = $user->name;

        $etiqueta->save();      //Guardamos el registro.
        return redirect()->route('etiquetas.index')->with('Mensaje', 'Registro creado');

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
        //
        $etiquetasReg = EtiquetasModel::findOrFail($id);
        return view('Etiquetas.edit', compact('etiquetasReg'));
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
        $etiquetasRequest =  request()->except(['_token', '_method']);
        EtiquetasModel::where('id', '=', $id)->update($etiquetasRequest);
        return redirect('etiquetas')->with('Mensaje', 'Actualización realizada al registro');
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
        EtiquetasModel::destroy($id);
        return redirect('etiquetas')->with('Mensaje', 'Registro eliminado');
    }
}
