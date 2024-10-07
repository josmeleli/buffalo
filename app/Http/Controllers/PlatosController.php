<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\platos;

class PlatosController extends Controller
{
    function store(Request $request){

        $request->validate([
            'nombre' => 'required|max:50',
        ]);
        
        $data = new platos();
        $data -> nombre = $request -> input('nombre');
        $data->save();

        return redirect('/demo/stock');
    }
}
