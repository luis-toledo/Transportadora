<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'capacidade_carga',
        'ano_fabricacao',
    ];
}
