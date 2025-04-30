<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InformeAlta extends Model
{
    use HasFactory;

    protected $table = 'informes_altas';

    protected $fillable = [
        'admision_id',
        'diagnostico_final',
        'tratamientos_aplicados',
        'medicacion_casa',
        'recomendaciones_medicas',
        'fecha_proxima_revision',
    ];

    protected $casts = [
        'fecha_proxima_revision' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function admision(): BelongsTo
    {
        return $this->belongsTo(Admision::class);
    }
}