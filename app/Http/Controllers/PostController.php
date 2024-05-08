<?php

namespace App\Http\Controllers;

use App\Models\CategoriasModel;
use App\Models\EtiquetasModel;
use App\Models\PostModel;
use Etiquetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){

        $posts = PostModel::latest('id')->paginate(10);
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

        $post->PostContenido = $request->input("PostContenido");
        $post->id_Categoria = $request->input("categoria");
        $post->id_Etiqueta = $request->input("etiqueta");
        $post->fechaCreacion =  date("Y-m-d H:i:s");
        $post->PostImagen = "img/imagen.png";
        $post->fechaPublicacion = $request->input("fechaPublicacion");
        $post->Estatus = 1;

        $post->save();

        return redirect()->route('posts.index')->with('Mensaje', 'Registro creado');
    }

    public function show(PostModel $post){
        return view('posts.show', compact ('posts')); 
    }

    public function edit(PostModel $post)
    {
        $categorias = CategoriasModel::all();
        $etiquetas = EtiquetasModel::all();
        return view('posts.edit', compact ('post', 'categorias', 'etiquetas'));
    }

    public function update(Request $request, $id)
    {
        //
        $postsRequest =  request()->except(['_token', '_method']);
        PostModel::where('id', '=', $id)->update($postsRequest);
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
        return view('welcome', compact('posts'));
    }
}
