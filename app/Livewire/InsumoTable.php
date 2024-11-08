<?php

namespace App\Livewire;

use App\Models\insumo;
use App\Models\platos;
use Livewire\Component;

class InsumoTable extends Component
{
    public $search = '';
    public $filter = 'insumo';

    public function render()
    {
        if ($this->filter === 'insumo') {
            $data = Insumo::where('nombre', 'like', '%' . $this->search . '%')
                          ->orWhere('precocido', 'like', '%' . $this->search . '%')
                          ->get();
        } else {
            $data = platos::where('nombre', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.insumo-table', ['data' => $data]);
    }

    public function updatedFilter($value)
    {
        $this->reset('search'); 
    }
}
