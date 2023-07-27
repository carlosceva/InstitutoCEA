@extends('layouts.principal')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-file mr-1"></i>
                <b>GESTIONAR CARRERA   </b> 
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
        <table class="table table-hover" id="carreras">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Sigla</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($carreras as $carrera)
                <tr>
                    <td>{{ $carrera->id }}</td>
                    <td>{{ $carrera->nombre }}</td>
                    <td>{{ $carrera->sigla }}</td>
                    <td>{{ $carrera->estado }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editModal{{ $carrera->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        &nbsp;
                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $carrera->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>

                @include('Carreras.modificar', ['carrera' => $carrera])
                @include('Carreras.eliminar', ['carrera' => $carrera])

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Carreras.agregar', ['carrera' => $carrera])

@endsection
