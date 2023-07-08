
<div>
   <br>
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex">
        @foreach ($child as $child)
        <div class="col d-flex">
            {{-- <a href="{{ route('welcome') }}" class="card-link"> --}}
            <div class="card">
                <div class="content">
                    <div class="image">
                        <img src="https://i.imgur.com/3ph2DLq.jpg" />
                    </div>
                    <div class="user-content text-center">
                        <h3>{{ $child->name }}</h3>
                    </div>
                    <button type="button" class="btn btn-warning" wire:click="edit({{ $child->id }})" data-bs-toggle="modal"
                        data-bs-target="#formaModal" >Editar</button>
                    <button type="button" class="btn btn-light" wire:click="delete({{ $child->id }})">Eliminar</button>
                </div>
            </div>
            </a>
        </div>
        @endforeach 
        <div class="col text-center" style="margin-top: 78px; ">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formaModal" wire:click="clear()">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                <path
                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
            </svg>
        </button>
        </div>
    </div>
 


@include('components.modalheader')
<div class="mb-3">
    <label for="name" class="form-label"> Nombre: </label>
    <input type="text" class="form-control" id="name" wire:model='name' placeholder="nombres..">
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
<div class="mb-3">
    <label for="tutor_id" class="form-label">tutor: </label>
    <input type="text" class="form-control" id="tutor_id" wire:model='tutor_id' placeholder="1..">
</div>
<div class="mb-3">
    <label for="profilePhoto" class="form-label">tutor: </label>
    <input type="text" class="form-control" id="profilePhoto" wire:model='profilePhoto' placeholder="fot">
</div>

@include('components.modalfooter')
</div>
