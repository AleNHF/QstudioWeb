


<div>
   <br>
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex">
        @foreach ($child as $child)
        <div class="col d-flex">

            <div class="card">
                <div class="content">
                    <a href="{{ route('content.render', ['child' => $child->id]) }}" class="card-link" >
                        <div class="image">
                            <img src="{{asset($child->profilePhoto) }}"/>
                        </div>
                    </a>

                    <div class="user-content text-center">
                        <h3>{{ $child->name }}</h3>
                    </div>
                    <button type="button" class="btn btn-warning" wire:click="edit({{ $child->id }})" data-bs-toggle="modal"
                        data-bs-target="#formaModal" >Editar</button>
                    <button type="button" class="btn btn-light" wire:click="delete({{ $child->id }})">Eliminar</button>
                </div>
            </div>

        </div>

        @endforeach
        
        <div class="col text-center" style="margin-top: 78px; " >
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formaModal" wire:click="clear()">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
              </svg>
        </button>
        </div>
    </div>

@include('components.modalheader')
@if ($showAlert)
    <div class="alert alert-danger" role="alert">
        Por favor, completa todos los campos.
    </div>
@endif

<div class="mb-3">
    <label for="name" class="form-label"> Nombre: </label>
    <input type="text" class="form-control" id="name" wire:model='name' placeholder="nombres.."  required="">

</div>

<div class="mb-3">
    <label for="lastname" class="form-label">Apellido: </label>
    <input type="text" class="form-control" id="lastname" wire:model='lastname' placeholder="Apellido..">
</div>
<div class="mb-3">
    <label for="alias" class="form-label">Alias: </label>
    <input type="text" class="form-control" id="alias" wire:model='alias' placeholder="Alias..">
</div>
<div class="mb-3">
    <label for="birthDay" class="form-label">Fecha de nacimiento:</label>
    <input type="date" class="form-control" wire:model='birthDay' id="birthDay">
</div>
<div class="mb-3">
    <label for="gender" class="form-label">Género:</label>
    <select id="gender" class="form-control" wire:model='gender'>
        <option value="">Seleccionar</option>
        <option value='M'>Masculino</option>
        <option value='F'>Femenino</option>
    </select>
</div>
@include('components.modalfooter')
</div>
