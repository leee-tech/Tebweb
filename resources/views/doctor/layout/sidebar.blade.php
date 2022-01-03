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
                    <a href="{{route('doctor.profile.edit')}}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>My Profile</span>
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
            Doctor <b class="font-black">TebWeb</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">Management</p>
        <ul class="menu-list">
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Appointments</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('appointments.create')}}">
                            <span>Appointment Time</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('appointments.index')}}">
                            <span>Check Appointments</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'active' : '' }}">
                <a href="{{route('appointments.my-book-doctor',['date'=>date('Y-m-d')])}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Today Appointment</span>
                </a>
            </li>
            <li class="{{request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'active' : '' }}">
                <a href="{{route('appointments.my-book-doctor')}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">All Appointment</span>
                </a>
            </li>

        </ul>

    </div>
</aside>
