@extends('app')

@section('title', 'Post editar')

@section('accion', 'Editar')

@section('content')

    <div class="container mt-5">
        <form class="row g-3 my-5"action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('put')
            <div class="col-12" id="PostContenido">
                <label for="PostContenido" class="form-label">Contenido del post</label>
                <textarea type="text" class="form-control" name="PostContenido" id="PostContenido" required placeholder="Contenido Posts">{{ $post->PostContenido }}</textarea>
            </div>
            <div id="categoria" class="col-md-6">
                <label for="id_categoria" class="form-label">Categoria: </label>
                <select name="id_categoria" class="form-select">                    
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $post->id_Categoria ? 'selected' : '' }}>{{ $categoria->NombreCategoria }}</option>
                    @endforeach
                </select>
            </div>

            <div id="etiqueta" class="col-md-6">
                <label for="id_etiqueta" class="form-label">Etiqueta: </label>
                <select name="id_etiqueta" class="form-select"> 
                    @foreach ($etiquetas as $etiqueta)
                        <option value="{{ $etiqueta->id }}" {{ $etiqueta->id == $post->id_Etiqueta ? 'selected' : '' }}>{{ $etiqueta->nombreEtiqueta }}</option>
                    @endforeach
                </select>
            </div>            
            <div id="fechaPublicacion">
                <label for="fechaPublicacion">Fecha de Publicación:</label>
                <input type="date" id="fechaPublicacion" name="fechaPublicacion" value="{{ $post->fechaPublicacion }}">{{$post->fechaPublicacion}}</input>
            </div>        

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt- 5">
                <div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a class="btn btn-secondary" href="{{ route('posts.index') }}">Regresar</a>
                </div>
            </div>
        </form>

    </div>

    
@stop
