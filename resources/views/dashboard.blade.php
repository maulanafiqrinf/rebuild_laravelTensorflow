@extends('templates.layout.main')

@section('title', 'Dashboard')

@section('content')
    {{-- @php
        $dataCounts = [
            'Data Diri' => \App\Models\tb_me::count(),
            'Data Layanan' => \App\Models\tb_services::count(),
            'Data Keahlian' => \App\Models\tb_skills::count(),
            'Data Pengalaman' => \App\Models\tb_experience::count(),
            'Data Pendidikan' => \App\Models\tb_education::count(),
            'Data Proyek' => \App\Models\tb_project::count(),
            'Data Sertifikat' => \App\Models\tb_certificate::count(),
            'Data Kontak' => \App\Models\tb_contact::count(),
        ];
    @endphp

    <!-- Page Title -->
    <div class="row">
        @foreach ($dataCounts as $title => $count)
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center gap-2">{{ $title }}<span><i class="lni lni-user-multiple-4"></i></span></h5>
                        <h5 class="text-center">{{ $count }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}

    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>