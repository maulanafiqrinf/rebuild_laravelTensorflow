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
                        <li class="dropdown-menu-item">
                            <a href="index.html">Home</a>
                            <span class="dropdown-menu-item-icon">
                                <i class="las la-angle-down"></i>
                            </span>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.html">IT Services</a>
                                </li>
                                <li>
                                    <a href="home2.html">Business Consulting</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="pricing.html">Pricing</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <div class="header-contact-info d-flex align-items-center">
                    <div class="phone-number">
                        <a href="tel:+1-938-740-7555">
                            Call Us
                            <i class="iconoir-arrow-up-right"></i>
                        </a>
                        +1-938-740-7555
                    </div>
                    <a href="{{ url('/login') }}" class="theme-btn">Login</a>
                </div>
            </div>
        </div>
    </div>

</header>
