@extends('layouts.app')

@section('content')
<div class="ventas">
    <h2>Listado de Ventas</h2>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary">
        + Nueva Venta
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total (S/)</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->producto?->nombre ?? '—' }}</td>
                <td>{{ $venta->cantidad_vendida }}</td>
                <td>{{ number_format($venta->total, 2) }}</td>
                <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No hay ventas registradas aún.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection


