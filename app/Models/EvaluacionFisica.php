<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionFisica extends Model
{
    use HasFactory;

    protected $fillable = [
        "postulante_id",
        "nota",
        "descripcion",
    ];

    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id');
    }
}
