@extends('templates.layout.main')
@section('title', $title)

@section('content')

    <!-- Search Form & Add Button -->
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="https://firebase-host.vercel.app/" class="btn btn-secondary mb-4" target="_blank">Upload Image/pdf</a>
            <a href="#" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">Tambah
                client</a>
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
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Category</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $index => $client)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $client->nama }}</td>
                                        <td>
                                            <img src="{{ $client->image }}" alt="Ikon" style="max-width: 100px;">
                                        </td>
                                        <td>{{ $client->category }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button class="btn btn-sm btn-info edit-btn" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $client->id }}"
                                                data-name="{{ $client->nama }}" data-image="{{ $client->image }}"
                                                data-category="{{ $client->category }}">
                                                Edit
                                            </button>

                                            <!-- Delete Form -->
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
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
                        {{ $clients->links() }}
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
                    <h5 class="modal-title" id="addModalLabel">Tambah client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addclientForm" action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama client:</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="text" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="detail" class="form-label">Detail:</label>
                            <textarea id="detail" name="detail" class="form-control" rows="3"></textarea>
                        </div> --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Pilih Jenis Category:</label>
                            <select id="category" name="category"
                                class="form-select @error('category') is-invalid @enderror">
                                <option value="service" {{ old('category') == 'service' ? 'selected' : '' }}>service
                                </option>
                                <option value="client" {{ old('category') == 'client' ? 'selected' : '' }}>client
                                </option>
                            </select>
                            @error('category')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah client</button>
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
                    <h5 class="modal-title" id="editModalLabel">Edit client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editclientForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nama client:</label>
                            <input type="text" id="editName" name="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image:</label>
                            <input type="text" id="editImage" name="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Pilih Jenis Keahlian:</label>
                            <select id="editCategory" name="category"
                                class="form-select @error('category') is-invalid @enderror">
                                <option value="service">service</option>
                                <option value="client">client</option>
                            </select>
                            @error('category')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update client</button>
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
                    const name = this.dataset.name;
                    const image = this.dataset.image;
                    const category = this.dataset.category;


                    document.getElementById('editName').value = name;
                    document.getElementById('editImage').value = image;
                    document.getElementById('editCategory').value = category;

                    const form = document.getElementById('editclientForm');
                    form.action = `/clients/${id}`;
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
