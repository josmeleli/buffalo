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
    <form  method="POST" action="/insumos/store">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="nombre">
        <label for="nombre">precocido</label>
        <input type="number" id="precocido" name="precocido" placeholder="precocido">
        <label for="nombre">proporcion</label>
        <input type="number" id="proporcion" name="proporcion" placeholder="proporcion">

        <input type="submit" name="Enviar">
    </form>
    
</body>
</html>