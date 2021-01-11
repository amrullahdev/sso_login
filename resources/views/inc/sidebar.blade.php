<nav class="sidebar sidebar-offcanvas sticky-top" id="sidebar">
    <ul class="nav">
        @can('admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin_panel" aria-expanded="false" >
                <span class="menu-title">Admin Panel</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="admin_panel">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <router-link class="nav-link" to="/route-admin-saja">Akses Admin Saja</router-link>
                    </li>
                </ul>
            </div>
        </li>
        @endcan

        <li class="nav-item">
            <router-link class="nav-link" to="/">
                <span class="menu-title text-dark">Route Public (Welcome)</span>
                <i class="fa fa-circle menu-icon"></i>
            </router-link>
        </li>


        @auth
        <li class="nav-item">
            <router-link class="nav-link " to="/berhasil">
                <span class="menu-title text-dark">Data Login</span>
                <i class="fa fa-circle menu-icon"></i>
            </router-link>
        </li>

        <li class="nav-item d-md-none d-sm-block">
            <form action=" {{route('logout')}} " method="POST" class="nav-link">
                @csrf
                <button type="submit" class="menu-title " style="background: none; border: none; padding: 0">
                    Logout
                </button>
                <i class="fa fa-circle menu-icon"></i>
            </form>
        </li>
        @endauth

        @guest
        <li class="nav-item">
            <router-link class="nav-link " to="/login">
                <span class="menu-title text-dark">Login</span>
                <i class="mdi mdi-login menu-icon"></i>
            </router-link>
        </li>
        @endguest
    </ul>
</nav>
