<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminhoe extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'modelo',
        'categoria_cnh_necessaria',
        'ano',
        'motorista_id',
        'carreta_id',
    ];

    public $timestamps = false;

    public function motorista()
    {
        return $this->belongsTo(Motorista::class);
    }

    public function carreta()
    {
        return $this->belongsTo(Carreta::class);
    }
}
