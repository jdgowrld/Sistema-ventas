<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;

Route::get('categorias',[CategoriaController::class,'getCategorias'])
->name('getcategorias');

Route::post('create/categoria',[CategoriaController::class,'createCategoria'])
->name('categoria.create');

Route::put("update/categoria/{id}",[CategoriaController::class,'updateCategoria'])
->name('categoria.update');

Route::delete("delete/categoria/{id}",[CategoriaController::class,'deleteCategoria'])
->name('categoria.delete');


//PRODUCTOS

Route::get("productos",[ProductoController::class,'getproducto'])
->name("productos.index");

Route::post("productos/create",[ProductoController::class,'createProducto'])
->name("producto.create");

Route::put("productos/update/{id}",[ProductoController::class,'updateProducto'])
->name("producto.update");

Route::delete("productos/delete/{id}",[ProductoController::class,'deleteProducto'])
->name("producto.delete");

// CLIENTES

Route::get("clientes",[ClienteController::class,'getClientes'])
->name("clientes.index");

Route::post("clientes/create",[ClienteController::class,'createCliente'])
->name("cliente.create");

Route::put("clientes/update/{id}",[ClienteController::class,'updateCliente'])
->name("cliente.update");

Route::delete("clientes/delete/{id}",[ClienteController::class,'deleteCliente'])
->name("cliente.delete");

// VENTAS

Route::get("ventas", [VentaController::class, 'getVentas'])
->name("ventas.index");

Route::post("ventas/create", [VentaController::class, 'createVenta'])
->name("venta.create");

Route::put("ventas/update/{id}", [VentaController::class, 'updateVenta'])
->name("venta.update");

Route::delete("ventas/delete/{id}", [VentaController::class, 'deleteVenta'])
->name("venta.delete");