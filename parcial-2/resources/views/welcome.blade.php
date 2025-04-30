@extends('layouts.app')

@section('title', 'Sistema Hospital - Inicio')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Pacientes por Departamento</h5>
                    <p class="card-text">Visualizar estadísticas de pacientes en cada departamento.</p>
                    <a href="{{ route('consultas.pacientes-departamento') }}" class="btn btn-primary">Ver Estadísticas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Detalles de Médicos</h5>
                    <p class="card-text">Consultar información de médicos y sus pacientes.</p>
                    <a href="{{ route('consultas.medicos-detalles') }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Admisiones por Mes</h5>
                    <p class="card-text">Ver estadísticas mensuales de admisiones.</p>
                    <a href="{{ route('consultas.admisiones-mes') }}" class="btn btn-primary">Ver Admisiones</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
