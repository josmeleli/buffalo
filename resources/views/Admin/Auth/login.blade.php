<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="{{asset('css/style-login.css')}}">
</head>
<body>
    <div class="container">
        <div class="screen">

            <div class="screen__content">
                <!-- Laravel authentication form -->
                <form method="POST" action="{{ route('login') }}" class="login">
                    @csrf
                    <!-- Email Field -->
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="email" type="email" class="login__input" name="email" value="{{ old('email') }}" required autofocus placeholder="User name / Email">
                    </div>
                    <!-- Password Field -->
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" type="password" class="login__input" name="password" required placeholder="Password">
                    </div>

                    <!-- Submit Button -->
                    <button class="button login__submit">
                        <span class="button__text">Iniciar Sesión</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>
</html>
