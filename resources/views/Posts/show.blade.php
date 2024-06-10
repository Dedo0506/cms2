@extends('app')

@section('title', 'Post')

@section('accion', 'Post')

@section('palabra', $post->id)

@section('content')

<div class="container">
    <h1>Detalle</h1>
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><strong>Categoría:</strong> {{ $post->categorias->NombreCategoria }}</p>
            <p class="card-text"><strong>Etiqueta:</strong> {{ $post->etiquetas->nombreEtiqueta  }}</p>
            <p class="card-text"><strong>Fecha de Creación:</strong> {{ $post->created_at->format('d/m/Y H:i:s') }}</p>
            <p class="card-text"><strong>Fecha de Actualización:</strong> {{ $post->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt- 5">
            @auth
            <div>
                <a class="btn btn-secondary btn-sm" href="{{ url('/posts/' . $post->id . '/edit') }}">Editar </a>
            </div>
            
            <div>
                <a class="btn btn-secondary btn-sm" href="{{ route('posts.index') }}">Regresar</a>
            </div>
            @endauth
            <div>
                <a class="btn btn-secondary btn-sm" href="{{ url('/') }}">Regresar</a>
            </div>
        </div> 
        
        
    </div>
</div>
@endsection