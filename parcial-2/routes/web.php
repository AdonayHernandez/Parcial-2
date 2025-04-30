<?php

use App\Http\Controllers\ConsultaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('consultas')->group(function () {
    Route::get('/pacientes-departamento', [ConsultaController::class, 'pacientesPorDepartamento'])
        ->name('consultas.pacientes-departamento');
    
    Route::get('/medicos-detalles', [ConsultaController::class, 'medicoConDetalles'])
        ->name('consultas.medicos-detalles');
    
    Route::get('/admisiones-mes', [ConsultaController::class, 'admisionesPorMes'])
        ->name('consultas.admisiones-mes');
    
    Route::get('/paciente/{id}/historial', [ConsultaController::class, 'pacienteHistorial'])
        ->name('consultas.paciente-historial');
});
