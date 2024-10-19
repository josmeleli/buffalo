<?php

namespace App\Livewire;

use App\Models\insumo;
use Livewire\Component;

class InsumoTable extends Component
{
    public $search = ''; 

    public function render()
    {
        // Filtrar los insumos según la búsqueda
        $insumos = insumo::where('nombre', 'like', '%' . $this->search . '%')
                          ->orWhere('precocido', 'like', '%' . $this->search . '%')
                          ->get();

        return view('livewire.insumo-table', ['insumos' => $insumos]);
    }
}
