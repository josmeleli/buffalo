<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlatoInsumo;

class PlatoInsumoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_insumo' => 'required|exists:insumos,id',
            'id_plato' => 'required|exists:platos,id',
            'cantidad_insumo' => 'required|integer|min:1',
        ]);

        PlatoInsumo::create([
            'id_insumo' => $request->id_insumo,
            'id_plato' => $request->id_plato,
            'cantidad_insumo' => $request->cantidad_insumo,
        ]);

        return redirect()->back()->with('success', 'PlatoInsumo creado exitosamente.');
    }
}
