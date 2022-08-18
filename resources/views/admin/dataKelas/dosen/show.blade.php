<x-app-layout>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->data_dosen->nama_lengkap }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{$user->role}} {{-- Sementara Pakai Role Dulu --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row mt-3">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Mata Kuliah Dosen</h6>
                        </div>
                        <div class="card-body p-3">
                            @foreach ($akseskelas as $item)
                                {{-- Looping --}}
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder">
                                    {{ $item->matkul->judul }} ({{$item->matkul->kelas->nama}})</h6>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item border-0 px-0">
                                        <div class="form-check form-switch ps-0">
                                            <i class="ni ni-active-40"></i>
                                            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                for="flexSwitchCheckDefault">Email me when someone follows me</label>
                                        </div>
                                    </li>
                                </ul>
                                {{-- End Looping --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Data Detail Dosen</h6>
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
                                {{-- {{dd($user->data_dosen->nama_lengkap)}} --}}
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Nama Lengkap:</strong> &nbsp; {{$user->data_dosen->nama_lengkap}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor
                                        Hp:</strong> &nbsp; {{$user->data_dosen->no_hp}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Email:</strong> &nbsp; {{$user->email}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Alamat:</strong> &nbsp; {{$user->data_dosen->alamat}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No
                                        KTP:</strong> &nbsp; {{$user->data_dosen->ktp}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No
                                        NIDN:</strong> &nbsp; {{$user->data_dosen->nidn}}</li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
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
                <div class="col-12 col-xl-4 mt-xl-0 mt-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Mahasiswa Bimbingan Akademik</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="../../../assets/img/kal-visuals-square.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Sophie B.</h6>
                                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="../../../assets/img/marie.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Anne Marie</h6>
                                        <p class="mb-0 text-xs">Awesome work, can you..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="../../../assets/img/ivana-square.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Ivanna</h6>
                                        <p class="mb-0 text-xs">About files I can..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="../../../assets/img/team-4.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Peterson</h6>
                                        <p class="mb-0 text-xs">Have a great afternoon..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0">
                                    <div class="avatar me-3">
                                        <img src="../../../assets/img/team-3.jpg" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
