<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\producto; 
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function getVentas(){
        $ventas = Venta::select('ventas.*', 'clientes.nombre as cliente_nombre')
            ->join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
            ->get();
            
        $clientes = Cliente::all();
        $productos = producto::all();

        return view('ventas', compact('ventas', 'clientes', 'productos'));
    }

    public function createVenta(Request $request){
        $request->validate([
            'cliente_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required|numeric|min:1',
            'fecha_venta' => 'required|date'
        ]);

        $producto = producto::find($request->producto_id);

        if($producto->stock < $request->cantidad){
            return redirect('/ventas')->withErrors(['stock' => '¡Error! No hay suficiente stock. Solo quedan ' . $producto->stock . ' unidades.']);
        }

        DB::transaction(function () use ($request, $producto) {
            
            $total_venta = $producto->precio * $request->cantidad;

            $venta = Venta::create([
                'cliente_id' => $request->cliente_id,
                'fecha_venta' => $request->fecha_venta,
                'estado' => 'pendiente', 
                'total' => $total_venta
            ]);

            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio,
                'total' => $total_venta
            ]);

            
            $producto->stock = $producto->stock - $request->cantidad;
            $producto->save();
        });

        return redirect('/ventas')->with(['mensaje' => 'Venta registrada con éxito.']);
    }

    
    public function updateVenta(int $id, Request $request){
        $venta = Venta::find($id);
        
        $venta->update([
            'estado' => $request->estado
        ]);

        
        if($request->estado == 'cancelada'){
            $detalle = DetalleVenta::where('venta_id', $id)->first();
            if($detalle){
                $producto = producto::find($detalle->producto_id);
                $producto->stock = $producto->stock + $detalle->cantidad;
                $producto->save();
            }
        }

        return redirect('/ventas')->with(['mensaje' => 'Estado actualizado.']);
    }

    
    public function deleteVenta(int $id){
        $venta = Venta::find($id);

        
        if($venta->estado == 'confirmada'){
            return redirect('/ventas')->withErrors(['estado' => 'No puedes eliminar una venta Confirmada.']);
        }

        $venta->delete();
        return redirect('/ventas')->with(['mensaje' => 'Venta eliminada.']);
    }
}