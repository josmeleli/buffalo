<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'stock_inicial', 'stock'];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function getIngresosAttribute()
    {
        return $this->movimientos()->where('tipo', 'ingreso')->sum('cantidad');
    }

    public function getVentasAttribute()
    {
        return $this->movimientos()->where('tipo', 'venta')->sum('cantidad');
    }

    public function getStockFinalAttribute()
    {
        return $this->stock_inicial + $this->ingresos - $this->ventas;
    }
}
