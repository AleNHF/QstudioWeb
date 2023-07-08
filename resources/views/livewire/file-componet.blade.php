
@extends('layouts.app');

@section('content')
<div>

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card content" style="width: 100%;">
            <div class="container-fluid text-center ">
                <div class="row align-items-center">
                    <div class="col">
                        @include('components.navbarDate')
                    </div>
                </div>
                <br>
                <div class="row align-items-center" {{--  data-bs-target="#formaNav" --}}>
                    <div class="col">
                        <div class=" text-center mb-10">
                            <h3 class="text-warning ">Lista de Contenido de {{$children->name}} </h3>
                        </div>
    
                        <div class="card-body py-3 ">
                            <table class="table table-hover ">
                                <thead style="font-family: Poppins;">
                                    <tr class="fw-bolder text-muted bg-light">
                                        <th class="ps-4 min-w-8px rounded-start">#</th>
                                        <th class="min-w-125px">Estado</th>
                                        <th class="min-w-125px">Fecha</th>
                                        <th class="min-w-125px">Duracion</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($file as $file)
                                    @php
                                    $ids=$ids+1;
                                    @endphp
                                    <tr>
                                        <th class="ps-4">{{$ids}}</th>
                                        <td>{{ $file->createDate }}</td>
            
                                        <td>{{ $file->path  }}</td>
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