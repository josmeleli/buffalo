<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">

    <title>Responsive login form</title>
  </head>
  <body>
    <div class="container">
      <div class="login">
        <div class="login__content">


          <form class="login__form">
            <div>
              <h1 class="login__title">
                <span>Bienvenido</span>
              </h1>


            </div>

            <div>
              <div class="login__inputs">
                <div>
                  <label for="email" class="login__label">Correo</label>
                  <input class="login__input" type="email" id="email" placeholder="Ingresa tu correo" required />
                </div>

                <div>
                  <label for="password" class="login__label">Contraseña</label>
                  <div class="login__box">
                    <input class="login__input" type="password" id="password" placeholder="Ingresa tu constraseña" required />
                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                  </div>
                </div>
              </div>

              <div class="login__check">
                <label class="login__check-label" for="check">
                  <input class="login__check-input" type="checkbox" id="check" />
                  <i class="ri-check-line login__check-icon"></i>
                  Recuérdame
                </label>
              </div>
            </div>

            <div>
              <div class="login__buttons">
                <button class="login__button">Ingresar</button>
                <a href="{{ route('register') }}" class="login__button login__button-ghost">Registrarse</a>
              </div>

              <a class="login__forgot" href="#">¿Olvidaste tu contraseña?</a>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!--=============== MAIN JS ===============-->
  <script src="./assets/js/main.js"></script>
  </body>
</html>
