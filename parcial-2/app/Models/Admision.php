<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admision extends Model
{
    use HasFactory;

    protected $table = 'admisiones';

    protected $fillable = [
        'fecha_hora_ingreso',
        'departamento_id',
        'medico_id',
        'paciente_id',
        'sintomas_presentados',
        'diagnostico_preliminar',
        'nivel_urgencia'
    ];

    // Especificar que estos campos son fechas
    protected $dates = [
        'fecha_hora_ingreso',
        'created_at',
        'updated_at'
    ];

    // Relaciones
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function procedimientos()
    {
        return $this->hasMany(Procedimiento::class);
    }

    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class);
    }

    public function informeAlta()
    {
        return $this->hasOne(InformeAlta::class);
    }
}
