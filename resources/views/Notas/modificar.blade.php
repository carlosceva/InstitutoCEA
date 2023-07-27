<!-- Modal para editar nota -->
<div class="modal fade" id="editModal{{ $nota->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $nota->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de editar nota -->
            <form action="{{ route('notas.update', ['nota' => $nota->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $nota->id }}">Editar Nota</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idalumno" class="form-label">Alumno</label>
                        <select class="form-control" id="idalumno" name="idalumno" required>
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}" {{ $alumno->id === $nota->idalumno ? 'selected' : '' }}>{{ $alumno->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idmodulo" class="form-label">Modulo</label>
                        <select class="form-control" id="idmodulo" name="idmodulo" required>
                            @foreach ($modulos as $modulo)
                                <option value="{{ $modulo->id }}" {{ $modulo->id === $nota->idmodulo ? 'selected' : '' }}>{{ $modulo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nota" class="form-label">Nota</label>
                        <input type="number" class="form-control" id="nota" name="nota" value="{{$nota->nota}}" required>
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