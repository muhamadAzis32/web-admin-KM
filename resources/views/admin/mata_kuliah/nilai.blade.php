<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card card-background card-background-mask-info h-100 tilt" data-tilt=""
                                style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                                <div class="full-background"
                                    style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                                </div>
                                <div class="card-body pt-4 text-center">
                                    <h2 class="text-white mb-0 mt-2 up">Nilai Akhir</h2>
                                    <h1 class="text-white mb-0 up">{{ (int) $nilaiakhir }}</h1>
                                    <h3 class="badge-success">
                                        {{$variabel}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex">
                                        <div>
                                            <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Ujian Akhir
                                                    Semester</p>
                                                <h5 class="font-weight-bolder mb-0">
                                                    {{ $nilaiuas->grade }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4">
                                <div class="card-body p-3">
                                    <div class="d-flex">
                                        <div>
                                            <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                                <i class="ni ni-planet text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Ujian Tengah
                                                    Semester</p>
                                                <h5 class="font-weight-bolder mb-0">
                                                    {{ $nilaiuts->grade }}
                                                    <span class="text-success text-sm font-weight-bolder"></span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex">
                                        <div>
                                            <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Assignment</p>
                                                <h5 class="font-weight-bolder mb-0">
                                                    {{ $avgassignment }}
                                                    <span class="text-success text-sm font-weight-bolder"></span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4">
                                <div class="card-body p-3">
                                    <div class="d-flex">
                                        <div>
                                            <div class="icon icon-shape bg-gradient-dark text-center border-radius-md">
                                                <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Quiz</p>
                                                <h5 class="font-weight-bolder mb-0">
                                                    {{ (int) $avgquiz }}
                                                    <span class="text-success text-sm font-weight-bolder"></span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-header p-3 pb-0">
                            <div class="row">
                                <div class="col-8 d-flex">
                                    <div>
                                        <img src="../../../assets/img/team-3.jpg" class="avatar avatar-sm me-2"
                                            alt="avatar image">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                        {{-- <p class="text-xs">2h ago</p> --}}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <span class="badge bg-gradient-info ms-auto float-end">{{ $user->role }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pt-1">
                            <h6>{{ $matakuliah->judul }}</h6>
                            <p class="text-sm">{{ $matakuliah->deskripsi }}</p>
                            <div class="d-flex bg-gray-100 border-radius-lg p-3">
                                <h4 class="my-auto  ">
                                    <span class="text-secondary text-sm me-1"></span>
                                        {{Helper::lulus($nilaiakhir)}}
                                </h4>
                                <a href="javascript:;" class="btn btn-outline-dark mb-0 ms-auto">Akses Remedial</a>
                                <form method="post" action="{{ url('konfirmasi-nilai/'.$matakuliah->id.'/'.$user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="nilai_akhir" id="" value="{{ $nilaiakhir }}">
                                    <button type="submit" class="btn btn-outline-dark mb-0 ms-2">Konfirmasi Nilai</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-12">
                    {{-- Ujian Akhir Semester --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Data Ujian Akhir Semester</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    {{-- <small>23 - 30 March 2020</small> --}}
                                </div>
                            </div>
                            <hr class="horizontal dark mb-0">
                        </div>
                        @foreach ($UserExam->where('tipe', 'uas') as $item)
                            <div class="card-body p-3 pt-0">
                                <ul class="list-group list-group-flush" data-toggle="checklist">
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-success ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">
                                                    {{ $item->relasiexam->judul }}</h6>
                                                <div class="dropstart float-lg-end ms-auto pe-0">
                                                    <a href="javascript:;" class="cursor-pointer" id="dropdownTable2"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                        aria-labelledby="dropdownTable2" style="">
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Another action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                                <div>
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">File Ujian
                                                    </p>
                                                    <span class="text-xs font-weight-bolder">Cek File</span>
                                                </div>
                                                <div class="ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nilai</p>
                                                    <span
                                                        class="text-xs font-weight-bolder">{{ $item->grade }}</span>
                                                </div>
                                                <div class="mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Status</p>
                                                    <span class="badge badge-success">{{Helper::lulus($item->grade)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark mt-4 mb-0">
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    {{-- Ujian Tengah Semester --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Data Ujian Tengah Semester</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    {{-- <small>23 - 30 March 2020</small> --}}
                                </div>
                            </div>
                            <hr class="horizontal dark mb-0">
                        </div>
                        @foreach ($UserExam->where('tipe', 'uts') as $item)
                            <div class="card-body p-3 pt-0">
                                <ul class="list-group list-group-flush" data-toggle="checklist">
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-info ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">
                                                    {{ $item->relasiexam->judul }}</h6>
                                                <div class="dropstart float-lg-end ms-auto pe-0">
                                                    <a href="javascript:;" class="cursor-pointer" id="dropdownTable2"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                        aria-labelledby="dropdownTable2" style="">
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Another action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                                <div>
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">File Ujian
                                                    </p>
                                                    <span class="text-xs font-weight-bolder">Cek File</span>
                                                </div>
                                                <div class="ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nilai</p>
                                                    <span
                                                        class="text-xs font-weight-bolder">{{ $item->grade }}</span>
                                                </div>
                                                <div class="mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Status</p>
                                                    <span class="badge badge-success">{{Helper::lulus($item->grade)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark mt-4 mb-0">
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    {{-- Data Assignment --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Data Assignment</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    {{-- <small>23 - 30 March 2020</small> --}}
                                </div>
                            </div>
                            <hr class="horizontal dark mb-0">
                        </div>
                        @foreach ($UserAssignment as $item)
                            <div class="card-body p-3 pt-0">
                                <ul class="list-group list-group-flush" data-toggle="checklist">
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">
                                                    {{ $item->pertemuan->judul }}
                                                </h6>
                                                <div class="dropstart float-lg-end ms-auto pe-0">
                                                    <a href="javascript:;" class="cursor-pointer" id="dropdownTable2"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                        aria-labelledby="dropdownTable2" style="">
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Another action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                                <div>
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Assignment
                                                    </p>
                                                    <span class="text-xs font-weight-bolder">Cek Assignment</span>
                                                </div>
                                                <div class="ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nilai</p>
                                                    <span
                                                        class="text-xs font-weight-bolder">{{ $item->grade }}</span>
                                                </div>
                                                <div class="mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Status</p>
                                                    <span class="badge badge-success">{{Helper::lulus($item->grade)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark mt-4 mb-0">
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    {{-- Data Quiz --}}
                    <div class="card mb-4">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Data Quiz</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    {{-- <small>23 - 30 March 2020</small> --}}
                                </div>
                            </div>
                            <hr class="horizontal dark mb-0">
                        </div>
                        @foreach ($NilaiQuiz as $item)
                            <div class="card-body p-3 pt-0">
                                <ul class="list-group list-group-flush" data-toggle="checklist">
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-warning ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">
                                                    {{ $item->usequizr->judul }}</h6>
                                                <div class="dropstart float-lg-end ms-auto pe-0">
                                                    <a href="javascript:;" class="cursor-pointer" id="dropdownTable2"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                        aria-labelledby="dropdownTable2" style="">
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="#">Action</a>
                                                        </li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Another action</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="javascript:;">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                                <div>
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Quiz</p>
                                                    <span class="text-xs font-weight-bolder">Cek Jawaban</span>
                                                </div>
                                                <div class="ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nilai</p>
                                                    <span
                                                        class="text-xs font-weight-bolder">{{ $item->grade }}</span>
                                                </div>
                                                <div class="mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Status</p>
                                                    <span class="badge badge-success">{{Helper::lulus($item->grade)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark mt-4 mb-0">
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
