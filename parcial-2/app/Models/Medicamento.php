<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'admision_id',
        'nombre',
        'dosis',
        'frecuencia',
        'via_administracion',
        'duracion_tratamiento',
        'medico_prescriptor_id'
    ];

    public function admision()
    {
        return $this->belongsTo(Admision::class);
    }

    public function medicoPrescriptor()
    {
        return $this->belongsTo(Medico::class, 'medico_prescriptor_id');
    }
}