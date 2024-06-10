@extends('app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="my-4">Dashboard</h1>
    <ul class="list-unstyled row">
        <li class="col-md-4 mb-4">
            <div class="card">
                <img src="img/post.png" class="card-img-top" alt="Posts">
                <div class="card-body">
                    <h5 class="card-title">Posts</h5>
                    <p class="card-text">Gestion de posts.</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Ir a Posts</a>
                </div>
            </div>
        </li>
        <li class="col-md-4 mb-4">
            <div class="card">
                <img src="img/categoria.png" class="card-img-top" alt="Categorías">
                <div class="card-body">
                    <h5 class="card-title">Categorías</h5>
                    <p class="card-text">Gestion de categorías</p>
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Ir a Categorías</a>
                </div>
            </div>
        </li>
        <li class="col-md-4 mb-4">
            <div class="card">
                <img src="img/etiquetas.png" class="card-img-top" alt="Etiquetas">
                <div class="card-body">
                    <h5 class="card-title">Etiquetas</h5>
                    <p class="card-text">Gestion de etiquetas</p>
                    <a href="{{ route('etiquetas.index') }}" class="btn btn-primary">Ir a Etiquetas</a>
                </div>
            </div>
        </li>
        <li class="col-md-4 mb-4">
            <div class="card">
                <img src="img/autores.png" class="card-img-top" alt="Autores">
                <div class="card-body">
                    <h5 class="card-title">Autores</h5>
                    <p class="card-text">Gestion de autores</p>
                    <a href="{{ route('autores.index') }}" class="btn btn-primary">Ir a Autores</a>
                </div>
            </div>
        </li>
        <li class="col-md-4 mb-4">
            <div class="card">
                <img src="img/usuarios.png" class="card-img-top" alt="Usuarios">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Gestion de usuarios del sitio.</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Ir a Usuarios</a>
                </div>
            </div>
        </li>
        <li class="col-md-4 mb-4">
            <div class="card">
                <img src="img/roles.png" class="card-img-top" alt="Roles">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text">Gestion de roles de usuario.</p>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">Ir a Roles</a>
                </div>
            </div>
        </li>
    </ul>
</div>
@endsection
