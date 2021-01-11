<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <span class="navbar-brand brand-logo">
            amrullahdev
        </span>
        <span class="navbar-brand brand-logo-mini">
            AMR
        </span>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
                <li class="nav-item d-none d-lg-block full-screen-link font-weight-bold text-dark">
                    {{$title ?? ''}}
                </li>
            </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
                @auth
                    <form action=" {{route('logout')}} " method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn">
                            <i class="mdi mdi-power"></i>
                        </button>
                    </form>
                @else
                <router-link to="/login" class="nav-link">
                   Login
                </router-link>
                @endauth
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
