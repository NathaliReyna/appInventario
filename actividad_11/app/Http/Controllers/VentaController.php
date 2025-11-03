<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad_vendida' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->producto_id);

        if ($producto->cantidad < $request->cantidad_vendida) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        // Calcular total y guardar venta
        $total = $producto->precio * $request->cantidad_vendida;

        Venta::create([
            'producto_id' => $producto->id,
            'cantidad_vendida' => $request->cantidad_vendida,
            'total' => $total,
        ]);

        // Descontar del inventario
        $producto->cantidad -= $request->cantidad_vendida;
        $producto->save();

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }
}
