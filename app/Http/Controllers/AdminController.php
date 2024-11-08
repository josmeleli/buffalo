<?php

namespace App\Http\Controllers;

use App\Models\insumo;
use App\Models\localinsumo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin(){
        return view('Admin.Auth.login');
    }

    public function index(){
        $totalInsumo = insumo::all()->count();
        $ultimoInsumo = insumo::latest()->first();
        $fechaUltimoInsumo = $ultimoInsumo ? $ultimoInsumo->created_at->format('d/m/Y') : 'No hay registros';
        $anioActual = Carbon::now()->year;
        $insumoBajo = insumo::where('stock', '<', 5)->count();

        $umbralCritico = 10;

        $insumosCriticos = insumo::where('stock', '<', $umbralCritico)->get();

        $totalUtilizados = insumo::sum('stock_inicial') - Insumo::sum('stock');

        return view('Admin.index', compact('totalInsumo','fechaUltimoInsumo', 'anioActual', 'insumoBajo', 'insumosCriticos', 'totalUtilizados'));
    }
}
