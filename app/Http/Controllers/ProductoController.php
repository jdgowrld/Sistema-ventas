<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class ProductoController extends Controller
{
   public function getproducto(){
        $productos = Producto::select(
            'productos.id',
            'productos.producto',
            'productos.precio',
            'productos.stock',
            'productos.categoria_id as categoria_id', 
            'categoria.Categoria as nombre_categoria' 
        )->join('categoria','productos.categoria_id','=','categoria.id')
        ->get();
        
        return view('productos', compact('productos'));
    }

    public function createProducto (Request $request){
    $request->validate([
    "inputProducto" =>'required',
    "inputPrecio" =>'required',
    "inputStock" =>'required',
    "inputCategoria_id" =>'required',
    ]);

    Producto::create([
        "producto" => $request ->inputProducto,
        "precio" => $request ->inputPrecio,
        "stock" => $request ->inputStock,
       "categoria_id" => $request->inputCategoria_id, 
    ]);

    return redirect("/productos")->with([
        "mensaje" => " Producto registrado "
    ]);

    }

    public function updateProducto(int $id, Request $request){
        $producto = Producto::where("id", "=", $id)->first(); 
        
        $producto->update([
            "producto" => $request->inputProducto,
            "precio" => $request->inputPrecio,
            "stock" => $request->inputStock,
            "categoria_id" => $request->inputCategoria_id 
        ]);

        return redirect("/productos")->with([
            "mensaje" => "Producto actualizado."
        ]);
    }
    
public function deleteProducto(int $id){
    $producto = producto::find($id);
    $producto ->delete();

    return redirect("/productos")->with([
        "mensaje" => "producto actualizado"
    ]);
}

}
