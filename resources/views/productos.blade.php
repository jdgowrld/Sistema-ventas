<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Productos</title>
</head>
<body class="bg-light">
    
    <x-navbar />

    <div class="container mt-4">
        <h1 class="text-center mb-4">Inventario de Productos</h1>
        
        <!-- Botón para Registrar -->
        <div class="row mb-3">
            <div class="col-lg-10 offset-lg-1">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Nuevo Producto
                </button>
            </div>
        </div>

        <!-- Tabla dinámica -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <table class="table table-bordered bg-white shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->producto }}</td>
                            <td>${{ $i->precio }}</td>
                            <td>{{ $i->stock }}</td>
                            <td>{{ $i->nombre_categoria }}</td>
                            <td>
                            
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$i->id}}">Actualizar</button>
                                
                              
                                <form action="{{ route('producto.delete', $i->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                          
                                <div class="modal fade" id="editModal{{$i->id}}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Actualizar Producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-start">
                                        <form action="{{ route('producto.update', $i->id) }}" method="POST">
                                        @csrf
                                     @method('PUT')
                                        <div class="mb-3">
                                            <label>Nombre del Producto</label>
                                            <input type="text" name="inputProducto" class="form-control" value="{{ $i->producto }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Precio</label>
                                            <input type="number" step="0.01" name="inputPrecio" class="form-control" value="{{ $i->precio }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Stock</label>
                                            <input type="number" name="inputStock" class="form-control" value="{{ $i->stock }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>ID de la Categoría</label>
                                            
                                            <input type="number" name="inputCategoria_id" class="form-control" value="{{ $i->categoria_id }}" required>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-warning">Actualizar</button>
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL DE REGISTRAR NUEVO -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Registrar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            <form action="{{ route('producto.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nombre del Producto</label>
                    <input type="text" name="inputProducto" class="form-control" placeholder="Ej. Coca Cola">
                </div>
                <div class="mb-3">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="inputPrecio" class="form-control" placeholder="Ej. 15.50">
                </div>
                <div class="mb-3">
                    <label>Stock</label>
                    <input type="number" name="inputStock" class="form-control" placeholder="Ej. 100">
                </div>
                <div class="mb-3">
                    <label>ID de la Categoría</label>
                    <input type="number" name="inputCategoria_id" class="form-control" placeholder="Asegúrate que exista el ID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</body>
</html>