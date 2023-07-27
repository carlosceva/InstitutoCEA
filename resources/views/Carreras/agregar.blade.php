<!-- Modal para agregar carrera -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de agregar carrera -->
            <form action="{{ route('carreras.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agregar Carrera</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="sigla" class="form-label">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="iduser" class="form-label">Docente</label>
                        <select class="form-control" id="iduser" name="iduser" required>
                            <option value="">Seleccionar Docente</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idhorario" class="form-label">Horario</label>
                        <select class="form-control" id="idhorario" name="idhorario" required>
                            <option value="">Seleccionar Horario</option>
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->id }}">{{ $horario->horainicio }} - {{ $horario->horafin }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>