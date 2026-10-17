<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function getClientes(){
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    public function createCliente(Request $request){
        
        // validaciones 
        $request->validate([
            "nombre" => "required|string|max:255",
            "email" => "required|email|unique:clientes,email",
            "direccion" => "required|string|max:255",
            "telefono" => "required|string|max:20"
        ]);

        Cliente::create([
            "nombre" => $request->nombre,
            "email" => $request->email,
            "direccion" => $request->direccion,
            "telefono" => $request->telefono
        ]);

        return redirect("/clientes")->with(["mensaje" => " Cliente registrado "]);
    }

    
    public function updateCliente(int $id, Request $request){
        
        $request->validate([
            "nombre" => "required|string|max:255",
            "email" => "required|email|unique:clientes,email,".$id, 
            "direccion" => "required|string|max:255",
            "telefono" => "required|string|max:20"
        ]);

        $cliente = Cliente::find($id);
        $cliente->update([
            "nombre" => $request->nombre,
            "email" => $request->email,
            "direccion" => $request->direccion,
            "telefono" => $request->telefono
        ]);

        return redirect("/clientes")->with(["mensaje" => " Cliente actualizado "]);
    }


    public function deleteCliente(int $id){
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect("/clientes")->with(["mensaje" => " Cliente eliminado "]);
    }
}
