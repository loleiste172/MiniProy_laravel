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

          <h2 class="mb-4">Editar Usuario</h2>

          <form action="{{ route('a-edit-user', $user) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="name" required value="{{$user->name}}">
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email" required value="{{$user->email}}">
            </div>

            <div class="form-group">
              <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena" placeholder="Ingrese su contraseña" name="password" required>
            </div>

            <div class="form-group"><!-- TODO: hacer que aca se seleccione el verdadero dependiendo usuario -->
              <label for="rol">Rol:</label>
              <select class="form-control" id="rol" required name="rol">
                <option @if($rol=='Admin') selected @endif value="Admin">Administrador</option>
                <option value="Ventas" @if($rol=='Ventas') selected @endif>Ventas</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Editar Usuario</button>
          </form>

        </div>
      </div>
    </div>

</body>