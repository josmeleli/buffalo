<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('css/style-login.css')}}">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" action="{{ route('register') }}" class="login">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" id="name" name="name" :value="{{ __('Name') }}" required autofocus placeholder="Name">
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-envelope"></i>
                        <input type="email" class="login__input" id="email" name="email" :value="{{ __('Email') }}" required placeholder="User name / Email">
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" id="password" name="password" required placeholder="Password" :value="{{ __('Password') }}">
                    </div>

                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" id="password_confirmation" :value="{{ __('Confirm Password') }}" name="password_confirmation" required placeholder="Confirm Password">
                    </div>

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

                    <button class="button login__submit">
                        <span class="button__text">Register</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>

                <div class="social-login">
                    <a href="{{ route('login') }}" class="social-login__icon">Login</a>
                </div>
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