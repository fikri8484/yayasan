<header id="header" class="header-effect-shrink bg-color-secondary" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body bg-color-secondary">
        <div class="header-container container bg-color-secondary">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="index.html">
                                <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="{{ url('img/logo.png') }}" />
                            </a>
                        </div>

                        <div class="header-nav-features header-nav-features-no-border w-75 w-auto-mobile d-none d-sm-flex">
                            <form role="search" class="d-flex w-100" action="page-search-results.html" method="get">
                                <div class="simple-search input-group w-100">
                                    <input class="form-control border-0" id="headerSearch" name="q" type="search" value="" placeholder="Cari Donasi..." />
                                    <span class="input-group-append bg-light border-0">
                                        <button class="btn" type="submit">
                                            <i class="fa fa-search header-nav-top-icon"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a class="dropdown-item {{ request()->is('/') ? 'active' : '' }}" href="/">
                                                Beranda
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ request()->is('galeri') ? 'active' : '' }}" href="/galeri">
                                                Galeri
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ request()->is('kegiatan') ? 'active' : '' }}" href="/kegiatan">
                                                Kegiatan
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ request()->is('tentang') ? 'active' : '' }}" href="/tentang">
                                                Tentang
                                            </a>
                                        </li>

                                        @guest
                                        <li>
                                            <a class="dropdown {{ request()->is('login') ? 'active' : '' }}" href="/login"> <i class="far fa-user mr-1" href="/login" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';"></i>
                                                Login/Register
                                            </a>
                                        </li>
                                        @endguest


                                        @auth
                                        <li>
                                            <a class="dropdown {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard"> <i class="far fa-user mr-1" href="/dashboard" type="button" onclick="event.preventDefault(); location.href='{{ url('dashboard') }}';"></i>
                                                Dashboard
                                            </a>
                                        </li>

                                        @endauth


                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                            <a href="/donasi" class="btn btn-primary">Donasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>