<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">

        <div class="sidebar-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('storage/logos/logo-sembg.png') }}" alt="Logo" style="max-height:40px; filter: invert(1);">
            </a>
        </div>

        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Painel</span></li>

                <li class="{{ $activeMenu === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> <span>Usuários</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'categories' ? 'active' : '' }}">
                    <a href="#">
                        <i class="bi bi-tags"></i> <span>Categorias</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'reports' ? 'active' : '' }}">
                    <a href="#">
                        <i class="bi bi-bar-chart"></i> <span>Relatórios</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'roles' ? 'active' : '' }}">
                    <a href="#">
                        <i class="bi bi-shield-check"></i> <span>Cargos</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="sidebar-footer">
            <ul>
                <li class="{{ $activeMenu === 'settings' ? 'active' : '' }}">
                    <a href="#">
                        <i class="bi bi-gear"></i> <span>Configurações</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <i class="bi bi-box-arrow-left"></i> <span>Sair</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</div>
