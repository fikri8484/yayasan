<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <!-- <div class="user-box text-center">
            <img src="{{ url('backend/dist/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                <a href="{{ route('dashboard') }}" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Admin</a>
            </div>
        </div> -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('homeSlide.index') }}">
                        <i class="mdi mdi-google-pages"></i>
                        <span> Home Slide </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('gallery.index') }}">
                        <i class="mdi mdi-google-photos"></i>
                        <span> Gallery </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('activity.index') }}">
                        <i class="mdi mdi-view-list"></i>
                        <span> Kegiatan </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('about.index') }}">
                        <i class="mdi mdi-home-variant"></i>
                        <span> Tentang AmalJariah </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('program.index') }}">
                        <i class="mdi mdi-heart"></i>
                        <span>Program Donasi </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('development.index') }}">
                        <i class="mdi mdi-newspaper"></i>
                        <span> Berita Donasi </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-face"></i>
                        <span> Donatur </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('donatur.index') }}">Donatur Dana</a></li>
                        <li><a href="{{ route('donaturobject.index') }}">Donatur Barang</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('bank.index') }}">
                        <i class="mdi mdi-bank"></i>
                        <span> Rekening Bank </span>
                    </a> 
                </li>
                {{-- <li>
                    <a href="{{ route('contact.index') }}">
                        <i class="mdi mdi-whatsapp"></i>
                        <span> CP WhatsApp </span>
                    </a>
                </li> --}}

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>