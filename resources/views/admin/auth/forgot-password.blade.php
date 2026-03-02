<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin — Esqueci a Senha</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">

                <div class="text-center mb-4">
                    <img src="/storage/logos/logo-sembg.png" alt="Logo" style="max-height: 80px; filter: invert(1); display: block; margin: 0 auto;">
                </div>

                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Esqueceu a senha?</h1>
                            <p class="account-subtitle">Digite seu e-mail para receber o link de redefinição de senha.</p>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf

                                <div class="form-group form-focus">
                                    <input type="email" name="email" class="form-control floating" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    <label class="focus-label">E-mail</label>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                        Enviar link de redefinição
                                    </button>
                                </div>
                            </form>

                            <div class="row form-row login-foot mt-3">
                                <div class="col-lg-6 login-forgot">
                                    <a class="forgot-link" href="{{ route('login') }}">Voltar ao login</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>