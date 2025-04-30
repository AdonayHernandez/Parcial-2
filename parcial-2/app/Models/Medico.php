<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_empleado',
        'nombre_completo',
        'especialidad',
        'anios_experiencia',
        'horario_consulta',
        'datos_contacto',
        'departamento_principal_id'
    ];

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'departamento_medico');
    }

    public function departamentoPrincipal()
    {
        return $this->belongsTo(Departamento::class, 'departamento_principal_id');
    }

    public function admisiones()
    {
        return $this->hasMany(Admision::class);
    }
}
