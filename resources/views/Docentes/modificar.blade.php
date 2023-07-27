<!-- editar-docente -->
<div class="modal fade" id="editModal{{ $docente->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $docente->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $docente->id }}">Editar Usuario</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editarUsuarioForm" action="{{ route('docentes.update', ['docente' => $docente->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $docente->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $docente->email }}" required>
                                </div>
                                <!-- ... Código anterior ... -->
                                <div class="mb-3">
                                <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ $docente->fecha_nac }}" required>
                                </div>
                                <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $docente->telefono }}" required>
                                </div>

                                <!-- ... Código posterior ... -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>