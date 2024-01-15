<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir usuario</title>
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <h2 class="mb-4">Agregar Usuario</h2>

          <form action="{{ route('a-add-user') }}" method="post">
            @csrf
            
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="name" required>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email" required>
            </div>

            <div class="form-group">
              <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena" placeholder="Ingrese su contraseña" name="password" required>
            </div>

            <div class="form-group">
              <label for="rol">Rol:</label>
              <select class="form-control" id="rol" required name="rol">
                <option value="Admin">Administrador</option>
                <option value="Ventas" selected>Ventas</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
          </form>

        </div>
      </div>
    </div>

</body>