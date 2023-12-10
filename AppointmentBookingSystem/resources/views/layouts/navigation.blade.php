<!-- Sidebar -->
<div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        @if (Auth::check() && Auth::user()->role === 0)
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>
                            Doctors
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('department.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-heartbeat"></i>
                        <p>
                            Department
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('schedule.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Schedule
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('doctors.trash') }}" class="nav-link">
                        <i class="nav-icon fas fa-trash-alt"></i>
                        <p>
                            Trash
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            More
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Dynamic
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('page.index') }}" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Pages</p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Menubar</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        @elseif(Auth::check() && Auth::user()->role === 1)
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('schedule.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Schedule
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('appointment_management.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Appointment
                        </p>
                    </a>
                </li>



            </ul>
        @endif
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
