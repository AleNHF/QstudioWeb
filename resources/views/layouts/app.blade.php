<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qstudio</title>
    @livewireStyles
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card-content.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('img/qs.jpeg') }}" />
                </span>

                <div class="text logo-text">
                    <span class="image name">
                        <img src="{{ asset('img/qstudioName.jpeg') }}" />
                    </span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="nav-link">
                    <a href="{{ route('children.render') }}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Mi Familia</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Tokens</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Notifications</span>
                    </a>
                </li>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="margin-right: 15px;">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item" style="display: flex; align-items: center;">
                            <img src="{{ asset('img/padre.png') }}" alt="user" class="rounded-circle"
                                style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; margin-right: 10px; background-color: #ffffff;" />
                            <a class="nav-link" href="#">
                                <small class="text-muted">
                                    {{ auth()->user()->name }}
                                </small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            @yield('content')

        </div>
    </section>


    <!-- Scripts de JavaScript -->
    @livewireScripts
    @yield('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/navleft.js') }}"></script>
</body>
