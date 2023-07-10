<div>

    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card content" style="width: 100%;">
            <div class="container-fluid text-center ">
                <br>
                <div class="row align-items-center" {{-- data-bs-target="#formaNav" --}}>
                    <div class="col">

                        <h3 class="text-warning ">Lista de Token </h3>
                        <form wire:submit.prevent="store">

                            <div class="row mb-3 d-flex">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <select id="children_id" class="form-control" wire:model='children_id'>
                                            <option value="">Seleccionar</option>
                                            @foreach ($allChild as $allChild)
                                            <option value="{{ $allChild->id }}">{{ $allChild->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-warning" wire:click='store'>Crear
                                        Token</button>

                                </div>
                            </div>
                        </form>
                        @if($msj)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>UYY!!! </strong> Debes seleccionar un Hijo
                            <button type="button" class="btn-close" wire:click="hideErrorMessage"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-body py-3" style="height: 400px; overflow: auto;">
                            <table class="table table-hover ">
                                <thead style="font-family: Poppins;">
                                    <tr class="fw-bolder text-muted bg-light">
                                        <th class="ps-4 min-w-8px rounded-start">#</th>
                                        <th class="min-w-125px">Token</th>
                                        <th class="min-w-125px">Estado</th>
                                        <th class="min-w-125px">Hijo</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($children as $children)
                                    @php
                                    $ids=$ids+1;
                                    @endphp
                                    <tr>
                                        <th class="ps-4">{{$ids}}</th>
                                        <td>{{ $children->code }}</td>
                                        <td>
                                            @if ($children->status == 0)
                                            <span class="dot green"></span>
                                            @else
                                            <span class="dot red"></span>
                                            @endif
                                        </td>
                                        <td>{{ $children->name }}</td>

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