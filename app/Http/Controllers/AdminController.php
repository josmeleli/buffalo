<?php

namespace App\Http\Controllers;

use App\Models\insumo;
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
        $ultimoInsumo = Insumo::latest()->first();
        $fechaUltimoInsumo = $ultimoInsumo ? $ultimoInsumo->created_at->format('d/m/Y') : 'No hay registros';
        $anioActual = Carbon::now()->year;
        $insumoBajo = Insumo::where('stock', '<', 5)->count();

        $insumosPorMes = Insumo::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('COUNT(*) as cantidad')
        )->groupBy('mes')->get();

        return view('Admin.index', compact('totalInsumo', 'fechaUltimoInsumo', 'anioActual', 'insumoBajo','insumosPorMes'));
    }
}
