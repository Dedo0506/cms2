@extends('app')

@section('title', 'Editar Usuario')

@section('accion', 'Editar')

@section('palabra', 'Usuario')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('usuarios/'.$user->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Campos del formulario -->
            <div class="form-group col-md-6">
                <label for="edit_name">Nombre Usuario</label>
                <input type="text" class="form-control" id="edit_name" name="name" value="{{ $user->name }}" required>
            </div>
            <div id="etiqueta" class="form-group col-md-6">
                <label for="id_rol" class="form-label">Rol: </label>
                <select name="id_rol" class="form-select">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" {{ $user->hasRole($rol->name) ? 'selected' : '' }}>
                            {{ $rol->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="edit_email">Email</label>
                <input type="email" class="form-control" id="edit_email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="edit_password">Contraseña</label>
                <input type="password" class="form-control" id="edit_password" name="password" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md mt-5">
                <div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a class="btn btn-secondary" href="{{ url('usuarios') }}">Regresar</a>
                </div>
            </div>
        </form>
    </div>
@stop
