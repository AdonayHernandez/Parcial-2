<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Admision;
use App\Models\Procedimiento;
use App\Models\Medicamento;
use App\Models\InformeAlta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear departamentos (mínimo 10, máximo 50)
        $departamentos = Departamento::factory(15)->create();

        // Crear médicos (mínimo 10, máximo 50)
        $medicos = Medico::factory(20)->create()->each(function ($medico) use ($departamentos) {
            // Asignar 1-3 departamentos aleatorios a cada médico
            $medico->departamentos()->attach(
                $departamentos->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Crear pacientes (mínimo 10, máximo 50)
        $pacientes = Paciente::factory(30)->create();

        // Crear admisiones (mínimo 10, máximo 50)
        $admisiones = Admision::factory(40)
            ->recycle($pacientes)
            ->recycle($medicos)
            ->recycle($departamentos)
            ->create();

        // Crear registros relacionados para cada admisión
        $admisiones->each(function ($admision) use ($medicos) {
            // Crear 1-3 procedimientos por admisión
            Procedimiento::factory(rand(1, 3))
                ->recycle($medicos)
                ->create(['admision_id' => $admision->id]);
            
            // Crear 1-3 medicamentos por admisión
            Medicamento::factory(rand(1, 3))
                ->recycle($medicos)
                ->create(['admision_id' => $admision->id]);

            // % de probabilidad de tener informe de alta
            if (rand(1, 100) <= 70) {
                InformeAlta::factory()
                    ->create(['admision_id' => $admision->id]);
            }
        });
    }

    public function medicoConDetalles()
    {
        $medicos = Medico::with([
            'departamentos',
            'admisiones.paciente'
        ])->get();

        return view('consultas.medicos-detalles', compact('medicos'));
    }

    public function pacientesPorDepartamento()
    {
        $departamentos = Departamento::withCount('admisiones')
            ->orderByDesc('admisiones_count')
            ->get();

        return view('consultas.pacientes-departamento', compact('departamentos'));
    }

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
