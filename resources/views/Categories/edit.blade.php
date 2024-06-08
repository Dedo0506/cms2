@extends('app')

@section('title', 'Post index')

@section('accion', 'Editar')

@section('palabra', 'categoria')

@section('content')


    <div class="formulario categorias">
        <form action="{{ route('categorias.update', $categoriaReg->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div id="categoria nombre">
                <label for="NombreCategoria">Nombre de la categoria</label>
                <input type="text" name="NombreCategoria" id="NombreCategoria"
                    value="{{ isset($categoriaReg->NombreCategoria) ? $categoriaReg->NombreCategoria : '' }}" required
                    placeholder="Nombre">
            </div>
            <div id="categoria descripcion">
                <label for="Descripcion">Descripción</label>
                <input type="text" name="Descripcion" id="Descripcion"
                    value="{{ isset($categoriaReg->Descripcion) ? $categoriaReg->Descripcion : '' }}" required
                    placeholder="Descripcion">
            </div>
            <button class="btn btn-primary" href="{{ url('categorias') }}">Editar</button>
        </form>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-4">
        <a class="btn btn-secondary" href="{{ url('categorias') }}">Regresar</a>
    </div>

@stop
