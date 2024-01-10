
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <title>Login</title>
     <!-- Fonts -->
  
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="card_login">
        <form action="/login-user">
            <h3>Ingresa a tu cuenta</h3>
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

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Recuerdame </label>
                </div>
                </div>

                <div class="col">
                <!-- Simple link -->
                <a class="disabled" href="#!" style="pointer-events: none;">¿Olvidaste tu contraseña?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4 col d-flex justify-content-center">Ingresar</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>¿No tienes una cuenta? <a href="#!">Registrate</a></p>
            </div>
        </form>
    </div>

    <!-- <h1>Bienvenido de vuelta!</h1>
    <div>
        <form action="/login" method="post">
            <label>Email
                <input type="email" name="email" placeholder="E-mail">
            </label>
            <label>Contraseña 
                <input type="password" name="password" placeholder="Constraseña">
            </label>
        </form>
    </div> -->
</body>
</html>