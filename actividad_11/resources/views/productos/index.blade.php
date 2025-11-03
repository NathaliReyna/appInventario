<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="{{ asset('css/productos/index.css') }}">
</head>
<body>
    <div class="container">
        <h1>Listado de Productos</h1>

        <a href="{{ route('productos.create') }}" class="add-product">➕ Agregar Producto</a>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>S/ {{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="edit-btn">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($productos->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No hay productos registrados aún.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

