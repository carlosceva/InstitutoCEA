<!-- Modal para editar modulo -->
<div class="modal fade" id="editModal{{ $modulo->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $modulo->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de editar modulo -->
            <form action="{{ route('modulos.update', ['modulo' => $modulo->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $modulo->id }}">Editar Modulo</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                        <label for="carrera_id" class="form-label">Carrera</label>
                        <select class="form-control" id="carrera_id" name="carrera_id" required>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ $carrera->id === $carrera->id ? 'selected' : '' }}>{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del modulo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $modulo->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sigla" class="form-label">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" value="{{ $modulo->sigla }}" required>
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