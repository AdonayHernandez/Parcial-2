<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_identificacion',
        'nombre_completo',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'correo_electronico',
        'grupo_sanguineo',
        'alergias',
        'historial_medico_resumido'
    ];

    protected $dates = [
        'fecha_nacimiento'
    ];

    public function admisiones()
    {
        return $this->hasMany(Admision::class);
    }
}
