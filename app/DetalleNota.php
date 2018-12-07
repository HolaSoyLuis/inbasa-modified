<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleNota extends Model
{
    protected $table = 'detalle_notas';

    protected $fillable = [
        'nota',
        'aspecto_id',
        'tipo_evaluacion_id',
        'bimestre_id',
        'estudiante_id',
        'curso_id',
        'asignacion_id',
    ];

    public function aspecto(){//Un detalle de nota tiene únicamente un aspecto a calificar
        return $this->belongsTo(Aspecto::class);
    }

    public function tipo_evaluacion(){//Un detalle de nota le pertenece a un tipo de evaluación
        return $this->belongsTo(TipoEvaluacion::class);
    }
    
    public function bimestre(){//Un detalle le pertenece a un solo bloque
        return $this->belongsTo(Bimestre::class);
    }

    public function estudiante(){//Un detalle le pertenece a un solo estudiante
        return $this->belongsTo(Estudiante::class);
    }

    public function curso(){//Un detalle le pertenece a un solo curso
        return $this->belongsTo(Curso::class);
    }

    public function asignacion(){//Un detalle le pertenece a un solo curso
        return $this->belongsTo(Asignacion::class);
    }
}
