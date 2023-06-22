<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->role }}</a>
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
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="nav-icon bi bi-phone-vibrate-fill"></i>
                    <p>
                        {{ __('Devices') }}
                    </p>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item text-dark" href="{{ route('devices.devices') }}">Installed Devices</a>
                    <a class="dropdown-item text-dark" href="/addDevice">Add Device</a>
                    <a class="dropdown-item text-dark" href="/deviceStatus">Device Status</a>
                    <a class="dropdown-item text-dark" href="/addDeviceStatus">Update Status</a>
                    <a class="dropdown-item text-dark" href="/ViewOnMap">View On Map</a>
                    <a class="dropdown-item text-dark" href="/openValve">Open Valve</a>
                </div>
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
