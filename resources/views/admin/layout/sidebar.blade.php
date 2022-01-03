<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>

    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
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
                    <a class="navbar-item" href="href="{{route('logout')}}">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>


            <a title="Log out" href="{{route('logout')}}" class="navbar-item desktop-icon-only">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log out</span>
            </a>
        </div>
    </div>
</nav>

<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Admin <b class="font-black">TebWeb</b>
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
            <li class="{{request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                <a href="{{route('users.index')}}">
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
                    <span class="icon"><i class="mdi mdi-archive"></i></span>
                    <span class="menu-item-label">Department Management</span>
                </a>
            </li>
            <li class="{{request()->is('admin/hospitals') || request()->is('admin/hospitals/*') ? 'active' : '' }}">
                <a href="{{route('hospitals.index')}}">
                    <span class="icon"><i class="mdi mdi-hospital-building"></i></span>
                    <span class="menu-item-label">Hospitals Management</span>
                </a>
            </li>
            <li class="{{request()->is('admin/types') || request()->is('admin/types/*') ? 'active' : '' }}">
                <a href="{{route('types.index')}}">
                    <span class="icon"><i class="mdi mdi-format-list-bulleted-type"></i></span>
                    <span class="menu-item-label">Types Management</span>
                </a>
            </li>
            <li class="{{request()->is('admin/drugs') || request()->is('admin/drugs/*') ? 'active' : '' }}">
                <a href="{{route('drugs.index')}}">
                    <span class="icon"><i class="mdi mdi-format-list-bulleted-type"></i></span>
                    <span class="menu-item-label">Drugs Management</span>
                </a>
            </li>
            <li class="{{request()->is('admin/diseases') || request()->is('admin/diseases/*') ? 'active' : '' }}">
                <a href="{{route('diseases.index')}}">
                    <span class="icon"><i class="mdi mdi-format-list-bulleted-type"></i></span>
                    <span class="menu-item-label">Disease Management</span>
                </a>
            </li>


        </ul>

    </div>
</aside>
