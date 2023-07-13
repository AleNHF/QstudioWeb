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
     <link href="{{ asset('css/navstile.css') }}" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <a href="{{ route('notification.render') }}">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Notifications</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('token.render') }}">
                        <i class="bx bx-key icon"></i>
                        <span class="text nav-text">Tokens</span>
                    </a>
                </li>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="/">
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
                        {{-- Notificaciones --}}
                        <li class="nav-item dropdown float-left">
                            <a class="me-3 mr-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <span class="menu-bullet">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                        class="bi bi-bell-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                    </svg>
                                </span>
                                @if (count(auth()->user()->unreadNotifications) > 0)
                                    <span class="badge rounded-pill badge-notification bg-danger count-notification">
                                        {{ count(auth()->user()->unreadNotifications) }}
                                    </span>
                                @else
                                    <span
                                        class="badge rounded-pill badge-notification bg-danger count-notification"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right scrollspy-example"
                                aria-labelledby="navbarDropdownMenuLink" id="navbarDropdownMenuLink">
                                <span class="dropdown-header border-bottom" style="background: rgb(226, 223, 223)">
                                    NOTIFICACIONES SIN LEER
                                </span>
                                <div class="lista-notification">
                                    @forelse (auth()->user()->unreadNotifications->take(3) as $notification)
                                        <a href="{{ route('notification.render') }}"
                                            class="dropdown-item border-bottom me-1 unotification"
                                            id="{{ $notification->created_at }}">
                                            <div class="row">
                                                <div class="col-12 title"><i class="fas fa-envelope mr-2"></i>
                                                    {{ $notification->data['name'] }}</div>
                                                <div class="col-12">
                                                    <small class="ml-2 float-end text-muted text-sm time"
                                                        style="font-size: 0.6rem">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                        <div class="row snotification">
                                            <div class="col-12">
                                                <span class="float-end text-muted text-sm">Sin notificaciones por
                                                    leer</span>
                                            </div>
                                        </div>
                                    @endforelse

                                    @if (count(auth()->user()->unreadNotifications) > 2)
                                        <a href="{{ route('notification.render') }}"
                                            class="dropdown-item border-bottom me-1" id="ver-mas">
                                            <div class="row">
                                                <div class="col-12 bg-gray">Ver más Notificaciones...</div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <span class="dropdown-header border-bottom" style="background: rgb(226, 223, 223)">
                                    NOTIFICACIONES LEÍDAS
                                </span>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse (auth()->user()->readNotifications->take(3) as $notification)
                                    @if ($i < 4)
                                        <a href="#" class="dropdown-item mb-0">
                                            <div class="row">
                                                <div class="col-12"><i class="fas fa-users mr-2"></i>
                                                    {{ $notification->data['name'] }}</div>
                                                <div class="col-12">
                                                    <small class="ml-3 float-end text-muted text-sm"
                                                        style="font-size: 0.6rem">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @empty
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="float-end text-muted text-sm">Sin notificaciones leídas</span>
                                        </div>
                                    </div>
                                @endforelse
                                <a href="{{ route('markAsRead') }}" class="dropdown-item dropdown-footer border-top">
                                    Marcar todas como leídas
                                </a>
                            </div>
                        </li>

                        {{-- Perfil --}}
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
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/navleft.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- PUSHER NOTIFICATIONS --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;
        var id = "{{ Auth::user()->id }}";
        var pusher = new Pusher('f05fab13d34920a868f5', {
            cluster: 'us2',
        });

        const state = pusher.connection.state;
        console.log(state);
        var id = "{{ Auth::user()->id }}";
        console.log('channel-' + id);
        var canal = 'channel' + id;
        var evento = 'event-' + id;
        console.log(canal);
        console.log(evento);

        var channel = pusher.subscribe(canal);
        channel.bind('event-' + id, function(data) {
            console.log(JSON.stringify(data['content']));

            if ($('.unotification').length < 3) {
                $('.unotification').each(function() {
                    $(this).find('.time').text(moment($(this).attr('id'),
                        "YYYY-MM-DD hh:mm:ss").fromNow())
                });
                $('.lista-notification').prepend(
                    '<a href="{{ route('notification.render') }}" class="dropdown-item border-bottom me-1 unotification" id="' +
                    convertir(Date
                        .parse(data['content']['created_at'])) + '">' +
                    '<div class="row">' +
                    '<div class="col-12 title"><i class="fas fa-envelope mr-2"></i>' +
                    data['content']['contentData'] + '</div>' +
                    '<div class="col-12">' +
                    '<small class="ml-2 float-end text-muted text-sm time" style="font-size: 0.6rem">' +
                    moment(convertir(Date.parse(data['content']['created_at'])),
                        "YYYY-MM-DD hh:mm:ss").fromNow() + '</small>' +
                    '</div>' +
                    '</div>' +
                    '</a>'
                );
                console.log('cantidad de notificaciones: ', $('.unotification').length);
            } else {
                let notificaciones = [];
                let i = 0;
                console.log('tiene 3 notificaciones');
                $('.unotification').each(function() {
                    if (i < 2) {
                        const obj = {
                            content: $(this).find('.title').text(),
                            time: $(this).attr("id")
                        }
                        //notificaciones.push($(this).find('.title').text());
                        notificaciones.push(obj);
                        //  console.log('i: ', i);
                    }
                    i++;
                })
                //console.log('cantidad de notificaciones: ' + notificaciones.length);
                //console.log(notificaciones);
                i = 0;

                $('.unotification').each(function() {
                    //   console.log('entra a mover notificaciones')
                    if (i == 0) {
                        $(this).attr("id", convertir(Date.parse(data['content']['created_at'])));
                        $(this).find('.title').text(data['content']['content']);
                        relativo = moment(convertir(Date.parse(data['content']['created_at'])),
                            "YYYY-MM-DD hh:mm:ss").fromNow();
                        $(this).find('.time').text(relativo);
                        // console.log($(this).find('.title'));
                    } else {
                        $(this).find('.title').text(notificaciones[i - 1]['content']);
                        $(this).find('.time').text(moment(notificaciones[i - 1]['time'],
                            "YYYY-MM-DD hh:mm:ss").fromNow());
                        $(this).attr("id", notificaciones[i - 1]['time']);

                        //           console.log($(this).find('.title'));
                    }
                    i++;
                });
                //if (data['contenido'] != null) {
            }
            //Cuando entra una notificación
            d = $('.count-notification').text();
            if (d != '') {
                c = parseInt(d);
                c = c + 1;
                if (c > 2) {
                    //   console.log($('.unread-notification').find('#ver-mas').length);
                    if ($('.lista-notification').find('#ver-mas').length == 0) {
                        $('.lista-notification').append(
                            '<a href="{{ route('notification.render') }}" class="dropdown-item border-bottom me-1" id="ver-mas">' +
                            '<div class = "row">' +
                            '<div class = "col-12 bg-gray">' + 'Ver más Notificaciones... </div>' +
                            ' </div > ' + '</a>'
                        );
                    }
                }

            } else {
                $(".snotification").remove();
                c = 1;
            }

            $('.count-notification').text(c);
            iziToast.show({
                title: '¡Nueva Notificación!',
                message: data['content']['contentData'],
                backgroundColor: 'red',
                theme: 'dark', // dark
                color: 'red', // blue, red, green, yellow
                timeout: 10000,
                overlayClose: false,
            });
        });

        function convertir(time) {
            var date = new Date(time);
            var ds = date.getSeconds();
            if (date.getSeconds() < 10) {
                ds = '0' + date.getSeconds();
            }
            var dm = date.getMinutes();
            if (date.getMinutes() < 10) {
                dm = '0' + date.getMinutes();
            }
            var dh = date.getHours();
            if (date.getHours() < 10) {
                dh = '0' + date.getHours();
            }

            var tiempo = date.getFullYear() + "-" + (date.getMonth() + 1) +
                "-" + date.getDate() +
                " " + dh +
                ":" + dm +
                ":" + ds;
            return tiempo;
        }
    </script>
</body>