
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
        <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="formEmailInput" class="form-control" />
                <label class="form-label" for="formEmailInput">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="formPassword" class="form-control" />
                <label class="form-label" for="formPassword">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
                </div>

                <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
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