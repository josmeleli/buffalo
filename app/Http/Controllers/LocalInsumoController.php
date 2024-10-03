<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalInsumo;

class LocalInsumoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'id_local' => 'required|exists:locals,id',
        'id_insumo' => 'required|exists:insumos,id',
        'stock' => 'required|numeric'
    ]);

    try {
        $localInsumo = new LocalInsumo();
        $localInsumo->id_local = $request->id_local;
        $localInsumo->id_insumo = $request->id_insumo;
        $localInsumo->stock = $request->stock;
        $localInsumo->save();

        return redirect('/demo/stock')->with('success', 'Se ha guardado correctamente');
    } catch (\Exception $e) {
        return redirect('/demo/stock')->with('error', 'Error al guardar: ' . $e->getMessage());
    }
}
}