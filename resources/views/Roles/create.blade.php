@extends('app')

@section('title', 'Crear rol')

@section('accion', 'Crear')

@section('palabra', 'Rol')

@section('content')

<div class="container mt-5">
    <form class="row g-3 my-5" action="{{ url('/roles') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-6">
            <label for="name">Nombre Rol</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <a class="btn btn-secondary" href="{{ url('roles') }}">Regresar</a>
            </div>
        </div>
    </form>
</div>

@stop
