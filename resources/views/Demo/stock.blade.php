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

            <form action="{{ route('localinsumos.store') }}" method="POST">
                @csrf

                <label for="local">Local</label>
                <select id="local" name="id_local">
                    @foreach($locals as $local)
                    <option value="{{ $local->id }}">{{ $local->nombre }} {{ $local->direccion }}</option>
                    @endforeach
                </select>

                <label for="insumo">Insumo</label>
                <select id="insumo" name="id_insumo">
                    @foreach($insumos as $insumo)
                    <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                    @endforeach
                </select>

                <label for="cantidad">Stock</label>
                <input type="number" id="cantidad" name="stock" value="1" min="1">

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