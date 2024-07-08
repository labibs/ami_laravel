@extends('layouts.app')

@section('content')
<div class="card shadow-lg mt-2">
    <div class="col-sm-12">
        <div class="card-body pb-2">
            <div class="row">
                <div class="col-2">
                    <a class=" btn bg-gradient-primary " data-bs-toggle="modal" data-bs-target="#tambahUser"
                        href="">Tambah</a>
                </div>
                <div class="col-3">
                    <form id="searchForm" action="{{ route('users.search') }}" method="GET" class="">
                        <input type="text" id="searchInput" name="search" placeholder="Search..." class="form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-lg">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-2">
                        <h6>Data User</h6>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5">
                                            User</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2">
                                            Ketua</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2">
                                            Team</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Hak Akses</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aktif</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="users-table-body">
                                    @include('users.partials.users_table')
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah User -->
<div class="modal fade" id="tambahUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="" action="{{ route('users.create') }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Prodi</label>
                                <div class="mb-3">
                                    <input name="name" type="text" class="form-control" placeholder="Nama Prodi"
                                        aria-label="Nama" aria-describedby="email-addon">
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <label>Kepala Prodi</label>
                                <div class="mb-3">
                                    <input name="ketua_grup" type="text" class="form-control" placeholder="Kepala Prodi"
                                        aria-label="Ketua Team" aria-describedby="ketua_team-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fakultas</label>
                                <div class="mb-3">
                                    @php
                                    $fakultas = \App\Models\Fakultas::where('active',"Ya")->get();
                                    @endphp
                                    <select name="grup_id" class="form-select" id="">
                                        <option value="">Pilih Fakultas</option>
                                        @foreach ($fakultas as $fakultas_1)
                                        <option value="{{$fakultas_1->id}}">{{$fakultas_1->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <label>Situs</label>
                                <div class="mb-3">
                                    <input name="situs" type="url" class="form-control" placeholder="Situs"
                                        aria-label="Situs" aria-describedby="situs-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email </label>
                                <div class="mb-3">
                                    <input name="email" type="email" class="form-control" placeholder="Email"
                                        aria-label="Email" aria-describedby="email-addon">
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <label>Password</label>
                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" aria-describedby="password-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Hak Akses </label>
                                <select name="hak_akses" class="form-select" id="">
                                    <option value="Auditi">Auditi</option>
                                    <option value="Auditor">Auditor</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <div class="form-check form-switch ps-5 pt-4">
                                    <input class="form-check-input" type="checkbox" id="active" name="active"
                                        checked="">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            @if(session('success'))
            <script>
            swal("Berhasil", "{{ Session::get('success')}}", 'success'), {
                button: true,
                button: "Ok",
            }
            </script>
            @endif
        </div>
    </div>
</div>
<!-- End Modal Tambah User -->

<!-- Modal Edit User -->
<div class="modal fade" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="editUserId" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Prodi</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="editName" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Kepala Prodi</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="editKetua_grup" name="ketua_grup">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Fakultas</label>
                            <label>Fakultas</label>
                            <div class="mb-3">
                                @php
                                $fakultas = \App\Models\Fakultas::where('active', 'Ya')->get();
                                @endphp
                                <select name="grup_id" class="form-select" id="editGrupId">
                                    <option value="">Pilih Fakultas</option>
                                    @foreach ($fakultas as $fakultas_1)
                                    <option value="{{ $fakultas_1->id }}">{{ $fakultas_1->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Situs</label>
                            <div class="mb-3">
                                <input type="url" class="form-control" id="editSitus" name="situs">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email </label>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="editEmail" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Password</label>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="" name="password"
                                    placeholder="Perbarui password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Hak Akses </label>
                            <select name="hak_akses" class="form-select" id="editHak_akses">
                                <option value="Auditi">Auditi</option>
                                <option value="Auditor">Auditor</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Avatar </label>
                            <div class="mb-3">
                                <input name="avatar" type="file" class="form-control" placeholder="Avatar"
                                    aria-label="Avatar" aria-describedby="email-addon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- End Modal Edit User -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('users.search') }}",
            type: "GET",
            data: {
                search: query
            },
            success: function(data) {
                $('#users-table-body').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
<script>
$(document).on('click', '.editUser', function() {
    var id = $(this).data('id');
    var route = $(this).data('route');

    // Mendapatkan URL dari route 'users.update' dengan parameter id
    var route_edit = "{{ route('users.update', ['id' => ':id']) }}";
    route_edit = route_edit.replace(':id', id);

    // Set action form berdasarkan route yang telah disesuaikan dengan id
    $('#editUserForm').attr('action', route_edit);

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data) {
            $('#idnya').val(id);
            $('#editUserId').val(id);
            $('#editName').val(data.name);
            $('#editGrupId').val(data.grup_id);
            $('#editKetua_grup').val(data.ketua_grup);
            $('#editSitus').val(data.situs);
            $('#editHak_akses').val(data.hak_akses);
            $('#editEmail').val(data.email);
            $('#editUserModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
// Tangkap event klik pada elemen dengan kelas deleteUser
document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.deleteUser');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default dari link

            var route = this.getAttribute('data-route'); // Ambil nilai dari atribut data-route
            var userId = this.getAttribute('data-id'); // Ambil nilai dari atribut data-id

            // Tampilkan SweetAlert untuk konfirmasi penghapusan
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus pengguna ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi untuk menghapus
                    // Lakukan aksi penghapusan di sini, seperti melakukan request AJAX atau redirect
                    window.location.href =
                        route; // Redirect ke halaman atau jalankan fungsi hapus
                }
            });
        });
    });
});
</script>


@endsection