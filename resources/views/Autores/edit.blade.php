@extends('app')

@section('title', 'Editar Autor')

@section('accion', 'Editar Autor')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('autor/'.$autor->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Campos del formulario -->
            <div class="col-6" id="NombreAutor">
                <label for="NombreAutor">Nombre</label>
                <input type="text" class="form-control" id="NombreAutor" name="NombreAutor" value="{{ $autor->NombreAutor }}">
            </div>

            <div class="col-6" id="Apodo">
                <label for="Apodo">Apodo</label>
                <input type="text" class="form-control" id="Apodo" name="Apodo" value="{{ $autor->Apodo }}">
            </div>

            <div class="col-12" id="Email">
                <label for="Email">Correo</label>
                <input type="email" class="form-control" id="Email" name="Email" value="{{ $autor->Email }}">
            </div>

            <div class="col-12" id="Biografia">
                <label for="Biografia">Biografía</label>
                <textarea class="form-control" id="Biografia" name="Biografia">{{ $autor->Biografia }}</textarea>
            </div>

            <div class="col-12" id="Foto">
                <label for="Foto">Foto</label>
                <input type="file" class="form-control" id="Foto" name="Foto">
                <img src="{{ asset($autor->Foto) }}" alt="Foto del autor" class="mt-2" width="150">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@stop
