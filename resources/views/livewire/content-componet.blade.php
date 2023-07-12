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
                <div class="row align-items-center" {{-- data-bs-target="#formaNav" --}}>
                    <div class="col">
                        <div class=" text-center mb-10">
                            <h3 class="text-warning ">Lista de Contenido de {{$children->name}} </h3>
                        </div>
                        <div>
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
                                        <label class="ml-3 form-control-placeholder" id="end-p" for="end">fecha
                                            fin</label>
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
                                        <th class="min-w-125px">Fecha</th>
                                        <th class="min-w-125px">Path</th>
                                        <th class="min-w-125px">Tipo</th>
                                        <th class="min-w-125px">Image</th>
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contentChild as $contentChild)
                                    @php
                                    $ids=$ids+1;
                                    @endphp
                                    <tr>
                                        <th class="ps-4">{{$ids}}</th>
                                        <td>{{ $contentChild->date }}</td>

                                        <td>{{ $contentChild->path }}</td>
                                        
                                        <td>{{$nameData[$contentChild->contentData]}}/{{$parentNameData[$contentChild->type]}}
                                        </td>
                                         <td>
                                          <div class="image-container">
                                             <a href="{{ Storage::disk('s3')->url($contentChild->url) }}" data-lightbox="imagen" data-title="{{ $contentChild->type }}">
                                             <img class="blocked-image" src="{{ Storage::disk('s3')->url($contentChild->url) }}" alt="{{ $contentChild->type }}" width="60" height="70">
                                                <span class="image-overlay">Ver</span>
                                                </a>
                                             </div>

                                         </td>
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
{{-- 
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = document.querySelectorAll('.blocked-image');
        images.forEach(function (image) {
            image.addEventListener('click', function () {
                // Lógica para abrir el modal aquí
                // Por ejemplo, utilizando el ID de la imagen
                const imageId = image.dataset.imageId;
                const modal = document.getElementById('modalPhoto');
                // Lógica para mostrar la imagen en el modal
            });
        });
    });
</script>
@endpush --}}