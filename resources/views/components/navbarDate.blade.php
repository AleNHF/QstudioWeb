<nav class="navbar navbar-expand-lg navbar-light bg-transparent" {{-- id="formaNav" wire:ignore.self --}}>
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a href="#" onclick="history.back()" class="btn btn-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
      </a>

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