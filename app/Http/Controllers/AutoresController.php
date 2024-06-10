<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoresModel; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Response; 
use Livewire\WithPagination;


class AutoresController extends Controller
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
        $autores = AutoresModel::latest('id')->paginate(5); 
        return view('autores.index', array('autores'=>$autores)); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('autores.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $autores =  new AutoresModel(); 
        
        //Para subir la foto de los autores
        if ($request->hasFile('Foto')) {
            $file  =  $request->file('Foto');       //Obtenemos la imagen del DOM 
            $destino =  'img/autores/';             //Ruta en la que lo vamos a guardar
            $filename = time() . $file->getClientOriginalName();    //Obtenemos el nombre de la imagen
            $uploadSuccess = $request->file('Foto')->move($destino, $filename);    //Movemos la foto dentro de la carpeta de las imágenes
            $autores->Foto =  $destino . $filename;     //Guardamos el dato. 

        }

        $autores->NombreAutor = $request["NombreAutor"];
        $autores->Apodo =  $request["Apodo"]; 
        $autores->Email =  $request["Email"]; 
        $autores->Biografia =  $request["Biografia"];
        
                 

        $autores->save(); 

        return redirect()->route('autores.index')->with('Mensaje', 'Registro creado'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AutoresModel $autor)
    {
        return view('autor.show', compact('autor')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = AutoresModel::findOrFail($id); 
        return view('autores.edit', compact('autor')); 
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
        $autor = AutoresModel::findOrFail($id);

    // Validar los datos del formulario
    $request->validate([
        'NombreAutor' => 'required|string|max:255',
        'Apodo' => 'nullable|string|max:255',
        'Email' => 'required|email|max:255',
        'Biografia' => 'nullable|string',
        'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Extraer los datos del request excepto '_token' y '_method'
    $autorRequest = $request->except(['_token', '_method']);

    // Manejar la nueva imagen
    if ($request->hasFile('Foto')) {
        // Eliminar la imagen antigua si existe
        if ($autor->Foto && file_exists(public_path($autor->Foto))) {
            unlink(public_path($autor->Foto));
        }

        $file = $request->file('Foto');
        $destinationPath = 'img/autores/';
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $autorRequest['Foto'] = $destinationPath . $filename;
    }

    // Actualizar los datos del autor
    $autor->update($autorRequest);

    return redirect('autor')->with('Mensaje', 'Actualización realizada al registro');
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
        AutoresModel::destroy($id); 
        return redirect('autor')->with('Mensaje', 'Autor eliminado'); 
    }
}
