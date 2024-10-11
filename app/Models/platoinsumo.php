<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platoinsumo extends Model
{
    use HasFactory;
    protected $fillable = ['id_insumo', 'id_plato', 'cantidad_insumo'];

    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'id_insumo');
    }

    public function plato()
    {
        return $this->belongsTo(Platos::class, 'id_plato');
    }
}
