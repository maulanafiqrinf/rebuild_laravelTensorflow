<section class="service-area" id="service">
    <div class="custom-container">
        <div class="service-section-header section-header d-flex align-items-end justify-content-between">
            <div class="left">
                <h5 class="section-subtitle">Layanan Kami</h5>
                <h1 class="section-title">Solusi Web Modern untuk<br>Deteksi
                    Penyakit Tanaman Padi</h1>
            </div>
        </div>

        <div class="services-list d-flex">
            @foreach ($services as $service)
            <div class="service-card simple-shadow">
                <img src="{{ e($service->image) }}" alt="Service Icon" class="service-icon" />
                <h3>{{ e($service->nama) }}</h3>
                <p>{!! nl2br(e($service->detail)) !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
