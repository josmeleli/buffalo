<?php

namespace App\Http\Controllers;

use App\Models\local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index(){
        $locales = local::all();
        return view('Admin.locales', compact('locales'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=> 'required',
            'direccion'=> 'required'
        ]);

        $data = new local();
        $data -> nombre = $request -> input('nombre');
        $data -> direccion = $request -> input('direccion');
        $data -> save();
        return redirect('/admin/local');
    }
}


