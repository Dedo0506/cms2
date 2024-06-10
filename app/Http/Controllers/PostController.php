<?php

namespace App\Http\Controllers;

use App\Models\CategoriasModel;
use App\Models\EtiquetasModel;
use App\Models\PostModel;
use Etiquetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class PostController extends Controller
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function index(){

        $posts = PostModel::latest('id')->paginate(5);
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        $categorias = CategoriasModel::all();
        $etiquetas = EtiquetasModel::all(); 
        return view('posts.create', compact('categorias', 'etiquetas'));
    }

    public function store(Request $request){
        $post = new PostModel(); 

        //Para subir la foto de los autores
        if ($request->hasFile('PostImagen')) {
            $file  =  $request->file('PostImagen');       //Obtenemos la imagen del DOM 
            $destino =  'img/posts/';             //Ruta en la que lo vamos a guardar
            $filename = time() . $file->getClientOriginalName();    //Obtenemos el nombre de la imagen
            $uploadSuccess = $request->file('PostImagen')->move($destino, $filename);    //Movemos la foto dentro de la carpeta de las imágenes
            $post->PostImagen =  $destino . $filename;     //Guardamos el dato. 

        }

        $post->PostContenido = $request->input("PostContenido");
        $post->id_Categoria = $request->input("categoria");
        $post->id_Etiqueta = $request->input("etiqueta");
        $post->fechaCreacion =  date("Y-m-d H:i:s");
        $post->fechaPublicacion = $request->input("fechaPublicacion");
        $post->Estatus = 1;

        $post->save();

        return redirect()->route('posts.index')->with('Mensaje', 'Registro creado');
    }

    public function show(PostModel $post){
        return view('posts.show', compact ('post')); 
    }

    public function edit(PostModel $post)
    {
        $post = PostModel::findOrFail($post->id);
        $categorias = CategoriasModel::all();
        $etiquetas = EtiquetasModel::all();
        return view('posts.edit', compact ('post', 'categorias', 'etiquetas'));
    }

    public function update(Request $request, $id)
    {
        //
        $post = PostModel::findOrFail($id);

        $postsRequest =  $request->except(['_token', '_method']);
        if ($request->hasFile('PostImagen')) {
            if ($post->PostImagen && file_exists(public_path($post->PostImagen))) {
                unlink(public_path($post->PostImagen));
            }    
            $file  =  $request->file('PostImagen');       //Obtenemos la imagen del DOM 
            $destinationPath =  'img/posts/';             //Ruta en la que lo vamos a guardar
            $filename = time() . '_' .$file->getClientOriginalName();    //Obtenemos el nombre de la imagen
            $file->move($destinationPath, $filename);    //Movemos la foto dentro de la carpeta de las imágenes
            $postsRequest['PostImagen'] =  $destinationPath . $filename;     //Guardamos el dato. 

        }

        $post->update($postsRequest);
        return redirect('posts')->with('Mensaje', 'Actualización realizada al registro');
    }
 
    public function destroy($id)
    {
        //
        PostModel::destroy($id);
        return redirect('posts')->with('Mensaje', 'Registro eliminado');
    }

    public function welcome(){
        $posts = PostModel::latest('id')->paginate(10);
        return view('welcome', compact('posts'))->with('Mensaje', 'Registro eliminado');;
    }
}
