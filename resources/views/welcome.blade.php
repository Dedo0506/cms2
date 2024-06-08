@extends('app')

@section('title', 'Post recientes')

@section('accion', '10 más recientes')

@section('palabra', 'posts')

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
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img class= "card-img-top w-25" src="{{asset($post->PostImagen)}}" alt="imagen"></td>
                            <td>{{ $post->PostContenido}}</td>
                            <td>{{ $post->FechaCreacion }}</td>
                            <td>{{ $post->FechaPublicacion }}</td>
                            <td>{{ $post->Categorias->NombreCategoria }}</td>
                            <td>{{ $post->Etiquetas->nombreEtiqueta }}</td>
                            {{-- <td>
                                <a class="btn btn-secondary btn-sm" href="{{ url('/posts/' . $post->id . '/edit') }}">
                                    Editar </a>
                                <form method="post" action="{{ url('/posts/' . $post->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('Delete') }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro deseas borrar?');"> Borrar </button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@stop