<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-dyB6TEvytDT4KpTc3XQNKgAB80GLzi/w5RljlXfJNq73g/2ADd5P+M5PqWew5h1t" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .footer {
            padding: 10px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 -1px 10px rgba(0, 0, 0, 0.1);
        }
        
        .footer li {
            font-size: 14px;
        }
        
        .logo-img {
            width: 100px; /* Adjust the size as needed */
            height: 50px;
        }
    </style>
</head>

<body class="bg-light d-flex flex-column">
    <div class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <img class="logo-img " src="img/logo.png" alt="Logo">
            </a>
            <h1 class="m-0">
                @yield('accion') @yield('palabra')
            </h1>
            <div class="d-flex">
                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" class="btn btn-danger me-2">{{ __('Log Out') }}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Log in</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <div class="content container my-4">
        @yield('content')
    </div>

    <footer class="footer mt-auto">
        <div class="container">
            <ul class="list-unstyled">
                <li>Equipo:</li>
                <li>Borja Osnaya Eduardo</li>
                <li>Dávila Olivares Daniela Elizabeth</li>
                <li>Ibarra Salas Sebastian</li>
            </ul>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFZgz2v/MJC4MJOx44SNCB5fO7L4yZl68mD49/knzPB2ZgkWszumZ4l+fX" crossorigin="anonymous"></script>
</body>

</html>
