@extends('app')

@section('title', 'Post crear')

@section('accion', 'Crear nuevo')

@section('palabra', 'posts')

@section('content')

<div class="container mt-5">
    <form class="row g-3 my-5" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12" id="PostContenido">
            <label for="PostContenido" class="form-label">Contenido del post</label>
            <textarea type="text" class="form-control" name="PostContenido" id="PostContenido"></textarea>
        </div>
        <div id="categoria" class="col-md-6">
            <label for="id_categoria" class="form-label">Categoria: </label>
            <select name="categoria" class="form-select">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->NombreCategoria }}</option>
                @endforeach
            </select>
        </div>

        <div id="etiqueta" class="col-md-6">
            <label for="id_etiqueta" class="form-label">Etiqueta: </label>
            <select name="etiqueta" class="form-select"> 
                @foreach ($etiquetas as $etiqueta)
                    <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombreEtiqueta }}</option>
                @endforeach
            </select>
        </div>            
        <div id="fechaPublicacion">
            <label for="fechaPublicacion">Fecha de Publicación:</label>
            <input type="date" id="fechaPublicacion" name="fechaPublicacion">
        </div>        

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt- 5">
            <div>
                <button class="btn btn-primary" href="{{url('posts')}}">Registrar</button>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <a class="btn btn-secondary" href="{{url('posts')}}">Regresar</a>
            </div>
        </div>
    </form>

   

</div>


 
@stop

