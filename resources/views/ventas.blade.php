<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Ventas</title>
</head>
<body class="bg-light">
    
    <x-navbar />

    <div class="container mt-4">
        <h1 class="text-center mb-4">Registro de Ventas</h1>

        @if ($errors->any())
            <div class="alert alert-danger text-center col-lg-10 offset-lg-1">
                @foreach ($errors->all() as $error)
                    <strong>Error!</strong> {{ $error }}<br>
                @endforeach
            </div>
        @endif

       
        @if(session('mensaje'))
            <div class="alert alert-success text-center col-lg-10 offset-lg-1">
                {{ session('mensaje') }}
            </div>
        @endif
        
        <div class="row mb-3">
            <div class="col-lg-10 offset-lg-1">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Registrar Nueva Venta
                </button>
            </div>
        </div>

        <!-- Tabla dinámica -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <table class="table table-bordered bg-white shadow-sm text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Folio Venta</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->cliente_nombre }}</td>
                            <td>{{ $v->fecha_venta }}</td>
                            <td>${{ $v->total }}</td>
                            <td>
                                <span class="badge 
                                    {{ $v->estado == 'confirmada' ? 'bg-success' : ($v->estado == 'cancelada' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                    {{ strtoupper($v->estado) }}
                                </span>
                            </td>
                            <td>
                                
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$v->id}}">Cambiar Estado</button>
                                
                             
                                <form action="{{ route('venta.delete', $v->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                             
                                <div class="modal fade" id="editModal{{$v->id}}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Actualizar Estado (Folio #{{ $v->id }})</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-start">
                                        <form action="{{ route('venta.update', $v->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label>Estado de la Venta</label>
                                                <select name="estado" class="form-control">
                                                    <option value="pendiente" {{ $v->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                    <option value="confirmada" {{ $v->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                                    <option value="cancelada" {{ $v->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                                </select>
                                                <small class="text-muted mt-2 d-block">Nota: Si cambias a Cancelada, el stock se regresará al inventario automáticamente.</small>
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

    <!-- MODAL DE REGISTRAR VENTA -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Registrar Venta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            <form action="{{ route('venta.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Cliente</label>
                    <select name="cliente_id" class="form-control" required>
                        <option value="">Selecciona un cliente...</option>
                        @foreach($clientes as $c)
                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Producto</label>
                    <select name="producto_id" class="form-control" required>
                        <option value="">Selecciona un producto...</option>
                        @foreach($productos as $p)
                            <option value="{{ $p->id }}">{{ $p->producto }} (Disponibles: {{ $p->stock }} | ${{ $p->precio }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Cantidad a Vender</label>
                    <input type="number" name="cantidad" class="form-control" min="1" placeholder="Ej. 2" required>
                </div>
                <div class="mb-3">
                    <label>Fecha de Venta</label>
                    <input type="date" name="fecha_venta" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Venta</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</body>
</html>