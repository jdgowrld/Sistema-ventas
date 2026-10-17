<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form action="{{ route('categoria.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="Categoria" class="form-control" placeholder="Ingresa una categoría">
                @error('Categoria')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>