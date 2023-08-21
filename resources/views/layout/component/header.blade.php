<header id="header" class="header-two navbar-fixed ">
    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">

                        <div class="logo">
                            <a class="d-block" href="/">
                                <img loading="lazy" src="{{ asset('img/logo1.png') }}" >
                            </a>
                        </div>
                        <!-- logo end -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav ml-auto align-items-center">
                                @guest
                                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li>
                                <li class="nav-item {{ Request::is('tentang') ? 'active' : '' }}"><a class="nav-link" href="/tentang">Tentang</a></li>
                                <li class="nav-item {{ Request::is('alur_pendaftaran') ? 'active' : '' }}"><a class="nav-link" href="/alur_pendaftaran">Alur Pendaftaran</a></li>
                                <li class="header-get-a-quote">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">LOGIN <i class="fa fa-lock"></i></a></li>
                                </li>
                                @endguest
                                @auth
                                @if (auth()->user()->level=="user")
                                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li>
                                <li class="nav-item {{ Request::is('tentang') ? 'active' : '' }}"><a class="nav-link" href="/tentang">Tentang</a></li>
                                <li class="nav-item {{ Request::is('alur_pendaftaran') ? 'active' : '' }}"><a class="nav-link" href="/alur_pendaftaran">Alur Pendaftaran</a></li>
                                @endif
                                @if (auth()->user()->level=="admin" || auth()->user()->level=="pimpinan")
                                <li class="nav-item {{ Request::is('/dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                                @endif
                                <li class="nav-item dropdown {{ Request::is('pendaftaran*') ? 'active' : '' }}">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pendaftaran <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @if (auth()->user()->level=="user")
                                        <li><a href="/pendaftaran/create">Form Pendaftaran</a></li>
                                        @endif
                                        @if (auth()->user()->level=="admin" || "pimpinan")
                                        <li><a href="/pendaftaran">Data Pendaftaran</a></li>
                                        @endif
                                    </ul>
                                </li>
                                @if (auth()->user()->level=="admin" || auth()->user()->level== "pimpinan")
                                <li class="nav-item dropdown {{ Request::is('user*') ? 'active' : '' }} || {{ Request::is('syarat*') ? 'active' : '' }}">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Master Data <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/user">Data User</a></li>
                                        @if (auth()->user()->level == "admin")
                                        <li><a href="/syarat">Data Persyaratan</a></li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                                <li class="nav-item dropdown {{ Request::is('profil*') ? 'active' : '' }} ">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;{{ implode(' ', array_slice(explode(' ', auth()->user()->name ), 0, 1)) }} ({{ auth()->user()->level }}) <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                         <li><a href="/profil">Profil</a></li>
                                        <li><a href="/logout">Logout</a></li>
                                    </ul>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>