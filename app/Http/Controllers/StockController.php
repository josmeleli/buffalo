<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Movimiento;
use App\Models\platos;
use App\Models\local;

class StockController extends Controller
{
    public function index()
    {
        $insumos = Insumo::all(); // Obtener todos los insumos
        $platos = platos::all();   // Obtener todos los platos, si es necesario
        $locals = local::all();   // Obtener todos los locales, si es necesario
        return view('demo.stock', compact('insumos', 'platos', 'locals'));
    }

    public function actualizarStock(Request $request)
    {
        $insumo = Insumo::find($request->input('producto'));
        $tipoMovimiento = $request->input('tipoMovimiento');
        $cantidad = $request->input('cantidad');

        // Lógica para ajustar el stock basado en el tipo de movimiento
        if ($tipoMovimiento == 'ingreso') {
            $insumo->stock += $cantidad;
        } else if ($tipoMovimiento == 'venta') {
            $insumo->stock -= $cantidad;
        }

        // Guardar cambios en la base de datos
        $insumo->save();

        // Registrar el movimiento en la base de datos (opcional)
        Movimiento::create([
            'insumo_id' => $insumo->id,
            'tipo' => $tipoMovimiento,
            'cantidad' => $cantidad,
        ]);

        return redirect()->back()->with('success', 'Stock actualizado correctamente.');
    }
}
