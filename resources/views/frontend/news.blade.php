<section class="news2-area">
    <div class="custom-container">
        <div class="section-header d-flex align-items-center justify-content-between">
            <div class="left">
                <h5 class="section-subtitle">BERITA SEHARI-HARI</h5>
                <h1 class="section-title">Baca lebih lanjut tentang wawasan sehari-hari</h1>
                <p>Dalam dunia yang serba cepat di mana informasi terbentuk, blog berita harian kami adalah informasi Anda tentang perkembangan terbaru</p>
            </div>
        </div>

        <div class="news2-lists d-flex">
            @foreach ($blogs as $blog)
                <div class="news2-card card-h">
                    <img src="{{ e($blog->image) }}" alt="Blog" />
                    <div class="news2-card-body">
                        <div class="meta">
                            <span class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format('D F Y') }}</span>
                        </div>
                        <h2><a href="javascript:void(0);" class="details-btn" data-bs-toggle="modal"
                                data-bs-target="#blogModal-{{ $blog->id }}" data-title="{{ e($blog->nama) }}"
                                data-detail="{{ e($blog->detail) }}"
                                data-image="{{ e($blog->image) }}">{{ e($blog->nama) }}</a></h2>
                        <p>{!! nl2br(e($blog->detail)) !!}</p>
                        <a href="javascript:void(0);" class="details-btn" data-bs-toggle="modal"
                            data-bs-target="#blogModal-{{ $blog->id }}" data-title="{{ e($blog->nama) }}"
                            data-detail="{{ e($blog->detail) }}" data-image="{{ e($blog->image) }}" class="theme-btn">
                            <i class="iconoir-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Modal: blog Details -->
@foreach ($blogs as $blog)
    <div class="modal fade" id="blogModal-{{ $blog->id }}" tabindex="-1"
        aria-labelledby="blogModalLabel-{{ $blog->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blogModalLabel-{{ $blog->id }}">Detail Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center pb-3">
                                <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('D F Y') }}</p>
                                <h1>{{ htmlspecialchars($blog->nama) }}</h1>

                            </div>
                        </div>
                    </div>

                    <div class="container pt-3">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="single-blog-page-right wow fadeInUp delay-0-4s">
                                    <h2>Deskripsi</h2>
                                    <p>{!! nl2br(e($blog->detail)) !!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Images -->
                        <div class="row pt-3">
                            <div class="single-image wow fadeInUp delay-0-2s" style="width: 100%; text-align: center;">
                                <img src="{{ e($blog->image) }}" alt="gallery" class="img-fluid"
                                    style="width: 100%; height: auto; object-fit: cover;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
