@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Venta</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Producto</label>
            <select name="producto_id" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }} (Stock: {{ $producto->cantidad }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cantidad vendida</label>
            <input type="number" name="cantidad_vendida" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Registrar Venta</button>
    </form>
</div>
@endsection
