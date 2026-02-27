<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Restaurante</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>

<div class="main-wrapper">

    {{-- Header --}}
    @include('partials.header')

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Conteúdo principal --}}
    <div class="page-wrapper">
        <div class="content container-fluid">

            {{-- Page Header (título + breadcrumb) --}}
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">@yield('page-title')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Home</a>
                            </li>
                            @yield('breadcrumb')
                        </ul>
                    </div>
                    <div class="col-auto">
                        @yield('page-actions')
                    </div>
                </div>
            </div>

            {{-- Alertas de sessão --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Conteúdo da página --}}
            @yield('content')

        </div>
    </div>

</div>

@stack('scripts')
</body>
</html>
