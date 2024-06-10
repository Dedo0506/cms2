@extends('app')

@section('title', 'Editar Rol')

@section('accion', 'Editar')

@section('palabra', 'Rol')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('roles/'.$role->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Campos del formulario -->
            <div class="form-group col-md-6">
                <label for="edit_name">Nombre Rol</label>
                <input type="text" class="form-control" id="edit_name" name="name" value="{{ $role->name }}" required>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md mt-5">
                <div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a class="btn btn-secondary" href="{{ url('roles') }}">Regresar</a>
                </div>
            </div>
        </form>
    </div>
@stop
