<header class="header-area header-2">

    <div class="custom-container">
        <div class="custom-row align-items-center justify-content-between">
            <div class="header-left d-flex align-items-center">
                <a href="index.html" class="logo">
                    <img src="{{ URL::asset('/assets/imglndg/logo-dark.png') }}" alt="Logo" />
                </a>

                <div class="header-left-right">
                    <a href="{{ url('/login') }}" class="theme-btn">Login</a>
                    <span class="menu-bar">
                        <i class="las la-bars"></i>
                    </span>
                </div>
                <nav class="navbar-wrapper d-flex align-items-center">
                    <span class="close-menu-bar">
                        <i class="las la-times"></i>
                    </span>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#service">Layanan</a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#klasifikasi">Klasifikasi</a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#news">Berita</a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#testimonial">Testimonial</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <div class="header-contact-info d-flex align-items-center">
                    <div class="phone-number">
                        <a href="tel:+62895627552055">
                            Telepon Kita
                            <i class="iconoir-arrow-up-right"></i>
                        </a>
                        0895627552055
                    </div>
                    <a href="{{ url('/login') }}" class="theme-btn">Login</a>
                </div>
            </div>
        </div>
    </div>

</header>
