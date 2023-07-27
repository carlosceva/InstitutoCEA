@extends('layouts.principal')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-file mr-1"></i>
                <b>GESTIONAR NOTA</b> 
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
        <table class="table table-hover" id="notas">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Modulo</th>
                    <th>Nota</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->id }}</td>
                    <td>{{ $nota->alumno }}</td>
                    <td>{{ $nota->modulo }}</td>
                    <td>{{ $nota->nota }}</td>
                    <td>{{ $nota->fecha }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editModal{{ $nota->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        &nbsp;
                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $nota->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>

                @include('Notas.modificar', ['nota' => $nota])
                @include('Notas.eliminar', ['nota' => $nota])
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Notas.agregar')

@endsection