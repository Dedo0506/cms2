@extends('app')

@section('title', 'Post index')

@section('accion', 'Crear')

@section('palabra', 'etiqueta')

@section('content')

    <div class="container mt-5">
        <form class="row g-3 my-5" action="{{ url('/etiquetas') }}" method="post">
            {{ csrf_field() }}
            <div id="nombre etiqueta" class="col-md-6">
                <label for="nombreEtiqueta" class="form-label">Nombre de la etiqueta</label>
                <input type="text" class="form-control" name="nombreEtiqueta" id="nombreEtiqueta">
            </div>
            <div id="nombre descripcion" class="col-md-12">
                <label for="descripcion" class="form-label">Descripción de la etiqueta</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md mt- 5">
                <div>
                    <button class="btn btn-primary" href="{{url('etiquetas')}}">Registrar</button>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a class="btn btn-secondary" href="{{url('etiquetas')}}">Regresar</a>
                </div>
            </div>

        </form>

    </div>

@stop
