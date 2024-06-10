@extends('app')

@section('title', 'Roles')

@section('accion', 'Listado de')

@section('palabra', 'Roles')

@section('content')

<div>
    <div class="container">

        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
        @endif
        <div class="col-xs-12 col-md-6 col-lg-4">
            <a href="{{ route('roles.create') }}" class="btn btn-secondary btn-lg my-3"> Crear Rol </a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{{ route('roles.edit', $rol->id) }}"> Editar </a>
                            <form method="post" action="{{ route('roles.destroy', $rol->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro deseas borrar?');"> Borrar </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
