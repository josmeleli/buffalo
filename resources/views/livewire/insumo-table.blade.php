<div>
    <div class="table-container">
        <h2 class="text-center mb-4">Filtrar Insumos</h2>

        <!-- Campo de búsqueda -->
        <input type="text" wire:model.live="search" class="form-control mb-3" placeholder="Buscar insumo...">

        <!-- Tabla de insumos -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precocido</th>
                    <th>Proporción</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insumos as $index => $insumo)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->precocido }}</td>
                        <td>{{ $insumo->proporcion }}</td>
                        <td>{{ $insumo->stock_inicial }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
