<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria; 

class CategoriaController extends Controller
{
    public function getCategorias(){
        $Categoria = Categoria::all();
        return view('Categoria', compact('Categoria'));
    }

    public function createCategoria(Request $request){
        $request->validate([
            "Categoria" => "required"
        ]);

        Categoria::create([
            "Categoria" => $request->Categoria
        ]);

        return redirect("/categorias")->with(["mensaje" => "categoria registrada"]);
    }

    public function updateCategoria($id, Request $request){
        $Categoria = Categoria::find($id);
        
        $Categoria->update([
            "Categoria" => $request->Categoria
        ]);

        return redirect("/categorias")->with(["mensaje" => "categoria actualizada"]);
    }

    public function deleteCategoria($id){
        $Categoria = Categoria::find($id);
        $Categoria->delete();
        
        return redirect("/categorias")->with(["mensaje" => "categoria eliminada"]);
    }
}