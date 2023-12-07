<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prensa extends Model
{
    protected $table = 'prensa';

    protected $fillable = [
        'titulo', 'contenido', 'imagen', 'id_seccion'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'id_seccion');
    }
}
