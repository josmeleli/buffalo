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
                <li><a href="#">CONFIGURACION</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="location-info">
            <h1>Local 2</h1>
            <p>Av. Villareal 2012</p>
        </div>
        <div class="form-container">
            <form id="stockForm">
                <label for="tipoMovimiento">Selecciona Ingreso o Venta</label>
                <select id="tipoMovimiento">
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
                <input type="number" id="cantidad" value="1" min="1">

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
                    <tr>
                        <td>Pierna de Pollo</td>
                        <td id="stock-inicial-pollo">50</td>
                        <td id="ingresos-pollo">10</td>
                        <td id="ventas-pollo">10</td>
                        <td id="stock-final-pollo">50</td>
                    </tr>
                    <tr>
                        <td>Pierna de Res</td>
                        <td id="stock-inicial-res">10</td>
                        <td id="ingresos-res">10</td>
                        <td id="ventas-res">15</td>
                        <td id="stock-final-res">5</td>
                    </tr>
                    <tr>
                        <td>Chuleta de cerdo</td>
                        <td id="stock-inicial-cerdo">20</td>
                        <td id="ingresos-cerdo">10</td>
                        <td id="ventas-cerdo">2</td>
                        <td id="stock-final-cerdo">28</td>
                    </tr>
                    <tr>
                        <td>Chorizos</td>
                        <td id="stock-inicial-chorizos">100</td>
                        <td id="ingresos-chorizos">10</td>
                        <td id="ventas-chorizos">5</td>
                        <td id="stock-final-chorizos">105</td>
                    </tr>
                </tbody>
            </table>
            <a href="#">Ver tabla completa</a>
        </div>

        <div class="alerta" style="display: none;">

            <div id="alertas-stock-bajo"></div> <!-- Contenedor para múltiples alertas -->
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

        // Función para guardar el stock en localStorage
        function guardarStockEnLocalStorage(producto, stockInicial, ingresos, ventas, stockFinal) {
            const stockData = {
                stockInicial: parseInt(stockInicial.textContent),
                ingresos: parseInt(ingresos.textContent),
                ventas: parseInt(ventas.textContent),
                stockFinal: parseInt(stockFinal.textContent)
            };
            localStorage.setItem(producto, JSON.stringify(stockData));
        }

        // Define el límite de stock bajo
        const LIMITE_STOCK_BAJO = 5;

        // Función para verificar el stock y mostrar la alerta
        function verificarStockBajo() {
            const insumos = [{
                    nombre: "Pierna de Pollo",
                    stockFinal: parseInt(stockPollo.stockFinal.textContent)
                },
                {
                    nombre: "Pierna de Res",
                    stockFinal: parseInt(stockRes.stockFinal.textContent)
                },
                {
                    nombre: "Chuleta de cerdo",
                    stockFinal: parseInt(stockCerdo.stockFinal.textContent)
                },
                {
                    nombre: "Chorizos",
                    stockFinal: parseInt(stockChorizos.stockFinal.textContent)
                }
            ];

            const alertasDiv = document.getElementById('alertas-stock-bajo');
            alertasDiv.innerHTML = ''; // Limpiar alertas anteriores

            let stockBajo = insumos.filter(insumo => insumo.stockFinal <= LIMITE_STOCK_BAJO);

            const alertaDiv = document.querySelector('.alerta');
            if (stockBajo.length > 0) {
                alertaDiv.style.display = 'block'; // Muestra el div de alerta
                stockBajo.forEach(insumo => {
                    const mensajeAlerta = document.createElement('div');
                    mensajeAlerta.textContent = `${insumo.nombre} tiene stock bajo.`;
                    alertasDiv.appendChild(mensajeAlerta); // Agrega cada insumo bajo al contenedor
                });
            } else {
                alertaDiv.style.display = 'none'; // Oculta el div de alerta si no hay stock bajo
            }
        }

        // Función para cargar el stock desde localStorage
        function cargarStockDesdeLocalStorage(producto, stockInicial, ingresos, ventas, stockFinal) {
            const stockData = JSON.parse(localStorage.getItem(producto));
            if (stockData) {
                stockInicial.textContent = stockData.stockInicial;
                ingresos.textContent = stockData.ingresos;
                ventas.textContent = stockData.ventas;
                stockFinal.textContent = stockData.stockFinal;
            }
        }

        // Referencias a los elementos de la tabla
        const stockPollo = {
            stockInicial: document.getElementById('stock-inicial-pollo'),
            ingresos: document.getElementById('ingresos-pollo'),
            ventas: document.getElementById('ventas-pollo'),
            stockFinal: document.getElementById('stock-final-pollo')
        };
        const stockRes = {
            stockInicial: document.getElementById('stock-inicial-res'),
            ingresos: document.getElementById('ingresos-res'),
            ventas: document.getElementById('ventas-res'),
            stockFinal: document.getElementById('stock-final-res')
        };
        const stockCerdo = {
            stockInicial: document.getElementById('stock-inicial-cerdo'),
            ingresos: document.getElementById('ingresos-cerdo'),
            ventas: document.getElementById('ventas-cerdo'),
            stockFinal: document.getElementById('stock-final-cerdo')
        };
        const stockChorizos = {
            stockInicial: document.getElementById('stock-inicial-chorizos'),
            ingresos: document.getElementById('ingresos-chorizos'),
            ventas: document.getElementById('ventas-chorizos'),
            stockFinal: document.getElementById('stock-final-chorizos')
        };

        // Cargar el stock al inicio
        cargarStockDesdeLocalStorage('pierna_pollo', stockPollo.stockInicial, stockPollo.ingresos, stockPollo.ventas,
            stockPollo.stockFinal);
        cargarStockDesdeLocalStorage('pierna_res', stockRes.stockInicial, stockRes.ingresos, stockRes.ventas, stockRes
            .stockFinal);
        cargarStockDesdeLocalStorage('chuleta_cerdo', stockCerdo.stockInicial, stockCerdo.ingresos, stockCerdo.ventas,
            stockCerdo.stockFinal);
        cargarStockDesdeLocalStorage('chorizos', stockChorizos.stockInicial, stockChorizos.ingresos, stockChorizos.ventas,
            stockChorizos.stockFinal);

        // Actualización de stock y almacenamiento en localStorage
        document.getElementById('stockForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const tipoMovimiento = document.getElementById('tipoMovimiento').value;
            const producto = document.getElementById('producto').value;
            const cantidad = parseInt(document.getElementById('cantidad').value);

            let stockInicial, ingresos, ventas, stockFinal;

            if (producto === 'chuleta_cerdo') {
                stockInicial = stockCerdo.stockInicial;
                ingresos = stockCerdo.ingresos;
                ventas = stockCerdo.ventas;
                stockFinal = stockCerdo.stockFinal;
            } else if (producto === 'pierna_pollo') {
                stockInicial = stockPollo.stockInicial;
                ingresos = stockPollo.ingresos;
                ventas = stockPollo.ventas;
                stockFinal = stockPollo.stockFinal;
            } else if (producto === 'pierna_res') {
                stockInicial = stockRes.stockInicial;
                ingresos = stockRes.ingresos;
                ventas = stockRes.ventas;
                stockFinal = stockRes.stockFinal;
            } else if (producto === 'chorizos') {
                stockInicial = stockChorizos.stockInicial;
                ingresos = stockChorizos.ingresos;
                ventas = stockChorizos.ventas;
                stockFinal = stockChorizos.stockFinal;
            }

            if (tipoMovimiento === 'ingreso') {
                ingresos.textContent = parseInt(ingresos.textContent) + cantidad;
                stockFinal.textContent = parseInt(stockFinal.textContent) + cantidad;
            } else if (tipoMovimiento === 'venta') {
                ventas.textContent = parseInt(ventas.textContent) + cantidad;
                stockFinal.textContent = parseInt(stockFinal.textContent) - cantidad;
            }

            guardarStockEnLocalStorage(producto, stockInicial, ingresos, ventas, stockFinal);
        });

        // Cambia las opciones del select cuando se selecciona "Plato"
        const tipoRadios = document.querySelectorAll('input[name="tipo"]');
        const productoSelect = document.getElementById('producto');

        tipoRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (radio.value === 'plato') {
                    productoSelect.innerHTML = `
        <label for="producto">Producto</label>
        <select id="producto" name="producto">
            @foreach ($platos as $plato)
                <option value="{{ $plato->id }}">{{ $plato->nombre }}</option>
            @endforeach
        </select>
    `;
                } else {
                    productoSelect.innerHTML = `
                        <label for="producto">Producto</label>
        <select id="producto" name="producto">
            @foreach ($insumos as $insumo)
                <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
            @endforeach
        </select>
                    `;
                }
            });
        });

        // Actualiza stock de chorizos si se selecciona "Porción de chorizo x3"
        document.getElementById('stockForm').addEventListener('submit', function(event) {
            const producto = document.getElementById('producto').value;
            const cantidad = parseInt(document.getElementById('cantidad').value);

            if (producto === 'porcion_chorizo_x3') {
                const chorizosNecesarios = cantidad * 3;

                if (parseInt(stockChorizos.stockFinal.textContent) >= chorizosNecesarios) {
                    stockChorizos.ventas.textContent = parseInt(stockChorizos.ventas.textContent) +
                        chorizosNecesarios;
                    stockChorizos.stockFinal.textContent = parseInt(stockChorizos.stockFinal.textContent) -
                        chorizosNecesarios;
                    guardarStockEnLocalStorage('chorizos', stockChorizos.stockInicial, stockChorizos.ingresos,
                        stockChorizos.ventas, stockChorizos.stockFinal);
                } else {
                    alert('No hay suficiente stock de chorizos.');
                    event.preventDefault(); // Evita que el formulario se procese si no hay stock suficiente
                }
            }
            verificarStockBajo();
        });
    </script>
</body>

</html>
