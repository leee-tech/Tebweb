<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
            <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item dropdown has-divider">
                <a class="navbar-link">
                    <span class="icon"><i class="mdi mdi-menu"></i></span>
                    <span>Sample Menu</span>
                    <span class="icon">
            <i class="mdi mdi-chevron-down"></i>
          </span>
                </a>
                <div class="navbar-dropdown">
                    <a href="profile.html" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>My Profile</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-settings"></i></span>
                        <span>Settings</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Messages</span>
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>
            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">

                    <div class="is-user-name"><span>{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="profile.html" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>My Profile</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-settings"></i></span>
                        <span>Settings</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Messages</span>
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>
            <a href="https://justboil.me/tailwind-admin-templates" class="navbar-item has-divider desktop-icon-only">
                <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                <span>About</span>
            </a>
            <a href="https://github.com/justboil/admin-one-tailwind" class="navbar-item has-divider desktop-icon-only">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>GitHub</span>
            </a>
            <a title="Log out" class="navbar-item desktop-icon-only">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log out</span>
            </a>
        </div>
    </div>
</nav>

<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Admin <b class="font-black">One</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="{{request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Management</p>
        <ul class="menu-list">
            <li class="{{request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'active' : '' }}">
                <a href="{{route('doctors.index')}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Doctor Management</span>
                </a>
            </li>
            <li class="{{request()->is('admin/patients') || request()->is('admin/patients/*') ? 'active' : '' }}">
                <a href="{{route('patients.index')}}">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Patient Management</span>
                </a>
            </li>
            <li class="{{request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active' : '' }}">
                <a href="{{route('departments.index')}}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Department Management</span>
                </a>
            </li>
            <li class="--set-active-profile-html">
                <a href="profile.html">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Category Management</span>
                </a>
            </li>
            <li>
                <a href="login.html">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    <span class="menu-item-label">Login</span>
                </a>
            </li>
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Submenus</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    <li>
                        <a href="#void">
                            <span>Sub-item One</span>
                        </a>
                    </li>
                    <li>
                        <a href="#void">
                            <span>Sub-item Two</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
                <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
                    <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                    <span class="menu-item-label">Premium Demo</span>
                </a>
            </li>
            <li>
                <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">GitHub</span>
                </a>
            </li>
        </ul>
    </div>
</aside>