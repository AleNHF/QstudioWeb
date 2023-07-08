<nav class="navbar navbar-expand-lg navbar-light bg-transparent" {{-- id="formaNav" wire:ignore.self --}}>
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('content.render', ['child' => $child]) }}">Contenido</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('call.render', ['child' => $child]) }}">Llamadas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('location.render', ['child' => $child]) }}">Ubicacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('file.render', ['child' => $child]) }}">Galeria</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>