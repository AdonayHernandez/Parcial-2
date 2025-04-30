@extends('layouts.app')

@section('title', 'Historial del Paciente')

@section('content')
<h1>Historial Médico</h1>
<div class="card mb-4">
    <div class="card-header">
        <h2>{{ $paciente->nombre_completo }}</h2>
        <p>ID: {{ $paciente->numero_identificacion }}</p>
    </div>
    <div class="card-body">
        @foreach($paciente->admisiones as $admision)
        <div class="mb-4">
            <h3>Admisión: {{ $admision->fecha_hora_ingreso->format('d/m/Y H:i') }}</h3>
            <p><strong>Diagnóstico:</strong> {{ $admision->diagnostico_preliminar }}</p>
            
            <h4>Procedimientos:</h4>
            <ul>
                @foreach($admision->procedimientos as $procedimiento)
                <li>{{ $procedimiento->tipo_procedimiento }} - {{ $procedimiento->fecha_hora->format('d/m/Y H:i') }}</li>
                @endforeach
            </ul>

            <h4>Medicamentos:</h4>
            <ul>
                @foreach($admision->medicamentos as $medicamento)
                <li>{{ $medicamento->nombre }} - {{ $medicamento->dosis }} ({{ $medicamento->frecuencia }})</li>
                @endforeach
            </ul>

            @if($admision->informeAlta)
            <h4>Informe de Alta:</h4>
            <p>{{ $admision->informeAlta->diagnostico_final }}</p>
            <p>Próxima revisión: {{ $admision->informeAlta->fecha_proxima_revision->format('d/m/Y') }}</p>
            @endif
        </div>
        <hr>
        @endforeach
    </div>
</div>
@endsection