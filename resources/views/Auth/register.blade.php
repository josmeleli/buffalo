<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">

    <title>Responsive Register Form</title>
  </head>
  <body>
    <div class="container">
      <div class="login">
        <div class="login__content">
          <form method="POST" action="{{ route('register') }}" class="login__form">
            @csrf
            <div>
              <h1 class="login__title">
                <span>Regístrate</span>
              </h1>
            </div>

            <div>
              <div class="login__inputs">
                <div>
                  <label for="name" class="login__label">Nombre</label>
                  <input class="login__input" type="text" id="name" name="name" placeholder="Ingresa tu nombre" required />
                </div>

                <div>
                  <label for="email" class="login__label">Correo</label>
                  <input class="login__input" type="email" id="email" name="email" placeholder="Ingresa tu correo" required />
                </div>

                <div>
                  <label for="password" class="login__label">Contraseña</label>
                  <div class="login__box">
                    <input class="login__input" type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required />
                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                  </div>
                </div>

                <div>
                  <label for="password_confirmation" class="login__label">Confirmar Contraseña</label>
                  <div class="login__box">
                    <input class="login__input" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirma tu contraseña" required />
                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <div class="login__buttons">
                <button type="submit" class="login__button">Registrarse</button>
                <a href="{{ route('login') }}" class="login__button login__button-ghost">Iniciar Sesión</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!--=============== MAIN JS ===============-->
  <script src="./assets/js/main.js"></script>
  </body>
</html>