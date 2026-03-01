<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin — Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">

                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Bem-vindo</h1>
                            <p class="account-subtitle">Faça login para acessar o painel administrativo.</p>

                            {{-- Erros de validação --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="form-group form-focus {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control floating"
                                        value="{{ old('email') }}"
                                        autocomplete="email"
                                        autofocus
                                    >
                                    <label class="focus-label">E-mail</label>
                                </div>

                                <div class="form-group form-focus {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control floating"
                                        autocomplete="current-password"
                                    >
                                    <label class="focus-label">Senha</label>
                                </div>

                                <div class="form-group">
                                    <label class="custom_check">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span> Lembrar-me
                                    </label>
                                </div>

                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                    Entrar
                                </button>

                                <div class="row form-row login-foot mt-3">
                                    <div class="col-lg-6 login-forgot">
                                        <a class="forgot-link" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

</body>
</html>
