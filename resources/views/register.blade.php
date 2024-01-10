<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Crear una nueva cuenta</title>
</head>
<body>
    <div id="card_login">
        
        <form action="{{ route('store') }}" method="POST">
     
            @csrf
            @method('POST')
            <h3>Crea tu cuenta</h3>
            <!-- Username input -->
            <div class="form-outline mb-4">
                <input type="text" id="formUsernameInput" class="form-control" name="name" placeholder="Nombre de usuario"/>
                <label class="form-label" for="formUsernameInput">Nombre de usuario</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="formEmailInput" class="form-control" name="email" placeholder="E-mail"/>
                <label class="form-label" for="formEmailInput">Correo electronico</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="formPassword" class="form-control" name="password" placeholder="Contraseña"/>
                <label class="form-label" for="formPassword">Contraseña</label>
            </div>


            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 col d-flex justify-content-center">Crear cuenta</button>
            
        </form>
    </div>
    <!-- <h1>Bienvenido</h1>
    <form action="/register-user" method="post">
        <label>Nombre
            <input type="text" name="name" id="" placeholder="Nombre">
        </label>
        <label>Email
            <input type="email" name="email" placeholder="E-mail">
        </label>
        <label>Contraseña 
            <input type="password" name="password" placeholder="Constraseña">
        </label>
        <button>Ingresar</button>
    </form> -->
</body>
</html>