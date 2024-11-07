<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'id_local'];

    public function local()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }
}
