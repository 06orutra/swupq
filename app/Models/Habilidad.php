<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    use HasFactory;
    //asociamos el modelo con la tabla ya que no cumple con la convencion de laravel debido a los plurales
    protected $table = 'habilidades';
}

