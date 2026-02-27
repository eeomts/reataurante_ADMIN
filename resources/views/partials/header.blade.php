<div class="header">

    <!-- Logo + Toggles -->
    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo">
            <span style="font-size:1.3rem;font-weight:700;color:#fff;">Restaurante</span>
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-small">
            <span style="font-size:1.1rem;font-weight:700;color:#fff;">R</span>
        </a>
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="feather-chevrons-left"></i>
        </a>
        <a class="mobile_btn" id="mobile_btn">
            <i class="feather-menu"></i>
        </a>
    </div>

    <!-- Search -->
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Buscar...">
            <button class="btn" type="submit"><i class="feather-search"></i></button>
        </form>
    </div>

    <!-- Header Right -->
    <ul class="nav user-menu">

        <!-- Notificações -->
        <li class="nav-item dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="feather-bell"></i>
                <span class="badge badge-pill">0</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notificações</span>
                    <a href="javascript:void(0)" class="clear-noti">Limpar</a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message text-center py-3">
                            <span class="text-muted">Nenhuma notificação.</span>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="javascript:void(0);">Ver todas</a>
                </div>
            </div>
        </li>

        <!-- Usuário logado -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <span class="avatar-title rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width:32px;height:32px;font-size:.85rem;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                    <span class="status online"></span>
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="px-3 py-2 border-bottom">
                    <p class="mb-0 fw-semibold">{{ auth()->user()->name }}</p>
                    <small class="text-muted">{{ auth()->user()->email }}</small>
                </div>
                <a class="dropdown-item" href="#">
                    <i data-feather="user" class="me-1"></i> Perfil
                </a>
                <a class="dropdown-item" href="#">
                    <i data-feather="settings" class="me-1"></i> Configurações
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i data-feather="log-out" class="me-1"></i> Sair
                    </button>
                </form>
            </div>
        </li>

    </ul>

</div>
