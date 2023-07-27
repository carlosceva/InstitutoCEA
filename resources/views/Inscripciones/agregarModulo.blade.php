<!-- Modal para agregar inscripcion -->
<div class="modal fade" id="createModuloModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de agregar inscripcion -->
            <form action="{{ route('inscripciones.storeModulo') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agregar Inscripcion</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idalumno" class="form-label">Alumno</label>
                        <select class="form-control" id="idalumno" name="idalumno" required>
                            <option value="">Seleccionar Alumno</option>
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idmodulo" class="form-label">Modulo</label>
                        <select class="form-control" id="idmodulo" name="idmodulo" required>
                            <option value="">Seleccionar Modulo</option>
                            @foreach ($modulos as $modulo)
                                <option value="{{ $modulo->id }}">{{ $modulo->nombre }}</option>
                            @endforeach
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