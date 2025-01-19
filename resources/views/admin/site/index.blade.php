@extends('templates.layout.main')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12 col-12 text-md-end">
            <a href="https://firebase-host.vercel.app/" class="btn btn-secondary mb-4" target="_blank">Upload Image/pdf</a>
            <button id="addButton" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#siteModal">
                Tambah Data
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="width:100%">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Site2</th>
                                    <th>Site3</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sites as $index => $site)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $site->site2 }}</td>
                                        <td>{{ $site->site3 }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-btn" data-bs-toggle="modal"
                                                data-bs-target="#siteModal" data-id="{{ $site->id }}"
                                                @foreach ($site->getAttributes() as $key => $value)
                                            data-{{ $key }}="{{ $value }}" @endforeach>
                                                Edit
                                            </button>
                                            <form action="{{ route('site.destroy', $site->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit -->
    <div class="modal fade" id="siteModal" tabindex="-1" aria-labelledby="siteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="siteModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="siteForm" action="" method="POST">
                        @csrf
                        <input type="hidden" id="formMethod" name="_method" value="">
                        <div class="row">
                            @foreach (['site1', 'site2', 'site3', 'site4', 'site5', 'site6', 'site7', 'site8', 'site9', 'site10', 'site11'] as $field)
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $field }}" class="form-label">{{ ucfirst($field) }}:</label>
                                    <textarea type="text" id="{{ $field }}" name="{{ $field }}" class="form-control"></textarea>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" id="formSubmitButton"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalTitle = document.getElementById('siteModalLabel');
            const form = document.getElementById('siteForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('formSubmitButton');

            document.getElementById('addButton').addEventListener('click', function() {
                modalTitle.textContent = 'Tambah Data';
                form.action = "{{ route('site.store') }}";
                methodInput.value = '';
                submitButton.textContent = 'Tambah';
                form.reset();
            });

            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    modalTitle.textContent = 'Edit Data';
                    form.action = `/site/${id}`;
                    methodInput.value = 'PUT';
                    submitButton.textContent = 'Update';

                    ['site1', 'site2', 'site3', 'site4', 'site5', 'site6', 'site7', 'site8',
                        'site9', 'site10', 'site11'
                    ].forEach(field => {
                        document.getElementById(field).value = this.dataset[field] || '';
                    });
                });
            });

            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Data ini akan dihapus dan tidak dapat dikembalikan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then(result => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true, // Mengaktifkan fitur pagination
                lengthChange: true, // Mengizinkan pengguna memilih jumlah data per halaman
                searching: true, // Mengaktifkan fitur pencarian
                ordering: true, // Mengaktifkan fitur pengurutan
                info: true, // Menampilkan informasi tentang jumlah data
                autoWidth: false, // Menonaktifkan pengaturan lebar otomatis
                pageLength: 10, // Menentukan jumlah data default per halaman
                language: {
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    },
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data tersedia",
                    zeroRecords: "Data tidak ditemukan",
                }
            });
        });
    </script>
@endsection
