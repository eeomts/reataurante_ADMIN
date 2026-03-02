<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin — Cadastro</title>
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
                            <h1>Criar Conta</h1>
                            <p class="account-subtitle">Preencha os dados para criar seu acesso.</p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="form-group form-focus {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                    <input type="text" name="name" class="form-control floating" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <label class="focus-label">Nome</label>
                                </div>

                                <div class="form-group form-focus {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    <input type="email" name="email" class="form-control floating" value="{{ old('email') }}" autocomplete="email">
                                    <label class="focus-label">E-mail</label>
                                </div>

                                <div class="form-group form-focus {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                    <input type="password" name="password" class="form-control floating" autocomplete="new-password">
                                    <label class="focus-label">Senha</label>
                                </div>

                                <div class="form-group form-focus">
                                    <input type="password" name="password_confirmation" class="form-control floating" autocomplete="new-password">
                                    <label class="focus-label">Confirmar Senha</label>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                        Cadastrar
                                    </button>
                                </div>
                            </form>

                            <div class="row form-row login-foot mt-3">
                                <div class="col-12 text-center">
                                    <span>Já tem conta? </span>
                                    <a class="forgot-link" href="{{ route('login') }}">Faça login</a>
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