@extends('layouts.app')

@section('content')
<div class="card shadow-lg mt-2">
    <div class="col-sm-12">
        <div class="card-body pb-2">
            <div class="row">
                <div class="col-2">
                    <a class=" btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#tambahAudity"
                        href="">Tambah</a>
                </div>
                <div class="col-3">
                    <form id="searchForm" action="{{ route('audity.search') }}" method="GET" class="">
                        <input type="text" id="searchInput" name="search" placeholder="Cari...." class="form-control">
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
                        <h6>Data Audity</h6>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5">
                                            Audity</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2">
                                            Institusi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aktif</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="siklus-table-body">
                                    @include('audity.partials.audity_table')
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah User -->
<div class="modal fade" id="tambahAudity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tambahAudityLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAudityLabel">Tambah Audity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="" action="{{ route('audity.create') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>Audity</label>
                                <div class="mb-3">
                                    <input name="name" type="text" class="form-control" placeholder="Audity/Prodi"
                                        aria-label="Nama" aria-describedby="email-addon">
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <label>Institusi</label>
                                <div class="mb-3">
                                    @php
                                    $fakultas = \App\Models\Fakultas::where('active',"Ya")->get();
                                    @endphp
                                    <select name="institusi_id" class="form-select" id="">
                                        <option value="">Pilih Institusi</option>
                                        @foreach ($fakultas as $fakultas_1)
                                        <option value="{{$fakultas_1->id}}">{{$fakultas_1->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check form-switch ps-5 pt-2">
                                    <input class="form-check-input" type="checkbox" id="active" name="active"
                                        checked="">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-outline-info">Simpan</button>
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
<div class="modal fade" id="editaudityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editaudityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editaudityModalLabel">Edit Audity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editaudityForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="editUserId" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Audity</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="editName" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Institusi</label>
                            <div class="mb-3">
                                @php
                                $fakultas = \App\Models\Fakultas::where('active',"Ya")->get();
                                @endphp
                                <select name="institusi_id" class="form-select" id="editInstitusiId">
                                    <option value="">Pilih Institusi</option>
                                    @foreach ($fakultas as $fakultas_1)
                                    <option value="{{$fakultas_1->id}}">{{$fakultas_1->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-info">Simpan</button>
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
            url: "{{ route('audity.search') }}",
            type: "GET",
            data: {
                search: query
            },
            success: function(data) {
                $('#siklus-table-body').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
<script>
$(document).on('click', '.editaudity', function() {
    var id = $(this).data('id');
    var route = $(this).data('route');

    // Mendapatkan URL dari route 'users.update' dengan parameter id
    var route_edit = "{{ route('audity.update', ['id' => ':id']) }}";
    route_edit = route_edit.replace(':id', id);

    // Set action form berdasarkan route yang telah disesuaikan dengan id
    $('#editaudityForm').attr('action', route_edit);

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data) {
            $('#idnya').val(id);
            $('#editUserId').val(id);
            $('#editName').val(data.name);
            $('#editInstitusiId').val(data.institusi_id);
            $('#editDekan').val(data.dekan);
            $('#editaudityModal').modal('show');
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
    var deleteButtons = document.querySelectorAll('.deleteaudity');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default dari link

            var route = this.getAttribute('data-route'); // Ambil nilai dari atribut data-route
            var userId = this.getAttribute('data-id'); // Ambil nilai dari atribut data-id

            // Tampilkan SweetAlert untuk konfirmasi penghapusan
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus audity ini!",
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