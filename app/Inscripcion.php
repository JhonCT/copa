<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcion';
    protected $primaryKey = 'id';

    protected $fillable = [
        '__token', 'categorias', 'disciplina', 'jugadores', 'delegado', 'costo', 'egreso'
    ];
}