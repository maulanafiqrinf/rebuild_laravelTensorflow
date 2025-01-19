@extends('templates.layout.main')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12 col-12 text-md-end">
            <a href="https://firebase-host.vercel.app/" class="btn btn-secondary mb-4" target="_blank">Upload Image/pdf</a>
            <button id="addButton" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#meModal">
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
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mes as $index => $me)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $me->name }}</td>
                                        <td>{{ $me->email }}</td>
                                        <td>{{ $me->hp }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit-btn" data-bs-toggle="modal"
                                                data-bs-target="#meModal" data-id="{{ $me->id }}"
                                                data-name="{{ $me->name }}" data-email="{{ $me->email }}"
                                                data-hp="{{ $me->hp }}" data-detail="{{ $me->detail }}"
                                                data-lokasi="{{ $me->lokasi }}" data-profesi="{{ $me->profesi }}"
                                                data-linkedln="{{ $me->linkedln }}" data-instagram="{{ $me->instagram }}"
                                                data-github="{{ $me->github }}" data-cv="{{ $me->cv }}"
                                                data-image="{{ $me->image }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-warning detail-btn"
                                                data-name="{{ $me->name }}" data-email="{{ $me->email }}"
                                                data-hp="{{ $me->hp }}" data-detail="{{ $me->detail }}"
                                                data-lokasi="{{ $me->lokasi }}" data-profesi="{{ $me->profesi }}"
                                                data-linkedln="{{ $me->linkedln }}" data-instagram="{{ $me->instagram }}"
                                                data-github="{{ $me->github }}" data-cv="{{ $me->cv }}"
                                                data-image="{{ $me->image }}">
                                                Detail
                                            </button>
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
    <div class="modal fade" id="meModal" tabindex="-1" aria-labelledby="meModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="meModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="meForm" action="" method="POST">
                        @csrf
                        <input type="hidden" id="formMethod" name="_method" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama:</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="hp" class="form-label">HP:</label>
                                    <input type="text" id="hp" name="hp" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi:</label>
                                    <input type="text" id="lokasi" name="lokasi" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="profesi" class="form-label">Profesi:</label>
                                    <input type="text" id="profesi" name="profesi" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="linkedln" class="form-label">LinkedIn:</label>
                                    <input type="url" id="linkedln" name="linkedln" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram:</label>
                                    <input type="url" id="instagram" name="instagram" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="github" class="form-label">GitHub:</label>
                                    <input type="url" id="github" name="github" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="cv" class="form-label">CV (URL):</label>
                                    <input type="url" id="cv" name="cv" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image URL:</label>
                                    <input type="url" id="image" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Detail:</label>
                                    <textarea id="detail" name="detail" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" id="formSubmitButton"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contactDetailModal" tabindex="-1" aria-labelledby="contactDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactDetailLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> <span id="modalName"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Hp:</strong> <span id="modalHp"></span></p>
                    <p><strong>Lokasi:</strong> <span id="modalLokasi"></span></p>
                    <p><strong>Profesi:</strong> <span id="modalProfesi"></span></p>
                    <p><strong>LinkedIn:</strong> <span id="modalLinkedln"></span></p>
                    <p><strong>Instagram:</strong> <span id="modalInstagram"></span></p>
                    <p><strong>GitHub:</strong> <span id="modalGithub"></span></p>
                    <p><strong>CV:</strong> <span id="modalCv"></span></p>
                    <p><strong>Image:</strong> <span id="modalImage"></span></p>
                    <p><strong>Detail:</strong> <span id="modalDetail"></span></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalTitle = document.getElementById('meModalLabel');
        const form = document.getElementById('meForm');
        const methodInput = document.getElementById('formMethod');
        const submitButton = document.getElementById('formSubmitButton');

        // Tambah button handler
        document.getElementById('addButton').addEventListener('click', function() {
            modalTitle.textContent = 'Tambah Data';
            form.action = "{{ route('me.store') }}";
            methodInput.value = '';
            submitButton.textContent = 'Tambah';
            form.reset();
        });

        // Edit button handler
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                modalTitle.textContent = 'Edit Data';
                form.action = `/me/${id}`;
                methodInput.value = 'PUT';
                submitButton.textContent = 'Update';

                // Set form fields
                [
                    'name', 'email', 'hp', 'detail', 'lokasi', 'profesi',
                    'image', 'linkedln', 'instagram', 'github', 'cv'
                ].forEach(field => {
                    const fieldElement = document.getElementById(field);
                    if (fieldElement) {
                        fieldElement.value = this.dataset[field] || '';
                    }
                });
            });
        });

        // Delete confirmation
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

        document.querySelectorAll('.detail-btn').forEach(button => {
            button.addEventListener('click', function() {
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const hp = this.getAttribute('data-hp');
                const lokasi = this.getAttribute('data-lokasi');
                const profesi = this.getAttribute('data-profesi');
                const linkedln = this.getAttribute('data-linkedln');
                const instagram = this.getAttribute('data-instagram');
                const github = this.getAttribute('data-github');
                const cv = this.getAttribute('data-cv');
                const image = this.getAttribute('data-image');
                const detail = this.getAttribute('data-detail');


                document.getElementById('modalName').textContent = name;
                document.getElementById('modalEmail').textContent = email;
                document.getElementById('modalHp').textContent = hp;
                document.getElementById('modalLokasi').textContent = lokasi;
                document.getElementById('modalProfesi').textContent = profesi;
                document.getElementById('modalLinkedln').textContent = linkedln;
                document.getElementById('modalInstagram').textContent = instagram;
                document.getElementById('modalGithub').textContent = github;
                document.getElementById('modalCv').textContent = cv;
                document.getElementById('modalImage').textContent = image;
                document.getElementById('modalDetail').textContent = detail;

                // Show modal
                const modal = new bootstrap.Modal(document.getElementById(
                    'contactDetailModal'));
                modal.show();
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
