<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Movimiento;
use App\Models\platos;
use App\Models\local;
use App\Models\PlatoInsumo;

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
    $tipoMovimiento = $request->input('tipoMovimiento');
    $tipo = $request->input('tipo');

    if ($tipo === 'insumo') {
        // Actualizar stock de insumo directamente
        $productoId = $request->input('producto');
        $cantidad = $request->input('cantidad');

        $insumo = Insumo::find($productoId);

        if ($tipoMovimiento == 'ingreso') {
            $insumo->stock += $cantidad;
        } else if ($tipoMovimiento == 'venta') {
            $insumo->stock -= $cantidad;
        }

        $insumo->save();

        Movimiento::create([
            'insumo_id' => $insumo->id,
            'tipo' => $tipoMovimiento,
            'cantidad' => $cantidad,
        ]);
    } else if ($tipo === 'plato') {
        // Actualizar stock de insumos según los platos seleccionados
        $productosSeleccionados = $request->input('productos', []);
        $cantidades = $request->input('cantidad', []);

        foreach ($productosSeleccionados as $productoId) {
            // Obtener la cantidad específica para el plato
            $cantidad = $cantidades[$productoId] ?? 1; // Por defecto 1 si no se especifica
            
            $platoInsumos = PlatoInsumo::where('id_plato', $productoId)->get();

            foreach ($platoInsumos as $platoInsumo) {
                $insumo = Insumo::find($platoInsumo->id_insumo);
                $cantidadTotal = $platoInsumo->cantidad_insumo * $cantidad;

                if ($tipoMovimiento == 'venta') {
                    $insumo->stock -= $cantidadTotal;
                } else if ($tipoMovimiento == 'ingreso') {
                    $insumo->stock += $cantidadTotal;
                }

                $insumo->save();

                Movimiento::create([
                    'insumo_id' => $insumo->id,
                    'tipo' => $tipoMovimiento,
                    'cantidad' => $cantidadTotal,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Stock actualizado correctamente.');
}

}
