<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos/crear.css') }}">
</head>
<body>
    <h1>Agregar Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea><br><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" required><br><br>

        <button type="submit">Guardar</button>
        <a class="volver" href="{{ route('productos.index') }}">Volver</a>
    </form>

    <br>
</body>
</html>
