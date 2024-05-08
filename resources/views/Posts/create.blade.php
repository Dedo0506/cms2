@extends('app')

@section('title', 'Post crear')

@section('content')
<h1>Formulario de etiquetas</h1>


<div class="formulario categorias">
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="PostContenido">
            <label for="PostContenido">Contenido del post</label>
            <textarea type="text" name="PostContenido" id="PostContenido"></textarea>
        </div>
        <div id="categoria">
            <select name="categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->NombreCategoria }}</option>
                @endforeach
            </select>
        </div>

        <div id="etiqueta">
            <select name="etiqueta"> 
                @foreach ($etiquetas as $etiqueta)
                    <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombreEiqueta }}</option>
                @endforeach
            </select>
        </div>            
        <div id="fechaPublicacion">
            <label for="fechaPublicacion">Fecha de Publicación:</label>
            <input type="date" id="fechaPublicacion" name="fechaPublicacion">
        </div>        

        <div>
            <button class="btn btn-primary" href="{{url('posts.index')}}">Registrar</button>
        </div>

    </form>


</div>

<!--Botón para regresar a la pantalla anterior-->
<div class="col-xs-12 col-md-6 col-lg-4">
    <a class="btn btn-secondary" href="{{url('posts')}}">Regresar</a>
</div>
@stop

