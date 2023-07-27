<!-- Modal para editar carrera -->
<div class="modal fade" id="editModal{{ $carrera->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $carrera->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de editar carrera -->
            <form action="{{ route('carreras.update', ['carrera' => $carrera->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $carrera->id }}">Editar Carrera</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $carrera->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sigla" class="form-label">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" value="{{ $carrera->sigla }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo" {{ $carrera->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $carrera->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Usuario</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $carrera->user_id === $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="horario_id" class="form-label">Horario</label>
                        <select class="form-control" id="horario_id" name="horario_id" required>
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->id }}" {{ $carrera->horario_id === $horario->id ? 'selected' : '' }}>{{ $horario->horainicio }} - {{ $horario->horafin }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>