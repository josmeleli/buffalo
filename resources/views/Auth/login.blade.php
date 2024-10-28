<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('css/style-login.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="login-reg-panel">
		<div class="login-info-box">
			<h4>Eres Administrador</h4>
			<p>Ingresa Aquí</p>
			<a href="{{route('admin.login')}}" class="admin">Ir</a>

            <h4>¿Ya tienes Cuenta?</h4>
			<p>Ingresa Aquí</p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>

		<div class="register-info-box">
			<h2>¿No tienes un Cuenta?</h2>
			<p>Registrate aqui </p>
			<label id="label-login" for="log-login-show">Register</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>

		<div class="white-panel">
			<div class="login-show">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <h2>LOGIN</h2>
                    <input type="text" placeholder="Email" name="email" :value="{{ old('email') }}" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="submit" value="Login">
                </form>
			</div>
			<div class="register-show">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <h2>REGISTER</h2>
                    <input type="text" placeholder="Nombre" name="name" value="{{ old('name') }}" required>
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
                    <select name="id_local" required>
                        @foreach ($locales as $local)
                            <option value="{{ $local->id }}">{{ $local->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Register">
                </form>
			</div>
		</div>
	</div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/login.js')}}"></script>
</body>
</html>
