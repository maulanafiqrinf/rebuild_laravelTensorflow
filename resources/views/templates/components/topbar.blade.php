<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="lni lni-menu-cheesburger"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a class="btn btn-success"><span class="d-none d-md-block">{{ Auth::user()->name }}
                    </span><span class="d-block d-md-none">{{ Auth::user()->name }}</span></a>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://firebasestorage.googleapis.com/v0/b/mfnf-fdf76.appspot.com/o/Portofolio%2Ffoto%2Fman.png?alt=media&token=a4cfb9d4-e2a6-4cfd-bbab-b7dc69bf131c" alt="" width="35"
                            height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="lni lni-user-4"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
