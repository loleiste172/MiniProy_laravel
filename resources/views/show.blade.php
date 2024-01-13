<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detalles del Producto</title>
  <!-- Agrega el enlace al CSS de Bootstrap -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <!-- Nombre del producto -->
      <h5 class="card-title">Nombre del producto: {{$product->name}}</h5>

      <!-- Precio del producto -->
      <p class="card-text">Precio: ${{$product->price}}</p>

      <!-- Última modificación -->
      <p class="card-text">Modificado por última vez: {{$product->updated_at}}</p>
    </div>
  </div>
</div>


</body>
</html>
