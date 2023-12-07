<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seccion extends Model
{
    protected $table = 'seccion';

    protected $fillable = [
        'nombre',
    ];

    public function prensa()
    {
        return $this->hasMany(Prensa::class, 'id_seccion');
    }
}
