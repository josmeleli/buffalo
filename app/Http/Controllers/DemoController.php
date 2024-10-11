<?php

namespace App\Http\Controllers;

use App\Models\insumo;
use App\Models\local;
use App\Models\platos;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    function index(){
        $insumos = insumo::all();
        $platos = platos::all();
        $tipo = 'insumo';
        return view('Demo.index', compact('insumos', 'platos', 'tipo'));
    }


    function stock(){
        $insumos = insumo::all();
        $locals = local::all();
        return view('Demo.stock', compact('insumos', 'locals'));
    }

    public function obtenerProductos(Request $request)
{
    $tipo = $request->query('tipo');

    if ($tipo === 'insumo') {
        $productos = Insumo::all();
    } elseif ($tipo === 'plato') {
        $productos = Platos::all();
    } else {
        $productos = [];
    }

    return response()->json([
        'productos' => $productos
    ]);
}

}
