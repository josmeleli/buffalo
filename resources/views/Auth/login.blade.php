<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('css/Admin/login-style.css')}}">
    <title>Login</title>
</head>
<body>

    <div class="login-reg-panel">
		<div class="login-info-box">
			<h2>¿Ya tienes una Cuenta?</h2>
			<p>Ingresa Aquí</p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>

		<div class="register-info-box">
			<h4>¿Eres Administrador?</h4>
			<p>Ingresa Aquí </p>
            <a href="{{route('admin.login')}}" class="buttom-admin">Administrador</a>

            <h4>¿No tienes Cuenta?</h4>
			<p>Ingresa Aquí </p>
			<label id="label-login" for="log-login-show">Registrate</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>

		<div class="white-panel">
			<div class="login-show">
				<h2>LOGIN</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit"value="Login">
                    <a href="" class="reset-password">Forgot password?</a>
                </form>
			</div>

			<div class="register-show">
				<h2>REGISTER</h2>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <input type="text" name="name" :value="{{ __('Name') }}" placeholder="Name" required>
                    <input type="email" name="email" :value="{{ __('Email') }}" placeholder="Email" required>
                    <input type="password" name="password" :value="{{ __('Password') }}" placeholder="Password" required>
                    <input type="password" name="password_confirmation" :value="{{ __('Confirm Password') }}" placeholder="Confirm Password" required>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="login__field">
                            <label for="terms" class="flex items-center">
                                <input type="checkbox" name="terms" id="terms" required>
                                <span class="ms-2 text-sm">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </span>
                            </label>
                        </div>
                    @endif
                    <input type="submit" value="Register">
                </form>
			</div>
		</div>
	</div>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/Admin/login.js')}}"></script>
</body>
</html>
