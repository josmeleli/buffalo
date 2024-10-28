<div>
    <div class="col-12 px-4">
        <div class="table-container">
            <h2 class="text-center mb-4">Tabla de Insumos o Platos</h2>

            <div class="d-flex">
                {{-- Campo de Entrada para la busqueda --}}
                <input type="text" wire:model.live="search" class="form-control mb-3"
                    placeholder="Buscar {{ $filter === 'insumo' ? 'insumo' : 'plato' }}...">
                {{-- Boton de filtro  --}}
                <div class="dropdown mb-3 d-flex justify-content-end ">
                    <button class="btn btn-secondary dropdown-toggle d-flex align-items-center"
                            type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                        </svg>
                        <span class="ms-2">Filtro</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <buttom class="dropdown-item" wire:click="$set('filter', 'insumo')">
                                Insumo
                            </buttom>
                        </li>
                        <li>
                            <buttom class="dropdown-item" wire:click="$set('filter', 'plato')">
                                Plato
                            </buttom>
                        </li>
                    </ul>
                </div>

            </div>


           {{-- Tabla de insumos o platos --}}
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        @if ($filter === 'insumo')
                            <th>Precocido</th>
                            <th>Proporción</th>
                            <th>Stock Inicial</th>
                            <th>Stock Final</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-align-center">
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nombre }}</td>
                            @if ($filter === 'insumo')
                                <td>{{ $item->precocido }}</td>
                                <td>{{ $item->proporcion }}</td>
                                <td>{{ $item->stock_inicial }}</td>
                                <td class="{{ $item->stock < 5 ? 'bg-danger text-white' : '' }}">
                                    {{ $item->stock < 0 ? 0 : $item->stock }}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
