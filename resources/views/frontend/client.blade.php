<section class="client-area client-area-2">
    <div class="custom-container">
        <p>Klien dan Teknologi yang digunakan</p>
        <div class="clients clients-marquee d-flex align-items-center">
            @foreach ($clients as $client)
                <div class="client-logo simple-shadow">
                    <img src="{{ e($client->image) }}" 
                         alt="Client Logo" 
                         style="width: 150px; height: auto;" />
                </div>
            @endforeach
            <!-- Extra div for alignment -->
            <div class="client-logo" style="min-width: 0;"></div>
        </div>
    </div>
</section>
