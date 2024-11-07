<?php

namespace App\Http\Controllers;

use App\Models\insumo;
use App\Models\local;
use App\Models\platos;
use Illuminate\Http\Request;
use App\Models\localinsumo;
use Illuminate\Support\Facades\Auth;


class DemoController extends Controller
{
    function index(){
        $insumos = insumo::all();
        $platos = platos::all();
        $tipo = 'insumo';
        $idLocal = Auth::user()->id_local; // Asume que tienes el 'local_id' en el modelo del usuario.
        $localInsumos = LocalInsumo::with('insumo') // Asegúrate de tener la relación 'insumo' en LocalInsumo.
                            ->where('id_local', $idLocal)
                            ->get();
        return view('Demo.index', compact('insumos', 'platos', 'tipo', 'localInsumos'));
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
