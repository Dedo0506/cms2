<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return response()->json($estudiantes, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante =  new Estudiante();
        $estudiante->NumCuenta = $request['NumCuenta'];
        $estudiante->Nombre  = $request['Nombre'];
        $estudiante->PrimerApellido = $request['PrimerApellido'];
        $estudiante->SegundoApellido = $request['SegundoApellido'];
        $estudiante->FechaIngreso = $request['FechaIngreso'];
        $estudiante->save();
        return response()->json($estudiante, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show($NumCuenta)
    {
        return Estudiante::findOrFail($NumCuenta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $NumCuenta)
    {
        $estudiante = Estudiante::findOrFail($NumCuenta);
        $estudiante->NumCuenta = $request['NumCuenta'];
        $estudiante->Nombre  = $request['Nombre'];
        $estudiante->PrimerApellido = $request['PrimerApellido'];
        $estudiante->SegundoApellido = $request['SegundoApellido'];
        $estudiante->FechaIngreso = $request['FechaIngreso'];
        $estudiante->save();
        return response()->json($estudiante, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($NumCuenta)
    {
        Estudiante::findOrFail($NumCuenta)->delete();
        return response()->json('Elemento borrado: ' , 204);
    }
}
