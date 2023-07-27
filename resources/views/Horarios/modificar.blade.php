<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $horario->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $horario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Horario</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="horainicio" class="form-label">Hora de Inicio</label>
                        <input type="time" class="form-control" id="horainicio" name="horainicio" value="{{ $horario->horainicio }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="horafin" class="form-label">Hora de Fin</label>
                        <input type="time" class="form-control" id="horafin" name="horafin" value="{{ $horario->horafin }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="turno" class="form-label">Turno</label>
                        <input type="text" class="form-control" id="turno" name="turno" value="{{ $horario->turno }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo" @if($horario->estado === 'activo') selected @endif>Activo</option>
                            <option value="inactivo" @if($horario->estado === 'inactivo') selected @endif>Inactivo</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->