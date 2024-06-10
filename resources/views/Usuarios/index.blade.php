@extends('app')

@section('title', 'Usuarios')

@section('accion', 'Listado de')

@section('palabra', 'Usuarios')

@section('content')

<div>
    <div class="container">

        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
        @endif
        @if (auth()->user()->hasRole('Admin'))
        <div class="col-xs-12 col-md-6 col-lg-4">
            <a href="{{ route('usuarios.create') }}" class="btn btn-secondary btn-lg my-3"> Agregar Usuario </a>
        </div>
        @endif
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    @if (auth()->user()->hasRole('Admin'))
                    <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if (auth()->user()->hasRole('Admin'))
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{{ route('usuarios.edit', $user->id) }}"> Editar </a>
                            <form method="post" action="{{ route('usuarios.destroy', $user->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro deseas borrar?');"> Borrar </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination.bootstrap-5') }}
        </div>
    </div>
</div>

@stop
