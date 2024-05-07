<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro categoria</title>
        <!--Poner después los datos de bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>

    <body>
        <h1>Formulario de etiquetas</h1>


        <div class="formulario categorias">
            <form action="{{route('etiquetas.update', $etiquetasReg->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div id="nombre etiqueta">
                    <label for="nombreEtiqueta">Nombre de la etiqueta</label>
                    <input type="text" name="nombreEtiqueta" id="nombreEtiqueta" value="{{isset($etiquetasReg->nombreEtiqueta)?$etiquetasReg->nombreEtiqueta:''}}" required placeholder="Nombre">
                </div>
                <div id="nombre descripcion">
                    <label for="descripcion">Descripción de la etiqueta</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{isset($etiquetasReg->descripcion)?$etiquetasReg->descripcion:''}}" required placeholder="Descripcion">
                </div>
                <div>
                    <button class="btn btn-primary" href="{{url('etiquetas')}}">Editar</button>
                </div>

            </form>


        </div>

        <!--Botón para regresar a la pantalla anterior-->
        <div class="col-xs-12 col-md-6 col-lg-4">
            <a class="btn btn-secondary" href="{{url('etiquetas')}}">Regresar</a>
        </div>

    </body>

</html>
