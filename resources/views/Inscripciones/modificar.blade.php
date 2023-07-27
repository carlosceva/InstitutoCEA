<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $inscripcion->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $inscripcion->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Inscripcion</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inscripciones.update', $inscripcion->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="idalumno" class="form-label">Alumno</label>
                        <select class="form-control" id="idalumno" name="idalumno" required>
                            <option value="">Seleccionar Alumno</option>
                            @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}" {{ $alumno->id === $inscripcion->idalumno ? 'selected' : '' }}>{{ $alumno->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idcarrera" class="form-label">Carrera</label>
                        <select class="form-control" id="idcarrera" name="idcarrera" required>
                            <option value="">Seleccionar Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ $carrera->id === $inscripcion->idcarrera ? 'selected' : '' }}>{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->