<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{url('/dashboard')}}" class="text-nowrap logo-img">
                <img src="https://sitedashseo.netlify.app/assets/images/logos/logo-light.svg" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="lni lni-arrow-left"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{url('/dashboard')}}" aria-expanded="false">
                        <span>
                            <i class="lni lni-dashboard-square-1"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">Master Data</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/clients') }}" aria-expanded="false">
                        <span>
                            <i class="lni lni-user-4"></i>
                        </span>
                        <span class="hide-menu">Client</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/services') }}" aria-expanded="false">
                        <span>
                            <i class="lni lni-layers-1"></i>
                        </span>
                        <span class="hide-menu">Layanan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/blogs') }}" aria-expanded="false">
                        <span>
                            <i class="lni lni-layers-1"></i>
                        </span>
                        <span class="hide-menu">Blog</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/testimonials') }}" aria-expanded="false">
                        <span>
                            <i class="lni lni-layers-1"></i>
                        </span>
                        <span class="hide-menu">Testimonial</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="lni lni-phone"></i>
                        </span>
                        <span class="hide-menu">Contact</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="lni lni-gear-1"></i>
                        </span>
                        <span class="hide-menu">Setting Web</span>
                    </a>
                </li> --}}
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone"
                                class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Setting Web</span>
                    </a>
                </li> --}}
            </ul>
            {{-- <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3">
                <div class="d-flex">
                    <div class="unlimited-access-title me-3">
                        <h6 class="fw-semibold fs-4 mb-6 text-dark w-75">Upgrade to pro</h6>
                        <a href="#" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                    </div>
                    <div class="unlimited-access-img">
                        <img src="https://sitedashseo.netlify.app/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div> --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
