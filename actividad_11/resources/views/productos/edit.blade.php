<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos/editar.css') }}">
</head>
<body>
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br><br>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ $producto->descripcion }}</textarea><br><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="{{ $producto->cantidad }}" required><br><br>

        <button type="submit">Actualizar</button>
        <a class="volver" href="{{ route('productos.index') }}">Volver</a>
    </form>

    <br>
    
</body>
</html>
