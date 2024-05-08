@extends('app')

@section('title', 'Post editar')

@section('content')
<h1>Formulario de etiquetas</h1>


<div class="formulario categorias">
    <form action="{{route('posts.update', $post)}}" method="POST">
        @csrf
        @method('put')
        <div id="nombre etiqueta">
            <label for="PostContenido">Contenido del post</label>
            <input type="text" name="PostContenido" id="PostContenido">
        </div>
        <div id="categoria">
            <select for="categoria">Categoria</label>
                @foreach ($categorias as  $categoria => $id)
                <option value="{{$categoria->id}}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->name }}
                </option>
            @endforeach
        </div>
        <div id="etiqueta">
            <select for="etiqueta">Etiqueta</label>
                @foreach ($etiquetas as  $etiqueta => $id)
                <option value="{{$etiqueta->id}}" {{ old('etiqueta') == $etiqueta->id ? 'selected' : '' }}>
                    {{ $etiqueta->name }}
                </option>
            @endforeach
        </div>

        <div>
            <button class="btn btn-primary" href="{{url('posts.edit')}}">Editar</button></button>
        </div>

    </form>


</div>

<!--Botón para regresar a la pantalla anterior-->
<div class="col-xs-12 col-md-6 col-lg-4">
    <a class="btn btn-secondary" href="{{url('posts.index')}}">Regresar</a>
</div>

@stop

