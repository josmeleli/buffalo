<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\insumo;


class InsumoController extends Controller
{
    function index(){
        $insumos = insumo::all();
        return view('Insumos.index', compact('insumos'));
    }

    public function showInsumo(){
        return view('Admin.insumos');
    }


    function store(Request $request){

        $request->validate([
            'nombre' => 'required|max:50',
            'precocido' => 'nullable|numeric',
            'proporcion' => 'nullable|numeric',
            'stock_inicial' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            
        ]);
        
        $data = new insumo();
        $data -> nombre = $request -> input('nombre');
        $data -> precocido = $request -> input('precocido');
        $data -> proporcion = $request -> input('proporcion');
        $data -> stock_inicial = $request -> input('stock_inicial');
        $data -> stock = $request -> input('stock');
        $data->save();

        return redirect('/demo/stock');
    }
        
    

}
