<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // tabla en la db
    protected $table = 'pedidos';

    // Campos
    protected $fillable = [
        'producto',
        'cantidad',
        'total',
        'id_usuario'
    ];

    ////Relacion one to one
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}