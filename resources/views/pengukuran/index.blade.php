@extends('layouts.app')

@section('content')
<div class="card shadow-lg mt-2">
    <div class="col-sm-12">
        <div class="card-body pb-2">
            <div class="row">
                <div class="col-2">
                    <a class=" btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#tambahPengukuran"
                        href="">Tambah</a>
                </div>
                <div class="col-1">
                    <a class=" btn bg-gradient-success " data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Download Data" href=""><i class="fa fa-download"></i></a>
                </div>
                <div class="col-3">
                    <form id="searchFormAudity" class="">
                        @php
                        $audity = \App\Models\Audity::where('id', '!=', 1)->where('active', 'Ya')->get();
                        @endphp
                        <select name="search" class="form-select" id="searchSelectAudity">
                            <option value="">Pilih Audity</option>
                            @foreach ($audity as $audity_1)
                            <option value="{{$audity_1->name}}">{{$audity_1->name}} - {{$audity_1->fakultas->name}}
                            </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-4">
                    <form id="searchFormStandar" class="">
                        @php
                        $standar = \App\Models\Standar::where('id', '!=', 1)->where('active', 'Ya')->get();
                        @endphp
                        <select name="search" class="form-select" id="searchSelectStandar">
                            <option value="">Pilih Standar untuk memfilter</option>
                            @foreach ($standar as $standar_1)
                            <option value="{{$standar_1->kode}}">{{$standar_1->kode}}. {{$standar_1->name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-2">
                    <form id="searchFormLainya" action="{{ route('pengukuran.search') }}" method="GET" class="">
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
                        <h6>Pengukuran Prodi <span id="audityDisplay"></span></h6>
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
                                        <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5">
                                            Audity</th> -->
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5 ps-2">
                                            Indikator Mutu</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5">
                                            Pengukuran</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-5">
                                            Tahun</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Target</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Capaian</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="pengukuran-table-body">
                                    @include('pengukuran.partials.pengukuran_table')
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah pengukuran -->
<div class="modal fade" id="tambahPengukuran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tambaPengukurantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPengukuranLabel">Tambah Aspek Pengukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Satu</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Masal</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-fluid">
                            <form class="" action="{{ route('pengukuran.create') }}" method="POST">
                                {{csrf_field()}}
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <label>Audity/Prodi</label>
                                        <div class="mb-3">
                                            @php
                                            $faudity = \App\Models\Audity::where('active', 'Ya')->get();
                                            @endphp
                                            <select name="audity_id" class="form-select" id="audityId">
                                                <option value="">Pilih Audity</option>
                                                @foreach ($faudity as $faudity_1)
                                                <option value="{{ $faudity_1->id }}">{{ $faudity_1->name }}
                                                    {{ $faudity_1->fakultas->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Siklus</label>
                                        <div class="mb-3">
                                            @php
                                            $siklus = \App\Models\Siklus::where('active', 'Ya')->get();
                                            @endphp
                                            <select name="siklus_id" class="form-select" id="siklus_id">
                                                <option value="">Pilih Siklus</option>
                                                @foreach ($siklus as $siklus_1)
                                                <option value="{{ $siklus_1->id }}">{{ $siklus_1->name }}
                                                    {{ $siklus_1->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ms-auto">
                                        <label for="tahun">Tahun</label>
                                        <div class="mb-3">
                                            <select class="form-select" id="tahun" name="tahun" required>
                                                <option value="">Pilih tahun</option>
                                                <?php
                                            // Tahun sekarang
                                            $tahun_sekarang = date('Y');
                                            
                                            // Pilihan tahun: tahun ini, satu tahun ke belakang, dan dua tahun ke depan
                                            for ($tahun = $tahun_sekarang - 1; $tahun <= $tahun_sekarang + 2; $tahun++) {
                                                echo '<option value="' . $tahun . '">' . $tahun . '</option>';
                                            }
                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="indikator" class="form-label">Indikator</label>
                                        <select id="indikator" name="target_id" class="form-control"
                                            style="width: 100%; height: 100%;">
                                            <!-- Opsi akan ditambahkan secara dinamis oleh Select2 -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12">
                                        <label for="pengukuran" class="form-label">Pengukuran</label>
                                        <textarea name="pengukuran" id="" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-check form-switch ps-5 pt-4">
                                            <input class="form-check-input" type="checkbox" id="active" name="active"
                                                checked="">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container-fluid">
                            <form class="" action="{{ route('pengukuran.import') }}" method="POST"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <label for="">Untuk Tambah Data Pengukuran secara masal, silahkan gunakan
                                            template
                                            berikut</label>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success">Template</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Upload Data Pengukuran Excel</label>
                                        <div class="mb-3">
                                            <input name="file_excel" type="file" class="form-control" placeholder="Kode"
                                                aria-label="Kode" aria-describedby="situs-addon">
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
                    @if(session('gagal'))
                    <script>
                    swal("Gagal", "{{ Session::get('gagal')}}", 'error'), {
                        button: true,
                        button: "Ok",
                    }
                    </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Modal Tambah pengukuran -->

<!-- Modal Edit pengukuran -->
<div class="modal fade" id="editpengukuranModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editpengukuranpengukuranLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editpengukuranpengukuranLabel">Edit pengukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editpengukuranForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label>Audity/Prodi</label>
                            <div class="mb-3">
                                @php
                                $faudity = \App\Models\Audity::where('active', 'Ya')->get();
                                @endphp
                                <select name="audity_id" class="form-select" id="editAudityId">
                                    <option value="">Pilih Audity</option>
                                    @foreach ($faudity as $faudity_1)
                                    <option value="{{ $faudity_1->id }}">{{ $faudity_1->name }}
                                        {{ $faudity_1->fakultas->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Siklus</label>
                            <div class="mb-3">
                                @php
                                $siklus = \App\Models\Siklus::where('active', 'Ya')->get();
                                @endphp
                                <select name="siklus_id" class="form-select" id="editSiklusId">
                                    <option value="">Pilih Siklus</option>
                                    @foreach ($siklus as $siklus_1)
                                    <option value="{{ $siklus_1->id }}">{{ $siklus_1->name }}
                                        {{ $siklus_1->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 ms-auto">
                            <label for="tahun">Tahun</label>
                            <div class="mb-3">
                                <select class="form-select" id="tahun" name="editTahunForm" required>
                                    <option value="">Pilih tahun</option>
                                    <?php
                                            // Tahun sekarang
                                            $tahun_sekarang = date('Y');
                                            
                                            // Pilihan tahun: tahun ini, satu tahun ke belakang, dan dua tahun ke depan
                                            for ($tahun = $tahun_sekarang - 1; $tahun <= $tahun_sekarang + 2; $tahun++) {
                                                echo '<option value="' . $tahun . '">' . $tahun . '</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="indikator" class="form-label">Indikator</label>
                            <select id="indikatorEdit" name="target_id" class="form-control"
                                style="width: 100%; height: 100%;">
                                <!-- Opsi akan ditambahkan secara dinamis oleh Select2 -->
                            </select>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <label for="editPengukuran" class="form-label">Pengukuran</label>
                            <textarea name="pengukuran" id="editPengukuranForm" rows="6"
                                class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- End Modal Edit pengukuran -->

<!-- Modal Nilai pengukuran -->
<div class="modal fade" id="nilaipengukuranModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="nilaipengukuranLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nilaipengukuranLabel">Penilaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nilaipengukuranForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label>Capaian Kinerja</label>
                            <div class="mb-3">
                                @php
                                $faudity = \App\Models\Audity::where('active', 'Ya')->get();
                                @endphp
                                <select name="audity_id" class="form-select" id="editAudityId">
                                    <option value="">Pilih Capaian</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Siklus</label>
                            <div class="mb-3">
                                @php
                                $siklus = \App\Models\Siklus::where('active', 'Ya')->get();
                                @endphp
                                <select name="siklus_id" class="form-select" id="editSiklusId">
                                    <option value="">Pilih Siklus</option>
                                    @foreach ($siklus as $siklus_1)
                                    <option value="{{ $siklus_1->id }}">{{ $siklus_1->name }}
                                        {{ $siklus_1->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 ms-auto">
                            <label for="tahun">Tahun</label>
                            <div class="mb-3">
                                <select class="form-select" id="tahun" name="editTahunForm" required>
                                    <option value="">Pilih tahun</option>
                                    <?php
                                            // Tahun sekarang
                                            $tahun_sekarang = date('Y');
                                            
                                            // Pilihan tahun: tahun ini, satu tahun ke belakang, dan dua tahun ke depan
                                            for ($tahun = $tahun_sekarang - 1; $tahun <= $tahun_sekarang + 2; $tahun++) {
                                                echo '<option value="' . $tahun . '">' . $tahun . '</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-12">
                            <label for="editPengukuran" class="form-label">Bukti Dokumen</label>
                            <textarea name="pengukuran" id="editPengukuranForm" rows="2"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <label for="editPengukuran" class="form-label">Catatan Auditor 1</label>
                            <textarea name="pengukuran" id="editPengukuranForm" rows="2"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <label for="editPengukuran" class="form-label">Catatan Auditor 2</label>
                            <textarea name="pengukuran" id="editPengukuranForm" rows="2"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <label for="editPengukuran" class="form-label">Catatan Lapangan</label>
                            <textarea name="pengukuran" id="editPengukuranForm" rows="2"
                                class="form-control"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- End Modal nilai pengukuran -->


<!-- Load jQuery terlebih dahulu -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<!-- Kemudian baru load Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- bootstap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $('#searchSelectAudity').on('change', function() {
        var query = $(this).val();
        $('#audityDisplay').text(query);
        $.ajax({
            url: "{{ route('pengukuran.searchSelectAudity') }}",
            type: "GET",
            data: {
                search: query
            },
            success: function(data) {
                $('#pengukuran-table-body').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
@php
$targets = \App\Models\Target::where('active', 'Ya')
->with('indikator:id,kode,indikator') // Relasi dengan Indikator, memilih kolom yang diinginkan
->get();

// Ubah data menjadi array untuk keperluan tertentu, seperti JSON
$jsonTargets = $targets->map(function($target) {
return [
'id' => $target->id,
'kode' => $target->indikator->kode,
'indikator' => $target->indikator->indikator,
];
})->toJson();
@endphp
<script>
$(document).ready(function() {
    var indikators =
        <?php echo $jsonTargets ?>;
    // Pastikan indikators tidak kosong dan memiliki struktur yang sesuai
    if (indikators && Array.isArray(indikators) && indikators.length > 0) {
        // Membuat mappedData di luar inisialisasi Select2
        var mappedData = indikators.map(function(item) {
            return {
                id: item.id,
                text: item.kode + ' ' + item.indikator,
            };
        });

        // Inisialisasi Select2 setelah pemetaan data
        $("#indikator").select2({
            dropdownParent: $('#tambahPengukuran'), // Sesuaikan dengan kebutuhan Anda
            containerCssClass: 'custom-select2-container',
            data: mappedData // Sertakan data yang sudah dipetakan
        });
    } else {
        // Handle case when indikators is empty or undefined
        console.error('Data indikators is empty or undefined.');
    }
});
</script>

<script>
$(document).ready(function() {
    var indikators =
        <?php echo $jsonTargets ?>;
    // Pastikan indikators tidak kosong dan memiliki struktur yang sesuai
    if (indikators && Array.isArray(indikators) && indikators.length > 0) {
        // Membuat mappedData di luar inisialisasi Select2
        var mappedData = indikators.map(function(item) {
            return {
                id: item.id,
                text: item.kode + ' ' + item.indikator,
            };
        });

        // Inisialisasi Select2 setelah pemetaan data
        $("#indikatorEdit").select2({
            dropdownParent: $('#editPengukuran'), // Sesuaikan dengan kebutuhan Anda
            containerCssClass: 'custom-select2-container',
            data: mappedData // Sertakan data yang sudah dipetakan
        });
    } else {
        // Handle case when indikators is empty or undefined
        console.error('Data indikators is empty or undefined.');
    }
});
</script>

<script>
$(document).ready(function() {
    var indikators = <?php echo $jsonTargets?>;

    // Pastikan indikators tidak kosong dan memiliki struktur yang sesuai
    if (indikators && Array.isArray(indikators) && indikators.length > 0) {
        // Tambahkan pilihan kosong di awal data

        // Inisialisasi Select2
        $("#indikatorEdit").select2({
            dropdownParent: $('#editpengukuranModal'),
            containerCssClass: 'custom-select2-container',
            // theme: "classic",
            data: indikators.map(function(item) {
                return {
                    id: item.id,
                    text: item.kode + '  ' + item.Indikator
                };
            })
        });
    } else {
        // Handle case when indikators is empty or undefined
        console.error('Data indikators is empty or undefined.');
    }
});
</script>
<script>
$(document).ready(function() {
    $('#searchSelectStandar').on('change', function() {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('pengukuran.searchSelectIndikator') }}",
            type: "GET",
            data: {
                search: query
            },
            success: function(data) {
                $('#pengukuran-table-body').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('pengukuran.search') }}",
            type: "GET",
            data: {
                search: query
            },
            success: function(data) {
                $('#pengukuran-table-body').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
<script>
$(document).on('click', '.editpengukuran', function() {
    var id = $(this).data('id');
    var route = $(this).data('route');

    // Mendapatkan URL dari route 'pengukuran.update' dengan parameter id
    var route_edit = "{{ route('pengukuran.update', ['id' => ':id']) }}";
    route_edit = route_edit.replace(':id', id);

    // Set action form berdasarkan route yang telah disesuaikan dengan id
    $('#editpengukuranForm').attr('action', route_edit);

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data) {
            $('#idnya').val(id);
            $('#editpengukuranId').val(id);
            $('#editAudityId').val(data.audity_id);
            $('#editSiklusId').val(data.siklus_id);
            // Set nilai tahun pada dropdown '#tahun'
            $('#tahun').val(data.tahun);

            // Memastikan dropdown '#tahun' menampilkan opsi yang dipilih
            $('#tahun option[value="' + data.tahun + '"]').attr('selected', 'selected');
            $('#indikator').val(data.indikator_id);
            $('#editPengukuranForm').val(data.pengukuran);
            $('#editpengukuranModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>
<script>
$(document).on('click', '.nilaipengukuran', function() {
    var id = $(this).data('id');
    var route = $(this).data('route');

    // Mendapatkan URL dari route 'pengukuran.update' dengan parameter id
    var route_edit = "{{ route('pengukuran.update', ['id' => ':id']) }}";
    route_edit = route_edit.replace(':id', id);

    // Set action form berdasarkan route yang telah disesuaikan dengan id
    $('#editpengukuranForm').attr('action', route_edit);

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data) {
            $('#idnya').val(id);
            $('#editpengukuranId').val(id);
            $('#editAudityId').val(data.audity_id);
            $('#editSiklusId').val(data.siklus_id);
            // Set nilai tahun pada dropdown '#tahun'
            $('#tahun').val(data.tahun);

            // Memastikan dropdown '#tahun' menampilkan opsi yang dipilih
            $('#tahun option[value="' + data.tahun + '"]').attr('selected', 'selected');
            $('#indikator').val(data.indikator_id);
            $('#editPengukuranForm').val(data.pengukuran);
            $('#editpengukuranModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
// Tangkap event klik pada elemen dengan kelas deletepengukuran
document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.deletepengukuran');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default dari link

            var route = this.getAttribute(
                'data-route'); // Ambil nilai dari atribut data-route
            var pengukuranId = this.getAttribute(
                'data-id'); // Ambil nilai dari atribut data-id

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