<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // tabla en la db
    protected $table = 'usuarios';

    // Campos
    protected $fillable = [
        'nombre',
        'correo',
        'telefono'
    ];

    //Relacion one to many
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }
}