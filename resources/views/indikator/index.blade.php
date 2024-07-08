@extends('layouts.app')

@section('content')
<div class="card shadow-lg mt-2">
    <div class="col-sm-12">
        <div class="card-body pb-2">
            <div class="row">
                <div class="col-2">
                    <a class=" btn bg-gradient-primary " data-bs-toggle="modal" data-bs-target="#tambahindikator"
                        href="">Tambah</a>
                </div>
                <div class="col-1">
                    <a class="btn bg-gradient-info" href="#" data-bs-toggle="modal" data-bs-target="#uploadindikator"
                        data-bs-placement="top" title="Import Data">
                        <i class="fa fa-upload"></i>
                    </a>
                </div>

                <div class="col-1">
                    <a class=" btn bg-gradient-success " data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Download Data" href=""><i class="fa fa-download"></i></a>
                </div>
                <div class="col-5">
                    <form action="">
                        @php
                        $standar = \App\Models\Standar::where('active',"Ya")->get();
                        @endphp
                        <select name="standar_id" class="form-select" id="">
                            <option value="">Pilih Standar untuk memfilter</option>
                            @foreach ($standar as $standar_1)
                            <option value="{{$standar_1->id}}">{{$standar_1->name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-3">
                    <form id="searchForm" action="{{ route('indikator.search') }}" method="GET" class="">
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
                        <h6>Data indikator</h6>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <style>
                            .table td {
                                /* Sesuaikan dengan lebar yang Anda tetapkan */
                                word-wrap: break-word;
                                /* Memastkan teks yang panjang dapat dibungkus (wrap) */
                                white-space: pre-wrap;
                                /* Memelihara pemformatan teks dan memperbolehkan jeda baris baru */

                            }

                            .text-xs {
                                margin: 0;
                                /* Menghilangkan margin */
                                padding: 0;
                                /* Menghilangkan padding */
                                text-align: left;
                            }
                            </style>

                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5"
                                            style="width: 10%;" rowspan="2">
                                            Kode/Standar</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2"
                                            style="width: 30%;" rowspan="2">
                                            Indikator
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2 text-center"
                                            colspan="2">
                                            Rujukan
                                        </th>

                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2" style="width: 10%;">
                                            Dokumen</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2" style="width: 10%;">
                                            Audity</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-items-bottom"
                                            style="width: 5%; border: 0;">
                                            Pemangku </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2" style="width: 5%; ">
                                            Aktif</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2" style="width: 3%;">
                                            Aksi</th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2"
                                            style="width: 3%;">
                                            PAPS
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            style="width: 3%;">
                                            PAPT</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-items-top"
                                            style="width: 3%;">
                                            Kepentingan</th>
                                    </tr>
                                </thead>
                                <tbody id="indikator-table-body">
                                    @include('indikator.partials.indikator_table')
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah indikator -->
<div class="modal fade" id="tambahindikator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tambahindikatorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahindikatorLabel">Tambah indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="" action="{{ route('indikator.create') }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-9">
                                <label>Standar</label>
                                <div class="mb-3">
                                    @php
                                    $standar = \App\Models\Standar::where('active',"Ya")->get();
                                    @endphp
                                    <select name="standar_id" class="form-select" id="">
                                        <option value="">Pilih Standar</option>
                                        @foreach ($standar as $standar_1)
                                        <option value="{{$standar_1->id}}">{{$standar_1->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 ms-auto">
                                <label>Kode</label>
                                <div class="mb-3">
                                    <input name="kode" type="text" class="form-control" placeholder="Kode"
                                        aria-label="Kode" aria-describedby="situs-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="indikator" class="form-label">Indikator</label>
                                    <textarea name="indikator" class="form-control" placeholder="Masukkan Indikator"
                                        aria-label="Nama Prodi" aria-describedby="email-addon" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Rujukan PAPS </label>
                                <div class="mb-3">
                                    <input name="rujukan_paps" type="text" class="form-control"
                                        placeholder="Rujukan PAPS" aria-label="rujukan_paps"
                                        aria-describedby="email-addon">
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <label>Rujukan PAPT</label>
                                <div class="mb-3">
                                    <input name="rujukan_papt" type="text" class="form-control"
                                        placeholder="Rujukan PAPT" aria-label="rujukan_papt"
                                        aria-describedby="password-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="dokumen" class="form-label">Dokumen</label>
                                    <textarea name="dokumen" class="form-control" placeholder="Sumber dokumen"
                                        aria-label="Dokumen" aria-describedby="email-addon" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Audity </label>
                                <div class="mb-3">
                                    <input name="audity" type="text" class="form-control" placeholder="Audity"
                                        aria-label="audity" aria-describedby="email-addon">
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <label>Pemangku Kepentingan</label>
                                <div class="mb-3">
                                    <input name="pemangku_kepentingan" type="text" class="form-control"
                                        placeholder="Pemangku Kepentingan" aria-label="pemangku_kepentingan"
                                        aria-describedby="password-addon">
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
<!-- End Modal Tambah indikator -->

<!-- Modal upload indikator -->
<div class="modal fade" id="uploadindikator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="uploadindikatorLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadindikatorLabel">Upload indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="" action="{{ route('indikator.create') }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <label>Data Indikator Excel</label>
                                <div class="mb-3">
                                    <input name="file" type="file" class="form-control" placeholder="Kode"
                                        aria-label="Kode" aria-describedby="situs-addon">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Template</button>
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
<!-- End Modal Upload indikator -->

<!-- Modal Edit indikator -->
<div class="modal fade" id="editIndikatorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editindikatorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editindikatorModalLabel">Edit Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editindikatorForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="editindikatorId" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-9">
                            <label>Standar</label>
                            <div class="mb-3">
                                @php
                                $standar = \App\Models\Standar::where('active',"Ya")->get();
                                @endphp
                                <select name="standar_id" class="form-select" id="editStandarId">
                                    <option value="">Pilih Standar</option>
                                    @foreach ($standar as $standar_1)
                                    <option value="{{$standar_1->id}}">{{$standar_1->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 ms-auto">
                            <label>Kode</label>
                            <div class="mb-3">
                                <input name="kode" type="text" class="form-control" placeholder="Kode" aria-label="Kode"
                                    aria-describedby="situs-addon" id="editKode">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="indikator" class="form-label">Indikator</label>
                                <textarea name="indikator" class="form-control" placeholder="Masukkan Indikator"
                                    aria-label="Nama Prodi" aria-describedby="email-addon" rows="4"
                                    id="editIndikatortext"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Rujukan PAPS </label>
                            <div class="mb-3">
                                <input name="rujukan_paps" type="text" class="form-control" placeholder="Rujukan PAPS"
                                    aria-label="rujukan_paps" aria-describedby="email-addon" id="editRujukanPaps">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Rujukan PAPT</label>
                            <div class="mb-3">
                                <input name="rujukan_papt" type="text" class="form-control" placeholder="Rujukan PAPT"
                                    aria-label="rujukan_papt" aria-describedby="password-addon" id="editRujukanPapt">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Dokumen</label>
                                <textarea name="dokumen" class="form-control" placeholder="Sumber dokumen"
                                    aria-label="Dokumen" aria-describedby="email-addon" rows="2"
                                    id="editDokumen"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Audity </label>
                            <div class="mb-3">
                                <input name="audity" type="text" class="form-control" placeholder="Audity"
                                    aria-label="audity" aria-describedby="email-addon" id="editAudity">
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Pemangku Kepentingan</label>
                            <div class="mb-3">
                                <input name="pemangku_kepentingan" type="text" class="form-control"
                                    placeholder="Pemangku Kepentingan" aria-label="pemangku_kepentingan"
                                    aria-describedby="password-addon" id="editPemangkuKepentingan">
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

<!-- End Modal Edit indikator -->

<!-- Modal View indikator -->
<div class="modal fade" id="viewIndikatorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewindikatorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewindikatorModalLabel">View Indikator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="viewindikatorForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="viewindikatorId" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 ms-auto">
                            @php
                            $standar = \App\Models\Standar::where('active',"Ya")->get();
                            @endphp
                            <label>Kode Standar</label>
                            <div class="mb-2">
                                <input name="kode" type="text" class="form-control" aria-label="Kode"
                                    aria-describedby="situs-addon" id="viewStandarId" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Standar</label>
                            <div class="mb-3">
                                <input name="kode" type="text" class="form-control" aria-label="Kode"
                                    aria-describedby="situs-addon" id="viewStandar" disabled>
                            </div>
                        </div>
                        <div class="col-md-3 ms-auto">
                            <label>Kode Indikator</label>
                            <div class="mb-3">
                                <input name="kode" type="text" class="form-control" aria-label="Kode"
                                    aria-describedby="situs-addon" id="viewKode" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="indikator" class="form-label">Indikator</label>
                                <textarea name="indikator" class="form-control" aria-label="Nama Prodi"
                                    aria-describedby="email-addon" rows="4" id="viewIndikatortext" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Rujukan PAPS </label>
                            <div class="mb-3">
                                <input name="rujukan_paps" type="text" class="form-control" aria-label="rujukan_paps"
                                    aria-describedby="email-addon" id="viewRujukanPaps" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Rujukan PAPT</label>
                            <div class="mb-3">
                                <input name="rujukan_papt" type="text" class="form-control" aria-label="rujukan_papt"
                                    aria-describedby="password-addon" id="viewRujukanPapt" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Dokumen</label>
                                <textarea name="dokumen" class="form-control" aria-label="Dokumen"
                                    aria-describedby="email-addon" rows="2" id="viewDokumen" disabled></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Audity </label>
                            <div class="mb-3">
                                <input name="audity" type="text" class="form-control" aria-label="audity"
                                    aria-describedby="email-addon" id="viewAudity" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label>Pemangku Kepentingan</label>
                            <div class="mb-3">
                                <input name="pemangku_kepentingan" type="text" class="form-control"
                                    aria-label="pemangku_kepentingan" aria-describedby="password-addon"
                                    id="viewPemangkuKepentingan" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Indikator Ketercapaian 2021</label>
                                <textarea name="dokumen" class="form-control" aria-label="Dokumen"
                                    aria-describedby="email-addon" rows="2" id="viewDokumen" disabled></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Indikator Ketercapaian 2022</label>
                                <textarea name="dokumen" class="form-control" aria-label="Dokumen"
                                    aria-describedby="email-addon" rows="2" id="viewDokumen" disabled></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Indikator Ketercapaian 2023</label>
                                <textarea name="dokumen" class="form-control" aria-label="Dokumen"
                                    aria-describedby="email-addon" rows="2" id="viewDokumen" disabled></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Indikator Ketercapaian 2024</label>
                                <textarea name="dokumen" class="form-control" aria-label="Dokumen"
                                    aria-describedby="email-addon" rows="2" id="viewDokumen" disabled></textarea>
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

<!-- End Modal View indikator -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('indikator.search') }}",
            type: "GET",
            data: {
                search: query
            },
            success: function(data) {
                $('#indikator-table-body').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
<script>
$(document).on('click', '.editIndikator', function() {
    var id = $(this).data('id');
    var route = $(this).data('route');

    // Mendapatkan URL dari route 'indikator.update' dengan parameter id
    var route_edit = "{{ route('indikator.update', ['id' => ':id']) }}";
    route_edit = route_edit.replace(':id', id);

    // Set action form berdasarkan route yang telah disesuaikan dengan id
    $('#editindikatorForm').attr('action', route_edit);

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data) {
            $('#idnya').val(id);
            $('#editindikatorId').val(id);
            $('#editStandarId').val(data.standar_id);
            $('#editKode').val(data.kode);
            $('#editIndikatortext').val(data.indikator);
            $('#editRujukanPaps').val(data.rujukan_paps);
            $('#editRujukanPapt').val(data.rujukan_papt);
            $('#editDokumen').val(data.dokumen);
            $('#editAudity').val(data.audity);
            $('#editPemangkuKepentingan').val(data.pemangku_kepentingan);
            $('#editindikatorModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
// Tangkap event klik pada elemen dengan kelas deleteindikator
document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.deleteIndikator');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default dari link

            var route = this.getAttribute('data-route'); // Ambil nilai dari atribut data-route
            var indikatorId = this.getAttribute('data-id'); // Ambil nilai dari atribut data-id

            // Tampilkan SweetAlert untuk konfirmasi penghapusan
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menghapus Indikator ini!",
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
<script>
$(document).on('click', '.viewIndikator', function() {
    var id = $(this).data('id');
    var route = $(this).data('route');

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data) {
            $('#idnya').val(id);
            $('#viewindikatorId').val(id);
            $('#viewStandarId').val(data.standar_id);
            $('#viewStandar').val(data.standar);
            $('#viewKode').val(data.kode);
            $('#viewIndikatortext').val(data.indikator);
            $('#viewRujukanPaps').val(data.rujukan_paps);
            $('#viewRujukanPapt').val(data.rujukan_papt);
            $('#viewDokumen').val(data.dokumen);
            $('#viewAudity').val(data.audity);
            $('#viewPemangkuKepentingan').val(data.pemangku_kepentingan);
            $('#viewindikatorModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>

@endsection