@extends('layouts.principal')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-clock mr-1"></i>
                <b>GESTIONAR INSCRIPCION</b> 
                </h1>
                <div class="float-right d-sm-block"> 
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Inscribir carrera</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" data-toggle="modal" data-target="#createModuloModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Inscribir modulo</a>
                    </div> 
                </div>
</div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (auth()->user()->rol == 'admin')
        
    @endif
<div class="card table-responsive">
    <div class="card-body">
        <table class="table table-hover" id="inscripciones">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Alumno</th>
                <th>Carrera</th>
                <th>Fecha</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($inscripciones as $inscripcion)
            <tr>
                <td>{{ $inscripcion->id }}</td>
                <td>{{ $inscripcion->usuario }}</td>
                <td>{{ $inscripcion->alumno }}</td>
                <td>{{ $inscripcion->carrera }}</td>
                <td>{{ $inscripcion->fecha }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#editModal{{ $inscripcion->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    &nbsp;
                    <a href="#" data-toggle="modal" data-target="#deleteModal{{ $inscripcion->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            
            @include('Inscripciones.modificar', ['inscripcion' => $inscripcion])
            @include('Inscripciones.eliminar', ['inscripcion' => $inscripcion])  

            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Inscripciones.agregar')
@include('Inscripciones.agregarModulo')
             
@endsection