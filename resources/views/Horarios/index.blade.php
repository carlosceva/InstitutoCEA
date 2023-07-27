@extends('layouts.principal')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-clock mr-1"></i>
                <b>GESTIONAR HORARIO   </b> 
                </h1>
                <div class="float-right d-sm-block"> 
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" data-toggle="modal" data-target="#agregarHorarioModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
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
        <table class="table table-hover" id="horarios">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Turno</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->id }}</td>
                <td>{{ $horario->horainicio }}</td>
                <td>{{ $horario->horafin }}</td>
                <td>{{ $horario->turno }}</td>
                <td>{{ $horario->estado }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#editModal{{ $horario->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    &nbsp;
                    <a href="#" data-toggle="modal" data-target="#deleteModal{{ $horario->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            
            @include('Horarios.modificar', ['horario' => $horario])
            @include('Horarios.eliminar', ['horario' => $horario])   

            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('Horarios.agregar', ['horario' => $horario])
             
@endsection