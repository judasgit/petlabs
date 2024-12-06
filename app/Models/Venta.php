<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ventas';

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'ventas_productos', 'id_venta','id_producto');
    }
}
