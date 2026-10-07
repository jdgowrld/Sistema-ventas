<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function getCategorias(){
        //select * from categorias;
        $Categoria = Categoria::all();

        return view('Categoria',compact('Categoria'));
    }

    public function createCategoria(Request $request){
        
        $request->validate([
            "Categoria" => "required"
        ]);

        $Categoria = Categoria::create([
            "Categoria" => $request -> Categoria
        ]);

        return redirect("/categorias")->with(["mensaje" =>"categoria registrada"]);


    }
}
