@extends('layouts.app')

@section('title', 'Detalles de Médicos')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalles de Médicos</h2>
    @foreach($medicos as $medico)
    <div class="card mb-4">
        <div class="card-header">
            <h3>{{ $medico->nombre_completo }}</h3>
            <p class="mb-0">Especialidad: {{ $medico->especialidad }}</p>
        </div>
        <div class="card-body">
            <h4>Departamentos:</h4>
            <ul class="list-group mb-3">
                @foreach($medico->departamentos as $departamento)
                    <li class="list-group-item">{{ $departamento->nombre }}</li>
                @endforeach
            </ul>
            
            <h4>Pacientes Atendidos:</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Fecha de Ingreso</th>
                            <th>Diagnóstico</th>
                            <th>Nivel de Urgencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medico->admisiones as $admision)
                        <tr>
                            <td>{{ $admision->paciente->nombre_completo }}</td>
                            <td>{{ $admision->fecha_hora_ingreso instanceof \Carbon\Carbon ? $admision->fecha_hora_ingreso->format('d/m/Y H:i') : $admision->fecha_hora_ingreso }}</td>
                            <td>{{ $admision->diagnostico_preliminar }}</td>
                            <td>{{ $admision->nivel_urgencia }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection