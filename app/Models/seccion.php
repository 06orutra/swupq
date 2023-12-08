<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'seccions';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'nombre',
    ];

    public function prensa()
    {
        return $this->hasMany(Prensa::class, 'id_seccion');
    }
}
