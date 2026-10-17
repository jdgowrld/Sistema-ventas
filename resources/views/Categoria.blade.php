<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Categorías</title>
</head>
<body class="bg-light">
    
    <x-navbar />

    <div class="container mt-4">
        <h1 class="text-center mb-4">Categorias</h1>
        
        <div class="row mb-3">
            <div class="col-lg-8 offset-lg-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nueva Categoria
                </button>
            </div>
        </div>

        <!-- Tabla dinámica -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <table class="table table-bordered bg-white shadow-sm">
                    <thead class="table-info">
                        <tr>
                            <th>id</th>
                            <th>categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Categoria as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->Categoria }}</td> 
                            <td>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$i->id}}">
        Actualizar
    </button>
    
    <form action="{{ route('categoria.delete', $i->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
    </form>

    <!-- MODAL PARA ACTUALIZAR (Se genera uno oculto por cada fila) -->
    <div class="modal fade" id="editModal{{$i->id}}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Actualizar Categoría</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            
            <form action="{{ route('categoria.update', $i->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <input type="text" name="Categoria" class="form-control" value="{{ $i->Categoria }}">
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

    @include('create-categoria')
</body>
</html>