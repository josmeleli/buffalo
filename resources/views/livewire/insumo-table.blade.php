<div>
    <div class="col-14">
        <div class="table-container">
            <h2 class="text-center mb-4">Tabla de Insumos o Platos</h2>

            <div class="d-flex">
                {{-- Campo de Entrada para la busqueda --}}
                <input type="text" wire:model.live="search" class="form-control mb-3 mr-3"
                    placeholder="Buscar {{ $filter === 'insumo' ? 'insumo' : 'plato' }}...">
                <div style="width: 15px"></div>

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

                    <div style="width: 8px"></div>

                    <button type="button" class="btn btn-success d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalInsumo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" 
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" 
                                stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 5v14m-7 -7h14" />
                        </svg>
                    </button>

                    
                </div>
            </div>

            {{-- modal de registrar insumo --}}
            <div class="modal fade" id="modalInsumo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Registra un Nuevo Insumo</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('insumos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="precocido" placeholder="Precocido" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="proporcion" placeholder="Proporcion" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="stock" placeholder="Stock" value="0" required>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-dark aling-items-end" type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>


           {{-- Tabla de insumos o platos --}}
           <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            @if ($filter === 'insumo')
                                <th>Precocido</th>
                                <th>Proporción</th>
                                <th>Stock Final</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nombre }}</td>
                                @if ($filter === 'insumo')
                                    <td>{{ $item->precocido }}</td>
                                    <td>{{ $item->proporcion }}</td>
                                    <td>{{ $item->stock_final }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>
    </div>

</div>
