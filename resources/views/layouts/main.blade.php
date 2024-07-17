<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title> {{-- Primeiro yield de 'title' --}}

        {{-- Fontes do projeto --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        {{-- Css bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Css do projeto --}}
        <link rel="stylesheet" href="/css/styles.css">

        {{-- Jscript do projeto --}}
        <script defer src="/js/script.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <header> 
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a href="/" class="navbar-brand layouticon d-flex align-items-center">
                    <ion-icon name="car-outline" style="width: 40px" class="layouticon"></ion-icon>
                    </a>
                    <a href="/" class="navbar-brand layouticon d-flex align-items-center">

                        <span class="ms-2">Home</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            {{--Links para navegação --}}
                            <li class="nav-item">
                                <a href="/login" class="nav-link headerFont">Entrar</a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a href="/listVehicles" class="nav-link headerFont">Veículos</a>
                            </li>
                            <li class="nav-item">
                                <a href="/clientListing" class="nav-link headerFont">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a href="/vehicles" class="nav-link headerFont">Cadastrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/logs" class="nav-link headerFont">Registros</a>
                            </li>
                            <li>
                                <a class="nav-link headerFont" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container mt-5 flex-grow-1">

            {{--Flash message de sucesso para o usuário --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content') {{-- yield de 'content' --}}
        </main>
        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p>&copy; 2024 Sistema de Estacionamento</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>
