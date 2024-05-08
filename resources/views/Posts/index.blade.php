@extends('app')

@section('title', 'Post index')

@section('content')
    <div >
        <div >

            @if (Session::has('Mensaje'))
                <div classs="alert alert-success" role="alert">
                    {{ Session::get('Mensaje') }}
                    <\div>
            @endif

            <div class="col-xs-12 col-md-6 col-lg-4">
                <a href="{{ url('posts/create') }}"  class="btn btn-secondary btn-lg"> Agregar una nuevo Post </a>
            </div>

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>Contenido</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Creación</th>
                        <th>Categoria</th>
                        <th>Etiqueta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">

                    <!--TODO mostrar todos los elementos-->
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->PostContenido}}</td>
                            <td>{{ $post->FechaCreacion }}</td>
                            <td>{{ $post->FechaPublicacion }}</td>
                            <td>{{ $post->idCategoria }}</td>
                            <td>{{ $post->idEtiqueta }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{ url('/posts/' . $etiqueta->id . '/edit') }}">
                                    Editar </a>
                                <form method="post" action="{{ url('/posts/' . $etiqueta->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('Delete') }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro deseas borrar?');"> Borrar </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop
