<!-- Modal para agregar horario -->
<div class="modal fade" id="agregarHorarioModal" tabindex="-1" aria-labelledby="agregarHorarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de agregar horario -->
            <form action="{{ route('horarios.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="agregarHorarioModalLabel">Agregar Horario</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="horainicio" class="form-label">Hora de Inicio</label>
                        <input type="time" class="form-control" id="horainicio" name="horainicio" required>
                    </div>

                    <div class="mb-3">
                        <label for="horafin" class="form-label">Hora de Fin</label>
                        <input type="time" class="form-control" id="horafin" name="horafin" required>
                    </div>

                    <div class="mb-3">
                        <label for="turno" class="form-label">Turno</label>
                        <input type="text" class="form-control" id="turno" name="turno" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>