<?php

namespace App\Http\Controllers;

use App\Models\insumo;
use App\Models\local;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    function index(){
        $insumos = insumo::all();
        return view('Demo.index', compact('insumos'));
    }


    function stock(){
        $insumos = insumo::all();
        $locals = local::all();
        return view('Demo.stock', compact('insumos', 'locals'));
    }
}
