@extends('layouts.app')

@section('title', 'Pacientes por Departamento')

@section('content')
<div class="container">
    <h2 class="mb-4">Pacientes por Departamento</h2>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Departamento</th>
                            <th>Código</th>
                            <th>Jefe de Departamento</th>
                            <th>Total de Pacientes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departamentos as $departamento)
                        <tr>
                            <td>{{ $departamento->nombre }}</td>
                            <td>{{ $departamento->codigo }}</td>
                            <td>{{ $departamento->jefe_departamento }}</td>
                            <td>{{ $departamento->admisiones_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection