<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <!-- <img src="{{ url('backend/dist/assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle"> -->
                <span class="pro-user-name ml-1">
                    Admin <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->


                <!-- item-->

                <!-- item-->

                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                        <button class="btn btn-primary" type="submit"><i class="fe-log-out">Logout</button></i>
                        <!-- <span>Logout</span> -->

                    </a>
                </form>


            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box pt-2">
        <a href="/admin" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ url('img/logo11.png') }}" alt="" height="50">
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <img src="{{ url('backend/dist/assets/images/logo-sm.png') }}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

    </ul>
</div>