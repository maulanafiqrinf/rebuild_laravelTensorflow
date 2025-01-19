@extends('templates.layout.main')
@section('title', 'contact')
@section('content')

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
                                <th>Email</th>
                                <th>Hp</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $index => $contact)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->hp }}</td>
                                <td>{{ $contact->pesan }}</td>
                                <td>
                                    <!-- Tombol Detail -->
                                    <button class="btn btn-sm btn-info detail-btn" 
                                            data-name="{{ $contact->name }}"
                                            data-email="{{ $contact->email }}"
                                            data-hp="{{ $contact->hp }}"
                                            data-pesan="{{ $contact->pesan }}">
                                        Detail
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
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

<!-- Modal untuk Menampilkan Detail -->
<div class="modal fade" id="contactDetailModal" tabindex="-1" aria-labelledby="contactDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactDetailLabel">Detail Kontak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> <span id="modalName"></span></p>
                <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                <p><strong>Hp:</strong> <span id="modalHp"></span></p>
                <p><strong>Pesan:</strong> <span id="modalPesan"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Delete confirmation
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
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

        // Handle detail button click
        document.querySelectorAll('.detail-btn').forEach(button => {
            button.addEventListener('click', function () {
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const hp = this.getAttribute('data-hp');
                const pesan = this.getAttribute('data-pesan');

                document.getElementById('modalName').textContent = name;
                document.getElementById('modalEmail').textContent = email;
                document.getElementById('modalHp').textContent = hp;
                document.getElementById('modalPesan').textContent = pesan;

                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('contactDetailModal'));
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