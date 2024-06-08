@extends('app')

@section('title', 'Post index')

@section('accion', 'Crear')

@section('palabra', 'categoria')

@section('content')
<div class="container mt-5">
        <form class="row g-3 my-5" action="{{ url('/categorias') }}" method="post">
            {{ csrf_field() }}
            <div class="col-6" id="categoria nombre">
                <label class="form-label" for="NombreCategoria">Nombre de la categoria</label>
                <input type="text" class="form-control" name="NombreCategoria" id="NombreCategoria">
            </div>
            <div id="categoria descripcion">
                <label class="form-label" for="Descripcion">Descripción</label>
                <input type="text" class="form-control" name="Descripcion" id="Descripcion">
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md mt- 5">
                <div>
                    <button class="btn btn-primary" href="{{url('categorias')}}">Registrar</button>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a class="btn btn-secondary" href="{{url('categorias')}}">Regresar</a>
                </div>
            </div>
        </form>
    </div>

@stop
