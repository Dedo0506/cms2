<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro categoria</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>

    <body>
        <h1>Editar categoria</h1>


        <div class="formulario categorias">
            <form action="{{route('categorias.update', $categoriaReg->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div id="categoria nombre">
                    <label for="NombreCategoria">Nombre de la categoria</label>
                    <input type="text" name="NombreCategoria" id="NombreCategoria" value="{{isset($categoriaReg->NombreCategoria)?$categoriaReg->NombreCategoria:''}}" required placeholder="Nombre">
                </div>
                <div id="categoria descripcion">
                    <label for="Descripcion">Descripción</label>
                    <input type="text" name="Descripcion" id="Descripcion" value="{{isset($categoriaReg->Descripcion)?$categoriaReg->Descripcion:''}}" required placeholder="Descripcion">
                </div>
                <button class="btn btn-primary"  href="{{url('categorias')}}">Editar</button>
            </form>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-4">
            <a class="btn btn-secondary" href="{{url('categorias')}}">Regresar</a>
        </div>

    </body>

</html>
