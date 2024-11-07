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
            @if (auth()->check())
            @php
            $local = \App\Models\Local::find(auth()->user()->id_local);
            @endphp
            @if ($local)
            <h1>{{ $local->nombre }}</h1>
            <p>{{ $local->direccion }}</p>
            @else
            <h1>Local no encontrado</h1>
            <p>Dirección no disponible</p>
            @endif
            @else
            <h1>Usuario no autenticado</h1>
            <p>Por favor, inicie sesión para ver la información del local.</p>
            @endif
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

        <style>
            .location-info {
                margin-bottom: 20px;
                /* Espacio debajo del bloque de información del local */
            }

            .form-container {
                padding: 15px;
                /* Relleno alrededor del contenedor del formulario */
                border: 1px solid #ccc;
                /* Borde alrededor del formulario */
                border-radius: 5px;
                /* Bordes redondeados */
                background-color: #f9f9f9;
                /* Color de fondo más claro */
            }

            .plato-container {
                margin-top: 15px;
                display: flex;
                flex-direction: column;
                gap: -10px;
                /* Espacio entre cada plato */
            }

            .plato-item {
                display: flex;
                justify-content: space-between;
                /* Espacio entre los elementos */
                align-items: center;
                /* Alinear elementos verticalmente */
            }

            .checkbox-container {
                display: flex;
                align-items: center;
                /* Alinear checkbox y label */
                flex: 1;
                /* Permitir que el contenedor se expanda */
            }

            .plato-label {
                width: 19ch;
                /* Limitar el ancho del label a 12 caracteres */
                white-space: nowrap;
                /* Evitar que el texto se divida en varias líneas */
                overflow: hidden;
                /* Ocultar el desbordamiento */
                text-overflow: ellipsis;
                /* Añadir "..." si el texto es demasiado largo */
                margin-right: 10px;
                /* Espacio a la derecha del label */
            }

            .plato-item input[type="checkbox"] {
                margin-right: -70px;
                /* Espacio entre checkbox y label */
            }

            .cantidad-input {
                width: 100px;
                /* Ajustar el ancho del input de cantidad */
                margin-left: 350px;
                /* Espacio a la izquierda */
            }

            .btn {
                margin-top: 15px;
                /* Espacio por encima del botón */
                padding: 10px 15px;
                /* Relleno del botón */
                background-color: #007bff;
                /* Color de fondo del botón */
                color: #fff;
                /* Color del texto del botón */
                border: none;
                /* Sin borde */
                border-radius: 5px;
                /* Bordes redondeados del botón */
                cursor: pointer;
                /* Cambia el cursor al pasar sobre el botón */
            }

            .btn:hover {
                background-color: #0056b3;
                /* Color más oscuro al pasar el cursor */
            }


            .stock-table .ventas {
                background-color: rgba(255, 0, 0, 0.3);
                /* Color rojo claro */
            }

            .stock-table .stock-final {
                background-color: rgba(0, 128, 0, 0.3);
                /* Color verde suave */
            }
        </style>


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
                    @foreach ($localInsumos as $localInsumo)
                    <tr>
                        <td>{{ $localInsumo->insumo->nombre }}</td>
                        <td>{{ $localInsumo->insumo->stock_inicial }}</td>
                        <td>{{ $localInsumo->ingresos ?? 0}} </td>
                        <td>
                            @php
                            $cantidadTotal = \App\Models\Movimiento::where('insumo_id', $localInsumo->id)->sum('cantidad') ?? 0;
                            @endphp
                            {{ $cantidadTotal }}
                        </td>

                        <td>{{ $localInsumo->insumo->stock_final }}</td>
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