<!-- Modal para editar alumno -->
<div class="modal fade" id="editModal{{ $alumno->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $alumno->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del formulario de editar alumno -->
            <form action="{{ route('alumnos.update', ['alumno' => $alumno->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $alumno->id }}">Editar Alumno {{ $alumno->id }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ci" class="form-label">CI</label>
                        <input type="number" class="form-control" id="ci" name="ci" value="{{ $alumno->ci }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $alumno->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechanac" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fechanac" name="fechanac" value="{{ $alumno->fechanac }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-control" id="sexo" name="sexo" required>
                            <option value="Masculino" {{ $alumno->sexo === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ $alumno->sexo === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $alumno->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" value="{{ $alumno->telefono }}" required>
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