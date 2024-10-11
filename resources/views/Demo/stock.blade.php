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
                <li><a href="/demo">INICIO</a></li>
                <li><a href="/demo/stock">CONTROL DE STOCK</a></li>
                <li><a href="#">REPORTES DE STOCK</a></li>
                <li><a href="#">CONFIGURACION</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="form-container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif
            <h4>registra insumos</h4><br>
            <form action="{{ route('insumos.store') }}" method="POST">
                @csrf
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="precocido">Precocido</label>
                <input type="number" id="precocido" name="precocido" value="0" required>

                <label for="proporcion">Proporción</label>
                <input type="number" id="proporcion" name="proporcion" value="1" required>

                <label for="stock_inicial">Stock Inicial</label>
                <input type="number" id="stock_inicial" name="stock_inicial" value="0" required>

                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" value="0" required>

                <button type="submit">Guardar</button>
            </form>
        </div>

        <div class="form-container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('platos.store') }}" method="POST">
                @csrf
                <label for="nombre">Nombre de Platos</label>
                <input type="text" id="nombre" name="nombre">
                <button type="submit">Guardar</button>
            </form>
        </div>
    </main>
</body>

</html>