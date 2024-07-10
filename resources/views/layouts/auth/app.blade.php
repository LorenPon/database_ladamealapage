
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=".\assets\style.css">
    @yield('styles') 
    <title>@yield('title', 'La dame à la page')</title>
</head>

<body>
    <header>
        <!-------------NAVBAR --------->
        <nav class="navbar navbar-expand-lg navbar-light flex-menu">
            <div class="d-inline-flex p-3" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item active">
                    <a class="nav-link {{Request::routeIs('home') ? 'active' : '' }}" href="{{route('home')}}"> Home </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('shop') ? 'active' : '' }}"" href="{{route('shop')}}"> Shop</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link {{Request::routeIs('contact') ? 'active' : '' }}"" href="{{route('contact')}}"> Contatti </a>
                    </li>
                </ul>
            </div>
            <div>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                    <img height="100px"src=".\assets\logo\minilogo.png">
                    <!------RICORDARSI DI CAMBIARE PERCORSO LINK IMG!!!-->
                </a>
            </div>
            <div>
                <a class="navbar-brand" href="#">La dame à la page</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
