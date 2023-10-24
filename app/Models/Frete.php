<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_carga',
        'valor',
        'kilometros',
        'caminhao_id',
        'carga_id',
    ];

    public $timestamps = false;
    
    public function caminhao()
    {
        return $this->belongsTo(Caminhao::class);
    }

    public function carga()
    {
        return $this->belongsTo(Carga::class);
    }
}
