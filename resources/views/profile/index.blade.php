@extends('layouts.app')

@section('content')
<div class="page-header min-height-300 border-radius-xl mt-2"
    style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-dark opacity-6"></span>
</div>
<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="../storage/images/{{Auth::user()->avatar}}" alt="profile_image"
                    class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    {{Auth::user()->name}}
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    {{Auth::user()->fakultas->name}}
                </p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">

        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Pengaturn User</h6>
            </div>
            <div class="card-body p-3">
                <h6 class="text-uppercase text-body text-xs font-weight-bolder">User</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                        <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                for="flexSwitchCheckDefault">Tampilkan Situs</label>
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                for="flexSwitchCheckDefault1">Tampilkan Email</label>
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2"
                                checked>
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                for="flexSwitchCheckDefault2">Tampilkan NIDN</label>
                        </div>
                    </li>
                </ul>
                <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Lainya</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                        <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                for="flexSwitchCheckDefault3">Opsional</label>
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                        <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4"
                                checked>
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                for="flexSwitchCheckDefault4">Opsional</label>
                        </div>
                    </li>
                    <li class="list-group-item border-0 px-0 pb-0">
                        <div class="form-check form-switch ps-0">
                            <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                for="flexSwitchCheckDefault5">Opsional</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Informasi User</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="javascript:;">
                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Edit Profile"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <p class="text-sm">
                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult
                    paths, choose the one more painful in the short term (pain avoidance is creating an illusion of
                    equality).
                </p>
                <hr class="horizontal gray-light my-4">
                <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Ketua :</strong>
                        &nbsp; {{Auth::user()->ketua_grup}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Telephone:</strong>
                        &nbsp;
                        (0282) 575800</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;
                        {{Auth::user()->email}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Situs:</strong>
                        &nbsp; {{Auth::user()->situs}}</li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                        <strong class="text-dark text-sm">Sosmed:</strong> &nbsp;
                        <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Anggota</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="avatar me-3">
                            <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Dosen 1</h6>
                            <p class="mb-0 text-xs">Bio..</p>
                        </div>
                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">WA</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="avatar me-3">
                            <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Dosen 2</h6>
                            <p class="mb-0 text-xs">Bio..</p>
                        </div>
                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">WA</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="avatar me-3">
                            <img src="../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Dosen 3</h6>
                            <p class="mb-0 text-xs">Bio..</p>
                        </div>
                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">WA</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="avatar me-3">
                            <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Dosen 4</h6>
                            <p class="mb-0 text-xs">Bio..</p>
                        </div>
                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">WA</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                        <div class="avatar me-3">
                            <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Dosen 5</h6>
                            <p class="mb-0 text-xs">Bio..</p>
                        </div>
                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">WA</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-1">Riwayat AMI</h6>
                <p class="text-sm">Siklus</p>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">2020 - 2021</p>
                                <a href="javascript:;">
                                    <h5>
                                        Tercapai
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    catatan Auditor ....
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-outline-dark btn-sm mb-0">Tampilkan
                                        AMI</button>
                                    <div class="avatar-group mt-2">
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">2021 - 2022</p>
                                <a href="javascript:;">
                                    <h5>
                                        Tercapai
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    catatan Auditor ...
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-outline-dark btn-sm mb-0">Tampilkan
                                        AMI</button>
                                    <div class="avatar-group mt-2">
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">2022 - 2023</p>
                                <a href="javascript:;">
                                    <h5>
                                        Tercapai
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    Catatan Auditor ...
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-outline-dark btn-sm mb-0">Tampilkan
                                        AMI</button>
                                    <div class="avatar-group mt-2">
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card h-100 card-plain border">
                            <div class="card-body d-flex flex-column justify-content-center text-center">
                                <a href="javascript:;">
                                    <i class="fa fa-spinner text-secondary mb-3"></i>
                                    <h5 class=" text-secondary"> 2023 - 2024 </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection