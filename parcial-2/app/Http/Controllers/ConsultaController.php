<?php

namespace App\Http\Controllers;

use App\Models\Admision;
use App\Models\Departamento;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    // a. Cantidad de pacientes admitidos en cada departamento
    public function pacientesPorDepartamento()
    {
        $departamentos = Departamento::withCount('admisiones')
            ->orderByDesc('admisiones_count')
            ->get();

        return view('consultas.pacientes-departamento', compact('departamentos'));
    }

    // b. Médico con sus departamentos y pacientes atendidos
    public function medicoConDetalles()
    {
        $medicos = Medico::with([
            'departamentos',
            'admisiones.paciente'
        ])->get();

        return view('consultas.medicos-detalles', compact('medicos'));
    }

    // c. Cantidad de admisiones por mes
    public function admisionesPorMes()
    {
        $admisiones = Admision::selectRaw('
            YEAR(fecha_hora_ingreso) as año,
            MONTH(fecha_hora_ingreso) as mes,
            COUNT(*) as total
        ')
        ->groupBy('año', 'mes')
        ->orderByDesc('año')
        ->orderByDesc('mes')
        ->get();

        return view('consultas.admisiones-mes', compact('admisiones'));
    }

    // d. Paciente con su historial médico
    public function pacienteHistorial($id)
    {
        $paciente = Paciente::with([
            'admisiones' => function($query) {
                $query->orderByDesc('fecha_hora_ingreso');
            },
            'admisiones.procedimientos',
            'admisiones.medicamentos',
            'admisiones.informeAlta'
        ])->findOrFail($id);

        return view('consultas.paciente-historial', compact('paciente'));
    }
}
