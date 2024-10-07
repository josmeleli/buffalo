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
        return view('Demo.index', compact('insumos', 'platos'));
    }


    function stock(){
        $insumos = insumo::all();
        $locals = local::all();
        return view('Demo.stock', compact('insumos', 'locals'));
    }
}
