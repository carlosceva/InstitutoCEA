@extends('layouts.principal')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-file mr-1"></i>
                <b>GESTIONAR DOCENTE</b> 
                </h1>
                <div class="float-right d-sm-block"> 
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" data-toggle="modal" data-target="#addUserModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
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
        <table class="table table-hover" id="docentes">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Fecha_nac.</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($docentes as $docente)
                <tr>
                    <td>{{ $docente->id }}</td>
                    <td>{{ $docente->name }}</td>
                    <td>{{ $docente->email }}</td>
                    <td>{{ $docente->telefono }}</td>
                    <td>{{ $docente->fecha_nac }}</td>
                    <td>{{ $docente->estado }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editModal{{ $docente->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        &nbsp;
                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $docente->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>

                @include('Docentes.modificar', ['docente' => $docente])
                @include('Docentes.eliminar', ['docente' => $docente])

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Docentes.agregar', ['docente' => $docente])

@endsection