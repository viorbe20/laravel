<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premios';

    protected $fillable = [
        'titulo',
        'imagen',
        'fecha',
        'descripcion',
        'url',
        'activo',
    ];

}
