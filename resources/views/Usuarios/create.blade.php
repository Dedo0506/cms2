@extends('app')

@section('title', 'Crear Usuario')

@section('accion', 'Crear')

@section('palabra', 'Usuario')

@section('content')

<div class="container mt-5">
    <form class="row g-3 my-5" action="{{ url('/usuarios') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="name">Nombre Usuario</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="id_rol" class="form-label">Rol: </label>
            <select name="rol" class="form-select">
                @foreach ($roles as $rol)
                    <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                @endforeach
            </select>
        </div>                
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <a class="btn btn-secondary" href="{{ url('usuarios') }}">Regresar</a>
            </div>
        </div>
    </form>
</div>

@stop
