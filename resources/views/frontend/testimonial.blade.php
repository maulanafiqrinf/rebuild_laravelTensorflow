<section class="testimonial2-area" id="testimonial">
    <div class="custom-container">
        <div class="section-header text-center">
            <h5 class="section-subtitle">TESTIMONIAL</h5>
            <h1 class="section-title">Apa yang orang pikirkan tentang kita</h1>
            <p>Profesionalisme dan komitmen mereka terhadap keberhasilan kami terlihat jelas
                sepanjang proses.</p>
        </div>
    </div>

    <div class="testimonial2-lists d-flex gap-24">
        @foreach ($testimonials as $testimonial)
            <div class="testimonial-item testimonial2-card">
                <img src="https://rebuild-laravel-tensorflow.vercel.app/assets/imgs/bg-shape-3.svg" alt="Shape"
                    class="bg-shape" />
                <img src="{{ e($testimonial->icon) }}" alt="Testimonial" />
                <h1>{{ e($testimonial->title) }}</h1>
                <p>{!! nl2br(e($testimonial->detail)) !!}</p>
                <div class="author-box d-flex align-items-center">
                    <div class="author-box-content">
                        <h4>{{ e($testimonial->namaorg) }}</h4>
                        <p>{{ e($testimonial->jabatanorg) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="testimonial-item testimonial2-card" style="min-width: 0px;background: transparent;padding: 0;">
        </div>
    </div>
</section>
