@extends('app')

@section('title', 'Autores Index')

@section('accion', 'Autores')

@section('content')

    <div>
        <div class="container">

            @if (Session::has('Mensaje'))
                <div classs="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
            @endif
                @if (auth()->user()->hasRole('Admin'))
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <a href="{{ url('autor/create') }}"  class="btn btn-secondary btn-lg my-3"> Agregar Autor </a>
                    </div>
                @endif                
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        @if (auth()->user()->hasRole('Admin'))
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="list">

                    @foreach ($autores as $autor)
                        <tr>
                            <td>{{ $autor->id }}</td>                    
                            <td><img class= "card-img-top w-25" src="{{asset($autor->Foto)}}" alt="imagen"></td>
                            <td>{{ $autor ->NombreAutor }}</td>
                            <td>{{ $autor ->Email }}</td>
                            @if (auth()->user()->hasRole('Admin'))
                                <td>
                                <a class="btn btn-secondary btn-sm" href="{{url('/autor/'.$autor->id.'/edit')}}"> Editar </a>
                                    <form method="post" action="{{url('/autor/'.$autor->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('Delete')}}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro deseas borrar?');"> Borrar </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $autores->links('pagination.bootstrap-5') }}
            </div>
            
        </div>
    </div>
@stop
