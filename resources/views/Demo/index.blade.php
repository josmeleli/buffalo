<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Stock</title>
    <link rel="stylesheet" href="{{ asset('css/styles-demo.css') }}">
</head>

<body>
    <header>
        <div class="header-left">
            <span id="fecha-hora"></span>   
        </div>
        <nav>
            <ul>
                <li><a href="#">INICIO</a></li>
                <li><a href="/demo/stock">CONTROL DE STOCK</a></li>
                <li><a href="#">REPORTES DE STOCK</a></li>
                <li><a href="#">CONFIGURACIÓN</a></li>
            </ul>
        </nav>
    </header>   

    <main>
        <div class="location-info"> 
            <h1>Local 2</h1>
            <p>Av. Villareal 2012</p>
        </div>
        
        <div class="form-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            <form action="{{ route('actualizar.stock') }}" method="POST">
                @csrf
        
                <label for="tipoMovimiento">Movimiento: Venta</label>
                <input type="hidden" id="tipoMovimiento" name="tipoMovimiento" value="venta">
        
                <label for="tipoItem">Tipo de Producto: Plato</label>
                <input type="hidden" id="tipoItem" name="tipo" value="plato">
        
                <div class="plato-container">
                    @foreach ($platos as $plato)
                        <div class="plato-item">
                            <div class="checkbox-container">
                                <input type="checkbox" id="plato_{{ $plato->id }}" name="productos[]" value="{{ $plato->id }}">
                                <label for="plato_{{ $plato->id }}" class="plato-label">{{ $plato->nombre }}</label>
                            </div>
                            <input type="number" name="cantidad[{{ $plato->id }}]" value="1" min="1" class="cantidad-input">
                        </div>
                    @endforeach
                </div>
        
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
        
        <div class="stock-table">
            <table>
                <thead>
                    <tr>
                        <th>Insumo</th>
                        <th>Stock Inicial</th>
                        <th class=>Ingresos</th>
                        <th class="ventas">Ventas</th>
                        <th class="stock-final">Stock Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insumos as $insumo)
                    <tr>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->stock_inicial }}</td>
                        <td>{{ $insumo->ingresos }}</td>
                        <td class="ventas">{{ $insumo->ventas }}</td>
                        <td class="stock-final">{{ $insumo->stock_final }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="alerta" style="display: none;">
            <div id="alertas-stock-bajo"></div>
        </div>
    </main>

    <script>
        // Mostrar la fecha y hora dinámica
        document.getElementById('fecha-hora').textContent = new Date().toLocaleString('es-ES', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            hour: '2-digit',
            minute: '2-digit'
        });

        const LIMITE_STOCK_BAJO = 5;

        // Verificar el stock bajo desde el DOM
        function verificarStockBajo() {
            const filas = document.querySelectorAll('tbody tr');
            const alertasDiv = document.getElementById('alertas-stock-bajo');
            alertasDiv.innerHTML = '';

            let stockBajo = false;

            filas.forEach(fila => {
                const stockFinal = parseInt(fila.querySelector('td:nth-child(5)').textContent);
                const nombreInsumo = fila.querySelector('td:first-child').textContent;

                if (stockFinal <= LIMITE_STOCK_BAJO) {
                    const mensajeAlerta = document.createElement('div');
                    mensajeAlerta.textContent = `${nombreInsumo} tiene stock bajo.`;
                    alertasDiv.appendChild(mensajeAlerta);
                    stockBajo = true;
                }
            });

            const alertaDiv = document.querySelector('.alerta');
            alertaDiv.style.display = stockBajo ? 'block' : 'none';
        }

        verificarStockBajo();

        // Actualizar productos (insumos o platos) al cambiar la selección
        document.querySelectorAll('input[name="tipo"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const tipoSeleccionado = this.value;

                // Hacer una solicitud fetch al servidor para obtener insumos/platos según la selección
                fetch(`/obtener-productos?tipo=${tipoSeleccionado}`)
                    .then(response => response.json())
                    .then(data => {
                        const selectProducto = document.getElementById('producto');
                        selectProducto.innerHTML = ''; // Limpiar las opciones anteriores

                        data.productos.forEach(producto => {
                            const option = document.createElement('option');
                            option.value = producto.id;
                            option.textContent = producto.nombre;
                            selectProducto.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error al cargar productos:', error));
            });
        });
    </script>
</body>

</html>