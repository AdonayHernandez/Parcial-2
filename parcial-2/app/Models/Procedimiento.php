<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'admision_id',
        'tipo_procedimiento',
        'fecha_hora',
        'medico_responsable_id',
        'enfermeros_asistentes',
        'equipamiento_utilizado',
        'resultados_obtenidos',
        'observaciones'
    ];

    protected $dates = [
        'fecha_hora'
    ];

    public function admision()
    {
        return $this->belongsTo(Admision::class);
    }
}
