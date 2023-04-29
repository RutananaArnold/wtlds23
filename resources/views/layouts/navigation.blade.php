<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon bi bi-menu-button-wide"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('reports_and_analytics.analytics') }}" class="nav-link">
                    <i class="nav-icon bi bi-clipboard-data"></i>
                    <p>
                        {{ __('Reports and analytics') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('devices.devices') }}" class="nav-link">
                    <i class="nav-icon bi bi-phone-vibrate-fill"></i>
                    <p>
                        {{ __('Devices') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('notifications.notifications') }}" class="nav-link">
                    <i class="nav-icon bi bi-bell"></i>
                    <p>
                        {{ __('Notifications') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('User Activity') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
