@extends('layouts.principal')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-file mr-1"></i>
                <b>GESTIONAR ALUMNO</b> 
                </h1>
                <div class="float-right d-sm-block"> 
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
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
        <table class="table table-hover" id="alumnos">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Fecha_nac</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->ci }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->fechanac }}</td>
                    <td>{{ $alumno->sexo }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editModal{{ $alumno->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        &nbsp;
                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $alumno->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>

                @include('Alumnos.modificar', ['alumno' => $alumno])
                @include('Alumnos.eliminar', ['alumno' => $alumno])  
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Alumnos.agregar')

@endsection