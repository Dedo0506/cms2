@extends('app')

@section('title', 'Categorias')

@section('accion', 'Listado de')

@section('palabra', 'Categorias')

@section('content')
    <div class="container">
        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
        @endif
        @if (auth()->user()->hasRole('Admin'))
        <div class="col-xs-12 col-md-6 col-lg-4">
            <a href="{{ route('categorias.create') }}" class="btn btn-secondary btn-lg my-3">Agregar Categoría</a>
        </div>
        @endif
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Creación</th>
                    @if (auth()->user()->hasRole('Admin'))
                    <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->NombreCategoria }}</td>
                        <td>{{ $categoria->Descripcion }}</td>
                        <td>{{ $categoria->FechaCreacion }}</td>
                        @if (auth()->user()->hasRole('Admin'))
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                            <form method="post" action="{{ route('categorias.destroy', $categoria->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro deseas borrar?');">Borrar</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="d-flex justify-content-center">
            {{ $categorias->links() }}
        </div>
    </div>
@stop
