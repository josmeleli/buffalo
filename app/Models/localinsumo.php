<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localinsumo extends Model
{
    use HasFactory;

    protected $fillable = ['id_local', 'id_insumo', 'stock'];

    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'id_insumo');
    }
}
