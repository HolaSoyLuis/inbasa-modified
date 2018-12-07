<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bimestre extends Model
{
    //
    protected $table = 'bimestres';

    protected $fillable = [
        'bimestre',
        'ciclo_id', 
    ];

    public function ciclo(){//Un bloque tiene muchos detalles de notas(nota de cada aspecto)
        return $this->hasMany(Ciclo::class);
    }

}
