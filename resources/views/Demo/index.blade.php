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
                <label for="tipoMovimiento">Selecciona Ingreso o Venta</label>
                <select id="tipoMovimiento" name="tipoMovimiento">
                    <option value="ingreso">Ingreso</option>
                    <option value="venta">Venta</option>
                </select>

                <label for="tipoItem">Selecciona el tipo</label>
                <div class="radio-buttons" style="display: inline-block;">
                    <label style="display: inline-block; align-items: center; margin-bottom: 5px;">
                        <input type="radio" name="tipo" value="insumo" checked style="margin-right: 10px;"> Insumo
                    </label>
                    <label style="display: inline-block; align-items: center; margin-bottom: 5px;">
                        <input type="radio" name="tipo" value="plato" style="margin-right: 10px;"> Plato
                    </label>
                </div>

                <label for="producto">Producto</label>
                <select id="producto" name="producto">
                    @foreach ($insumos as $insumo)
                    <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                    @endforeach
                </select>

                <label for="cantidad">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" value="1" min="1">

                <button type="submit">Actualizar</button>
            </form>
        </div>

        <div class="stock-table">
            <table>
                <thead>
                    <tr>
                        <th>Insumo</th>
                        <th>Stock Inicial</th>
                        <th>Ingresos</th>
                        <th>Ventas</th>
                        <th>Stock Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insumos as $insumo)
                    <tr>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->stock_inicial }}</td>
                        <td>{{ $insumo->ingresos }}</td>
                        <td>{{ $insumo->ventas }}</td>
                        <td>{{ $insumo->stock_final }}</td>
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