<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>insumos</h1>
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

</body>

</html>