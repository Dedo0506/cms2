@extends('app')

@section('title', 'Post index')

@section('accion', 'Listado de')

@section('palabra', 'categorias')

@section('content')
    <div class="container">

        @if (Session::has('Mensaje'))
        <div classs="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
        @endif

        <div class="col-xs-12 col-md-6 col-lg-4">
            <a href="{{ url('categorias/create') }}" class="btn btn-secondary btn-lg my-3"> Agregar una nueva categoria </a>
        </div>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="list">

                @foreach ($categorias as $categorias)
                    <tr>
                        <td>
                            {{ $categorias->NombreCategoria }}
                        </td>
                        <td>
                            {{ $categorias->Descripcion }}
                        </td>
                        <td>
                            {{ $categorias->FechaCreacion }}
                        </td>
                        <td>
                            {{ $categorias->UsuarioCreador }}
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{{ url('/categorias/' . $categorias->id . '/edit') }}">
                                Editar </a>
                            <form method="post" action="{{ url('/categorias/' . $categorias->id) }}">
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

@stop
