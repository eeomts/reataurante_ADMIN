<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>

                <li class="{{ $activeMenu === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="home"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i data-feather="users"></i> <span>Usuários</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'categories' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="copy"></i> <span>Categorias</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'reports' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="pie-chart"></i> <span>Relatórios</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'roles' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="clipboard"></i> <span>Cargos</span>
                    </a>
                </li>

                <li class="{{ $activeMenu === 'settings' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="settings"></i> <span>Configurações</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
