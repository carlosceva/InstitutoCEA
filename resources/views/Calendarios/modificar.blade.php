<!-- Modal para editar calendario -->
<div class="modal fade" id="editModal{{ $calendario->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $calendario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de editar calendario -->
            <form action="{{ route('calendarios.update', ['calendario' => $calendario->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $calendario->id }}">Editar Calendario {{ $calendario->id }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="iddocente" class="form-label">Docente</label>
                        <select class="form-control" id="iddocente" name="iddocente" required>
                            <option value="" >Seleccionar Docente</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required>{{ $calendario->descripcion }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $calendario->fecha }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo" {{ $calendario->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $calendario->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
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