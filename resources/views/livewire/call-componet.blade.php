

<div>

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card content" style="width: 100%;">
            <div class="container-fluid text-center ">
                <div class="row align-items-center">
                    <div class="col">
                        @include('components.navbarDate')
                    </div>
                </div>
                <div class="row align-items-center" {{--  data-bs-target="#formaNav" --}}>
                    <div class="col">
                        <div class=" text-center mb-10">
                            <h3 class="text-warning ">Lista de Llamadas de {{$children->name}} </h3>
                        </div>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control text-left mr-2" type="date" wire:model="fechaInicio"
                                                    wire:change="store()">
                                                <label class="ml-3 form-control-placeholder" id="start-p" for="start">fecha
                                                    inicio</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control text-left mr-2" type="date" wire:model="fechaFin"
                                                    wire:change="store()">
                                                <label class="ml-3 form-control-placeholder" id="end-p" for="end">fecha fin</label>
                                            </div>
                                        </div>
            
                                    </div>
        
                                </div>
                                <br>
            

                        <div class="card-body py-3 " style="height: 400px; overflow: auto;">
                            <table class="table table-hover ">
                                <thead style="font-family: Poppins;">
                                    <tr class="fw-bolder text-muted bg-light">
                                        <th class="ps-4 min-w-8px rounded-start">#</th>
                                        <th class="min-w-125px">Tipo de Llamada</th>
                                        <th class="min-w-125px">Fecha</th>
                                        <th class="min-w-125px">Duracion</th>
                                        <th class="min-w-125px">Nombre</th>
                                        <th class="min-w-125px">Numero</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($call as $call)
                                    @php
                                    $ids=$ids+1;
                                    @endphp
                                    <tr>
                                        <th class="ps-4">{{$ids}}</th>
                                
                                            <td>
                                                @if ($call->received)
                                                    <label class="text-success">recibido</i> 
                                                @else
                                                    <<label class=" text-danger">rechasado</i> 
                                                @endif
                                            </td>
                                       
                                        <td>{{ $call->date  }}</td>
                                        <td>{{ $call->duration }}</td>
                                         <td>{{ $call->duration }}</td>
                                          <td>{{ $call->duration }}</td>

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
