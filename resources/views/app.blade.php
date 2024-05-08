<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .navbar-nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav h1 {
            margin: 0;
            padding: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="navbar-nav">
        <nav>
            <h1>Listado de Posts</h1>
        </nav>
    </div>

    @yield('content')

    <div class="navbar-nav">
        <nav>
            <ul>
                <h3>Equipo:</h3>
                <li>Borja Osnaya Eduardo</li>
                <li>Dávila Olivares Daniela Elizabeth</li>
                <li>Ibarra Salas Sebastian</li>
            </ul>
        </nav>
    </div>
</body>

</html>
