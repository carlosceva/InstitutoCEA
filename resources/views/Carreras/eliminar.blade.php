<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="deleteModal{{ $carrera->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $carrera->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $carrera->id }}">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta carrera? <b>{{$carrera->nombre}}</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Modal -->