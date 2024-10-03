<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Stock</title>
    <link rel="stylesheet" href="{{asset('css/styles-demo.css')}}">
</head>
<body>
    <header>
        <div class="header-left">
            <span>Martes 1 de Octubre</span>
            <span>2:30 pm</span>
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
            <form>
                <label for="tipoMovimiento">Selecciona Ingreso o Venta</label>
                <select id="tipoMovimiento">
                    <option value="ingreso">Ingreso</option>
                    <option value="venta">Venta</option>
                </select>

                <label for="tipoItem">Selecciona el tipo</label>
                <div class="radio-buttons">
                    <label><input type="radio" name="tipo" value="insumo" checked> Insumo</label>
                    <label><input type="radio" name="tipo" value="plato"> Plato</label>
                </div>

                <label for="producto">Producto</label>
                <select id="producto">
                    <option value="pierna_pollo">Pierna de Pollo</option>
                    <option value="pierna_res">Pierna de Res</option>
                    <option value="chuleta_cerdo">Chuleta de cerdo</option>
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
                        <td>50</td>
                        <td>10</td>
                        <td>10</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>Pierna de Res</td>
                        <td>10</td>
                        <td>10</td>
                        <td>15</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Chuleta de cerdo</td>
                        <td>20</td>
                        <td>10</td>
                        <td>2</td>
                        <td>28</td>
                    </tr>
                </tbody>
            </table>
            <a href="#">Ver tabla completa</a>
        </div>

        <div class="alerta">
            <p>¡Alerta! El stock de <strong>"Pierna de Res"</strong> está bajo</p>
        </div>
    </main>
</body>
</html>
