<!-- Modal para editar oferta -->
<div class="modal fade" id="editModal{{ $oferta->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $oferta->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de editar oferta -->
            <form action="{{ route('ofertas.update', ['oferta' => $oferta->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $oferta->id }}">Editar Oferta</h5>
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
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $oferta->fecha }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo" {{ $oferta->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $oferta->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
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