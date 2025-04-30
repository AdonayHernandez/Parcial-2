<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'ubicacion',
        'jefe_departamento',
        'presupuesto_anual'
    ];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'departamento_medico');
    }

    public function medicosPrincipales()
    {
        return $this->hasMany(Medico::class, 'departamento_principal_id');
    }

    public function admisiones()
    {
        return $this->hasMany(Admision::class);
    }
}
