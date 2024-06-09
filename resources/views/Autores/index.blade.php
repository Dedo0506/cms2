@extends('app')

@section('title', 'Autores Index')

@section('accion', 'Autores')

@section('content')

    <div>
        <div class="container">

            @if (Session::has('Mensaje'))
                <div classs="alert alert-success" role="alert">{{ Session::get('Mensaje') }}</div>
            @endif

            <div class="col-xs-12 col-md-6 col-lg-4">
                <a href="{{ url('autor/create') }}"  class="btn btn-secondary btn-lg my-3"> Agregar Autor </a>
            </div>

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">

                    @foreach ($autores as $autor)
                        <tr>
                            <td>{{ $autor->id }}</td>                    
                            <td><img class= "card-img-top w-25" src="{{asset($autor->Foto)}}" alt="imagen"></td>
                            <td>{{ $autor ->NombreAutor }}</td>
                            <td>{{ $autor ->Email }}</td>
                            <td>
                            <a class="btn btn-secondary btn-sm" href="{{url('/autor/'.$autor->id.'/edit')}}"> Editar </a>
                                <form method="post" action="{{url('/autor/'.$autor->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('Delete')}}
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
