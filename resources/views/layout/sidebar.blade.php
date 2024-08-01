<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="/home"><img class="main-logo" src="/img/logo/logo3.png" alt="" /></a>
            <strong><a href="/home"><img src="/img/logo/logo3.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">

            <nav class="sidebar-nav left-sidebar-menu-pro" style="margin-top: 30px">

                <ul class="metismenu" id="menu1">
                    <li class="active">
                        <a href="/home">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('calon-mahasiswa.index') }}" aria-expanded="false"><span class="educate-icon educate-course icon-wrap sub-icon-mg" aria-hidden="true"></span>
                            <span class="mini-click-non">Data Calon Mahasiswa</span>
                        </a>
                    </li>

                    <?php if (session()->has('role') && isset(session('role')['is_admin'])): ?>
                        <li>
                            <a href="/kategori" aria-expanded="false"><span class="educate-icon educate-course icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Data Kategori</span></a>
                        </li>
                        <li>
                            <a href="/arsip" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Data Arsip</span></a>
                        </li>
                        <li>
                            <a href="/staff" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Staf Marketing</span></a>
                        </li>
                        <li>
                            <a href="/riwayat" aria-expanded="false"><span class="educate-icon educate-form icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Riwayat Unduh</span></a>
                        </li>
                    <?php endif; ?>

                    <?php if (session()->has('role') && isset(session('role')['is_staff'])): ?>
                        <li>
                            <a href="/kategori" aria-expanded="false"><span class="educate-icon educate-course icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Data Kategori</span></a>
                        </li>
                        <li>
                            <a href="/arsip" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Data Arsip</span></a>
                        </li>
                        <li>
                            <a href="/riwayat" aria-expanded="false"><span class="educate-icon educate-form icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Riwayat Unduh</span></a>
                        </li>
                    <?php endif; ?>

                    <li>
                        <a href="/password" aria-expanded="false"><span class="educate-icon educate-danger icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Ganti Password</span></a>
                    </li>

                    <li>
                        <a href="/logout" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Logout</span></a>
                    </li>

                </ul>
            </nav>
        </div>
    </nav>
</div>

<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-12 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        <ul class="nav navbar-nav mai-top-nav">
                                            <li class="nav-item">
                                                <a href="/home" class="nav-link" style="display: none">SIM MARK</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <img src="<?=
                                                    session()->has('user_image')
                                                    ? session('user_image')
                                                    : "/gambar/sistem/user.png";
                                                ?>" style="width: 30px;height: 30px; object-fit:cover; object-position:center;">
                                                <span class="admin-name">
                                                    <?= session()->has('profile')
                                                        ? session('profile')['nama']
                                                        : 'User Marketing' ?>
                                                </span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                        </a>
                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li><a href="/profile"><span class="edu-icon edu-home-admin author-log-ic"></span>Profil Saya</a></li>
                                            <li><a href="/password"><span class="edu-icon edu-user-rounded author-log-ic"></span>Ganti Password</a></li>
                                            <li><a href="/logout"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li class="active">
                                <a href="/">
                                    <span class="educate-icon educate-home icon-wrap"></span>
                                    <span class="mini-click-non">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/kategori" aria-expanded="false"><span class="educate-icon educate-course icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Data Kategori</span></a>
                            </li>

                            <li>
                                <a href="/arsip" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Data Arsip</span></a>
                            </li>

                            <li>
                                <a href="/staff" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Staf Marketing</span></a>
                            </li>

                            <li>
                                <a href="/riwayat" aria-expanded="false"><span class="educate-icon educate-form icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Riwayat Unduh</span></a>
                            </li>

                            <li>
                                <a href="/password" aria-expanded="false"><span class="educate-icon educate-danger icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Ganti Password</span></a>
                            </li>

                            <li>
                                <a href="/logout" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
