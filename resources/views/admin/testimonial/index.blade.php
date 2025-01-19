@extends('templates.layout.main')
@section('title', $title)

@section('content')

    <!-- Search Form & Add Button -->
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="https://firebase-host.vercel.app/" class="btn btn-secondary mb-4" target="_blank">Upload Image/pdf</a>
            <a href="#" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">Tambah
                testimonial</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>title</th>
                                    <th>namaorg</th>
                                    <th>option</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $index => $testimonial)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $testimonial->title }}</td>
                                        <td>{{ $testimonial->namaorg }}</td>
                                        <td>{{ $testimonial->option }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button class="btn btn-sm btn-info edit-btn" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $testimonial->id }}"
                                                data-title="{{ $testimonial->title }}" data-icon="{{ $testimonial->icon }}"
                                                data-detail="{{ $testimonial->detail }}" data-namaorg="{{ $testimonial->namaorg }}"
                                                data-jabatanorg="{{ $testimonial->jabatanorg }}"
                                                data-option="{{ $testimonial->option }}">
                                                Edit
                                            </button>

                                            <!-- Delete Form -->
                                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
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
                    {{-- <div class="mt-3">
                        {{ $testimonials->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addtestimonialForm" action="{{ route('testimonials.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama testimonial:</label>
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">icon</label>
                            <input type="text" id="icon" name="icon"
                                class="form-control @error('icon') is-invalid @enderror">
                            @error('icon')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail:</label>
                            <textarea id="detail" name="detail" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="namaorg" class="form-label">Nama Orang:</label>
                            <input type="text" id="namaorg" name="namaorg"
                                class="form-control @error('namaorg') is-invalid @enderror">
                            @error('namaorg')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatanorg" class="form-label">Jabatan:</label>
                            <input type="text" id="jabatanorg" name="jabatanorg"
                                class="form-control @error('jabatanorg') is-invalid @enderror">
                            @error('jabatanorg')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="option" class="form-label">Pilih Jenis option:</label>
                            <select id="option" name="option" class="form-select @error('option') is-invalid @enderror">
                                <option value="visibilty" {{ old('option') == 'visibilty' ? 'selected' : '' }}>visibilty
                                </option>
                                <option value="hidden" {{ old('option') == 'hidden' ? 'selected' : '' }}>hidden
                                </option>
                            </select>
                            @error('option')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edittestimonialForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nama testimonial:</label>
                            <input type="text" id="editName" name="title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image:</label>
                            <input type="text" id="editImage" name="icon"
                                class="form-control @error('icon') is-invalid @enderror">
                            @error('icon')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="editDetail" class="form-label">Detail:</label>
                            <textarea id="editDetail" name="detail" class="form-control" rows="3"></textarea>
                            @error('detail')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="editnamaorg" class="form-label">Nama Orang:</label>
                            <input type="text" id="editnamaorg" name="namaorg"
                                class="form-control @error('namaorg') is-invalid @enderror">
                            @error('namaorg')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="editjabatanorg" class="form-label">Jabatan:</label>
                            <input type="text" id="editjabatanorg" name="jabatanorg"
                                class="form-control @error('jabatanorg') is-invalid @enderror">
                            @error('jabatanorg')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="editoption" class="form-label">Opsi</label>
                                <select id="editoption" name="option"
                                    class="form-select @error('option') is-invalid @enderror">
                                    <option value="visibilty">visibilty</option>
                                    <option value="hidden">hidden</option>
                                </select>
                                @error('option')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update testimonial</button>
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
            // Handle Edit Modal
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const title = this.dataset.title;
                    const icon = this.dataset.icon;
                    const detail = this.dataset.detail;
                    const namaorg = this.dataset.namaorg;
                    const jabatanorg = this.dataset.jabatanorg;
                    const option = this.dataset.option;

                    document.getElementById('editName').value = title;
                    document.getElementById('editImage').value = icon;
                    document.getElementById('editDetail').value = detail;
                    document.getElementById('editnamaorg').value = namaorg;
                    document.getElementById('editjabatanorg').value = jabatanorg;
                    document.getElementById('editoption').value = option;

                    const form = document.getElementById('edittestimonialForm');
                    form.action = `/testimonials/${id}`;
                });
            });

            // Confirm Delete with SweetAlert2
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
                        confirmButtonText: 'Ya, Hapus',
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
