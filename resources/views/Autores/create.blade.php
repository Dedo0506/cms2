@extends('app')

@section('title', 'Crear Autor')

@section('accion', 'Crear')

@section('content')

<div class="container mt-5">
    <form class="row g-3 my-5" action="{{route('autor.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12" id="NombreAutor">
            <label for="NombreAutor" class="form-label">Nombre del Autor</label>
            <textarea type="text" class="form-control" name="NombreAutor" id="NombreAutor"></textarea>
        </div>
        
        <div class="col-12" id="Apodo">
            <label for="Apodo" class="form-label">Apodo del Autor</label>
            <textarea type="text" class="form-control" name="Apodo" id="Apodo"></textarea>
        </div>

        <div class="col-12" id="Email">
            <label for="Email" class="form-label">Correo electrónico</label>
            <textarea type="text" class="form-control" name="Email" id="Email"></textarea>
        </div>

        <div class="col-12" id="Biografia">
            <label for="Biografia" class="form-label">Biografía del autor</label>
            <textarea type="text" class="form-control" name="Biografia" id="Biografia"></textarea>
        </div>

        <div class="col-12" id="Foto">
            <label for="Foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="Foto" id="Foto"></in>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt- 5">
            <div>
                <button class="btn btn-primary" href="{{url('autor')}}">Registrar</button>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <a class="btn btn-secondary" href="{{url('autor')}}">Regresar</a>
            </div>
        </div>
    </form>

   

</div>



@stop

