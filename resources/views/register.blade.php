<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <form action="/register" method="post">
        <label>Nombre
            <input type="text" name="name" id="" placeholder="Nombre">
        </label>
        <label>Email
            <input type="email" name="email" placeholder="E-mail">
        </label>
        <label>Contraseña 
            <input type="password" name="password" placeholder="Constraseña">
        </label>
        
    </form>
</body>
</html>