<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Clientes</title>
</head>
<body class="bg-light">
    <x-navbar />

    <div class="container mt-4">
        <h1 class="text-center mb-4">Directorio de Clientes</h1>
        
        
        @if ($errors->any())
            <div class="alert alert-danger text-center col-lg-10 offset-lg-1">
                Tuviste un error al llenar el formulario. Revisa los datos e intenta de nuevo.
            </div>
        @endif

       
        <div class="row mb-3">
            <div class="col-lg-10 offset-lg-1">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Nuevo Cliente
                </button>
            </div>
        </div>

        
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <table class="table table-bordered bg-white shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->nombre }}</td>
                            <td>{{ $i->email }}</td>
                            <td>{{ $i->direccion }}</td>
                            <td>{{ $i->telefono }}</td>
                            <td>
                                
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$i->id}}">Actualizar</button>
                                
                            
                                <form action="{{ route('cliente.delete', $i->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                               
                                <!-- MODAL DE ACTUALIZAR (Para cada fila) -->
                            
                                <div class="modal fade" id="editModal{{$i->id}}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Actualizar Cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-start">
                                        <form action="{{ route('cliente.update', $i->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="mb-3">
                                                <label>Nombre Completo</label>
                                                <input type="text" name="nombre" class="form-control" value="{{ $i->nombre }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Correo Electrónico</label>
                                                <input type="email" name="email" class="form-control" value="{{ $i->email }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Dirección</label>
                                                <input type="text" name="direccion" class="form-control" value="{{ $i->direccion }}">
                                            </div>
                                            <div class="mb-3">
                                                <label>Teléfono</label>
                                                <input type="text" name="telefono" class="form-control" value="{{ $i->telefono }}">
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
            <h5 class="modal-title">Registrar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            <form action="{{ route('cliente.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                    @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Dirección</label>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
                    @error('direccion') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                    @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
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