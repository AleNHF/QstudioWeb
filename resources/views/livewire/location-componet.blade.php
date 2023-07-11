
    <div>
        <div class="container-fluid d-flex justify-content-center aling-items-center">
            <div class="card content" style="width: 100%;">
                <div class="container-fluid text-center">
                    <div class="row align-items-center">
                        <div class="col">
                            @include('components.navbarDate')
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center" {{--  data-bs-target="#formaNav" --}}>
                        <div class="col-6">
                            <div wire:ignore id="map" style="width:500px;height:500px;"></div>
                        </div>
                        <div class="col-6">
                            
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input class="form-control text-left mr-2" type="date" wire:model="fechaInicio"
                                            wire:change="getCoordinates()">
                                        <label class="ml-3 form-control-placeholder" id="start-p" for="start">fecha
                                            inicio</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control text-left mr-2" type="date" wire:model="fechaFin"
                                            wire:change="getCoordinates()">
                                        <label class="ml-3 form-control-placeholder" id="end-p" for="end">fecha fin</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control text-left mr-2" type="time" wire:model="horaInicio"
                                            wire:change="getCoordinates()">
                                        <label class="ml-3 form-control-placeholder" id="start-p" for="start">hora
                                            inicio</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control text-left mr-2" type="time" wire:model="horaFin"
                                            wire:change="getCoordinates()">
                                        <label class="ml-3 form-control-placeholder" id="end-p" for="end">hora fin</label>
                                    </div>
                                </div>
    
                            </div>
                            <br>
                            <div class=" text-center mb-10">
                                <h3>Historial de Ubicaciones</h3>
                            </div>
                            <div class="card-body py-3 w-100" style="height: 400px; overflow: auto;">
                                <table class="table table-hover ">
                                    <thead style="font-family: Poppins;">
                                        <tr class="fw-bolder text-muted bg-light">
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Longitud</th>
                                            <th>Latitud</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($locations as $location)
                                            <tr data-latitud="{{ $location->lat }}" data-longitud="{{ $location->lng }}">
                                                <td>{{ $location->date }}</td>
                                                <td>{{ $location->time }}</td>
                                                <td>{{ $location->lng }}</td>
                                                <td>{{ $location->lat }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /* Add Inline Google Auth Boostrapper here */
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })({
            key: "AIzaSyCdLUChbfEF9gll6vb8IYDB2Mh8vWbzo8Q",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });

        /* How to initialize the map */
        let map;
        async function initMap() {
            const {
                Map
            } = await google.maps.importLibrary("maps");
            map = new Map(document.getElementById("map"), {
                zoom: 12,
                center: {
                    lat: -17.789218,
                    lng: -63.186886
                },
                mapId: "DEMO_MAP_ID",
            });

            // Agregar markers
            @foreach ($locations as $location)
                var marker{{ $location->id }} = new google.maps.Marker({
                    position: {
                        lat: {{ $location->lat }},
                        lng: {{ $location->lng }}
                    },
                    map: map,
                });
            @endforeach

            // Agregar evento de clic a las filas de la tabla
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function() {
                    const latitud = parseFloat(this.getAttribute('data-latitud'));
                    const longitud = parseFloat(this.getAttribute('data-longitud'));

                    if (!isNaN(latitud) && !isNaN(longitud)) {
                        const newPosition = new google.maps.LatLng(latitud, longitud);
                        map.panTo(newPosition);
                        map.setZoom(12);
                    }
                });
            });
        }

        /* Initialize map when Livewire has loaded */
        document.addEventListener('livewire:load', function() {
            initMap();
        });
    </script>

