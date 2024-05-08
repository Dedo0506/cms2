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
        $post->PostImagen = "img/imagen";
        $post->fechaPublicacion = $request->input("fechaPublicacion");
        $post->Estatus = 1;

        $post->save();

        return redirect()->route('posts.edit', $post->id);
    }

    public function show(PostModel $post){
        return view('posts.show', compact ('posts')); 
    }

    public function edit(PostModel $post)
    {
        $categorias = CategoriasModel::pluck('name', 'id');
        $etiquetas = EtiquetasModel::all();
        return view('posts.edit', compact ('post', 'categorias', 'etiquetas'));
    }

    public function categoria(CategoriasModel $categoria){
        $posts = PostModel::where('id_Categoria', $categoria->id)
                    ->where ('status', 2)
                    ->latest('id')
                    ->paginate(4);

        return view('posts.categoria', compact('posts', 'categoria'));
    }


    public function tag(EtiquetasModel $tag){
        $posts = $tag->posts()->where('tag_id', $tag->id)
                    ->where ('status', 2)
                    ->latest('id')
                    ->paginate(4);

        return view('posts.tag', compact('posts', 'tag'));
    }
}
