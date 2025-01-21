<footer class="footer-area">
    <img src="https://rebuild-laravel-tensorflow.vercel.app/assets/imgs/bg-shape-4.svg" alt="Shape"
        class="animation-slide-right bg-shape" />
    <div class="footer-top">
        <div class="custom-container">
            <div class="custom-row align-items-end justify-content-between">
                <div class="left-content">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ URL::asset('/assets/imglndg/logo-dark.png') }}" alt="Logo" style="width:150px"/>
                    </a>
                    <p>Website untuk mendeteksi dan mendiagnosis <br>
                        penyakit pada daun tanaman padi</p>
                    <div class="footer-clients d-flex align-items-center">
                        @foreach ($clientsfooter as $clientfooter)
                            <div class="footer-client-img">
                                <img src="{{ e($clientfooter->image) }}"
                                    alt="Youtube" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="custom-container">
            <div class="custom-row d-flex align-items-center justify-content-between">
                <ul class="social-links d-flex align-items-center">
                    <li><a href="#">
                            <i class="iconoir-dribbble"></i>
                        </a></li>
                    <li><a href="#">
                            <i class="iconoir-twitter"></i>
                        </a></li>
                    <li><a href="#">
                            <i class="iconoir-instagram"></i>
                        </a></li>
                    <li><a href="#">
                            <i class="iconoir-linkedin"></i>
                        </a></li>
                </ul>

                <p>&copy; 2025 All rights reserved by <a href="">mfdev87</a></p>
            </div>
        </div>
    </div>
</footer>
