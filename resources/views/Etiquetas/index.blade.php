@extends('app')

@section('title', 'Etiquetas index')

@section('accion', 'Listado de')

@section('palabra', 'etiquetas')

@section('content')
    <div>
        <div class="container">

            @if (Session::has('Mensaje'))
                <div classs="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
            @endif

            <div class="col-xs-12 col-md-6 col-lg-4">
                <a href="{{ url('etiquetas/create') }}" class="btn btn-secondary btn-lg my-3"> Agregar una nueva etiqueta </a>
            </div>

            <table class="table" id="categorias">
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

                    <!--TODO mostrar todos los elementos-->
                    @foreach ($etiquetas as $etiqueta)
                        <tr>
                            <td>
                                {{ $etiqueta->nombreEtiqueta }}
                            </td>
                            <td>
                                {{ $etiqueta->descripcion }}
                            </td>
                            <td>
                                {{ $etiqueta->fechaCreacion }}
                            </td>
                            <td>
                                {{ $etiqueta->usuarioCreador }}
                            </td>
                            <td>
                                <a class="btn btn-secondary btn-sm"
                                    href="{{ url('/etiquetas/' . $etiqueta->id . '/edit') }}">
                                    Editar </a>
                                <form method="post" action="{{ url('/etiquetas/' . $etiqueta->id) }}">
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
            <div class="d-flex justify-content-center">
                {{ $etiquetas->links('pagination.bootstrap-5') }}
            </div>

        </div>
    </div>
@stop
