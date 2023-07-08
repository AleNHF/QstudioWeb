</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 @if ($state)
  <button type="button" class="btn btn-primary" wire:click='store()'data-bs-dismiss="modal">Guardar</button>
  @else
  <button type="button" class="btn btn-primary" wire:click="update({{ $children_id}})" data-bs-dismiss="modal">Guardar</button>
  @endif
</div>
</div>
</div>
</div>
