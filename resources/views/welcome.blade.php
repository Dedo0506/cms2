@extends('app')

@section('title', 'Post recientes')

@section('accion', '10 más recientes')

@section('content')

<div >
        <div class="container mt-3">

            @if (Session::has('Mensaje'))
                <div classs="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
            @endif

            {{-- <div class="col-xs-12 col-md-6 col-lg-4">
                <a href="{{ url('posts/create') }}"  class="btn btn-secondary btn-lg my-3"> Agregar una nuevo Post </a>
            </div> --}}

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>Imagen</th>
                        <th>Contenido</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Publicación</th>
                        <th>Categoria</th>
                        <th>Etiqueta</th>
                        {{-- <th>Acciones</th> --}}
                    </tr>
                </thead>
                <tbody class="list">

                    <!--TODO mostrar todos los elementos-->
                   
                </tbody>
            </table>
        </div>
    </div>

@stop