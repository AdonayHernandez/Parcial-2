@extends('layouts.app')

@section('title', 'Admisiones por Mes')

@section('content')
<div class="container">
    <h2 class="mb-4">Admisiones por Mes</h2>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>Mes</th>
                            <th>Total de Admisiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admisiones as $admision)
                        <tr>
                            <td>{{ $admision->año }}</td>
                            <td>{{ DateTime::createFromFormat('!m', $admision->mes)->format('F') }}</td>
                            <td>{{ $admision->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection