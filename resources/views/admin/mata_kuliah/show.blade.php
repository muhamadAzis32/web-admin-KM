<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h3 class="text-center">Detail {{$mataKuliah->judul}}</h3>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Mata Kuliah</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$mataKuliah->judul}}" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Deskripsi</label>
              <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" disabled>{{$mataKuliah->deskripsi}}</textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fas fa-landmark opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 ">
                    <h6 class="text-center mb-0">Konten Video</h6>
                    {{-- <span class="text-xs">
                      
                    </span> --}}
                    <hr class="horizontal dark my-3">
                    <h6 class="mb-0">
                      <ol>
                        @foreach ($kontenVideo as $item)
                        <li>{{$item->judul}}</li>
                        @endforeach
                      </ol>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-md-0 mt-4">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fab fa-paypal opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 ">
                    <h6 class="text-center mb-0">Konten Dokumen</h6>
                    <hr class="horizontal dark my-3">
                    <h6 class="mb-0">
                      <ol>
                        @foreach ($kontenDokumen as $item)
                        <li>{{$item->judul}}</li>
                        @endforeach
                      </ol>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- BLABLA --}}
    <div class="col-md-6 ">
      {{-- <div class="col-xl-12"> --}}
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <h6 class="my-auto">Tambah Data</h6>
          <div class="nav-wrapper position-relative ms-auto w-50">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                  Konten Video
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                  Konten Dokumen
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2">
          <div class="tab-content" id="v-pills-tabContent">
            {{-- <div class="" style="background-image: url('../../assets/img/bg-smart-home-1.jpg'); background-size:cover;"> --}}
            <div class="card-body tab-pane fade show position-relative active  border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
              <form role="form text-left" action="{{route('kontenVideo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Level Video</label>
                  <select class="form-control" name="kategori_id" id="exampleFormControlSelect1">
                    @foreach ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Link</label>
                  <input type="text" class="form-control" name="link" placeholder="Masukkan Link" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Mata Kuliah</label>
                  <select class="form-control" id="exampleFormControlSelect1" disabled>
                    @foreach ($mataKuliahselect as $item)
                    <option value="{{$item->id}}" @if (($item->id == $mataKuliah->id))
                      selected
                      @endif>{{$item->judul}}</option>
                    @endforeach
                  </select>
                  <input name="mata_kuliah_id" value="{{$mataKuliah->id}}" type="hidden" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
                </div>
              </form>
            </div>

            <div class="card-body tab-pane fade position-relative  border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">
              <form role="form text-left" action="{{route('kontenDokumen.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Level Dokumen</label>
                  <select class="form-control" name="kategori_id" id="exampleFormControlSelect1">
                    @foreach ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">File Dokumen</label>
                  <input type="file" class="form-control" name="file" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Mata kuliah</label>
                  <select class="form-control" id="exampleFormControlSelect1" disabled>
                    @foreach ($mataKuliahselect as $item)
                    <option value="{{$item->id}}" @if (($item->id == $mataKuliah->id))
                      selected
                      @endif>{{$item->judul}}</option>
                    @endforeach
                  </select>
                  <input name="mata_kuliah_id" value="{{$mataKuliah->id}}" type="hidden" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Pertemuan Mata Kuliah {{ $mataKuliah->judul }}</h6>
        </div>
        <div class="card-body p-3">
          <div class="row">
            @foreach ($pertemuan->where('mata_kuliah_id',$mataKuliah->id) as $item)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../../../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <p class="text-gradient text-dark mb-2 text-sm">Pertemuan ke {{ $loop->iteration }}</p>
                  <a href="javascript:;">
                    <h5>
                      {{ $item->judul }}
                    </h5>
                  </a>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                  <a class="btn bg-gradient-dark mb-0" href="{{route('detailPertemuan', $item->id)}}">Lihat Pertemuan</a>
                  <form action="{{route('hapusPertemuan', $item->id)}}" method="GET" style="display: inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm mb-0">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain border">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  {{-- <a href="javascript:;"> --}}
                  <i class="fa fa-plus text-secondary mb-3"></i>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#pertemuanModal">
                    Tambah Pertemuan
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Quiz {{ $mataKuliah->judul }}</h6>
        </div>
        <div class="card-body p-3">
          <div class="row">
            @foreach ($quiz->where('mata_kuliah_id',$mataKuliah->id) as $item)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../../../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  {{-- <p class="text-gradient text-dark mb-2 text-sm">Pertemuan {{ $item->pertemuan->judul }}</p> --}}
                  <a href="javascript:;">
                    <h5>
                      {{ $item->judul }}
                    </h5>
                  </a>
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('QuizShow',$item->id)}}" class="btn btn-outline-primary btn-sm mb-0">Lihat Quiz</a>
                    <form action="{{route('QuizDestroy', $item->id)}}" method="GET" style="display: inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-danger btn-sm mb-0">Hapus</button>
                    </form>
                    <div class="avatar-group mt-2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain border">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  {{-- <a href="javascript:;"> --}}
                  <i class="fa fa-plus text-secondary mb-3"></i>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#quizModal">
                    Tambah Quiz
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Assignment {{ $mataKuliah->judul }}</h6>
          <p class="text-sm">Tugas untuk Mata Kuliah terkait</p>
        </div>
        <div class="card-body p-3">
          <div class="row">
            @foreach ($assignment as $item)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../../../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <p class="text-gradient text-dark mb-2 text-sm">Tugas ke {{ $item->pertemuan->pertemuan }}</p>
                  <a href="javascript:;">
                    <h5>
                      {{ $item->judul }}
                    </h5>
                  </a>
                  {{-- <p class="mb-4 text-sm">
                    {{ $item->deskripsi }}
                  </p> --}}
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('showAssignment',$item->id)}}" class="btn btn-outline-primary btn-sm mb-0">Lihat Tugas</a>
                    <form action="{{route('AssignmentDestroy', $item->id)}}" method="GET" style="display: inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-danger btn-sm mb-0">Hapus</button>
                    </form>
                    {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-0">Lihat Tugas</button> --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain border">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  {{-- <a href="javascript:;"> --}}
                  <i class="fa fa-plus text-secondary mb-3"></i>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#assignmentModal">
                    Tambah Tugas
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Ujian {{ $mataKuliah->judul }}</h6>
          <p class="text-sm">Tambah Ujian Tengah Semester dan Akhir Semester</p>
        </div>
        <div class="card-body p-3">
          <div class="row">
            @foreach ($ujian as $item)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../../../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  {{-- <p class="text-gradient text-dark mb-2 text-sm">Tugas ke {{ $item->pertemuan->pertemuan }}</p> --}}
                  <a href="javascript:;">
                    <h5>
                      {{ $item->judul }}
                    </h5>
                  </a>
                  {{-- <p class="mb-4 text-sm">
                    {{ $item->deskripsi }}
                  </p> --}}
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('showExam',$item->id)}}" class="btn btn-outline-primary btn-sm mb-0">Lihat Ujian</a>
                    <form action="{{route('destroyExam', $item->id)}}" method="GET" style="display: inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-danger btn-sm mb-0">Hapus</button>
                    </form>
                    {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-0">Lihat Tugas</button> --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            @foreach ($ujianpilgan as $item)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../../../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  {{-- <p class="text-gradient text-dark mb-2 text-sm">Tugas ke {{ $item->pertemuan->pertemuan }}</p> --}}
                  <a href="javascript:;">
                    <h5>
                      {{ $item->judul }}
                    </h5>
                  </a>
                  {{-- <p class="mb-4 text-sm">
                    {{ $item->deskripsi }}
                  </p> --}}
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('showExam',$item->id)}}" class="btn btn-outline-primary btn-sm mb-0">Lihat Ujian</a>
                    <form action="{{route('destroyExam', $item->id)}}" method="GET" style="display: inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-danger btn-sm mb-0">Hapus</button>
                    </form>
                    {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-0">Lihat Tugas</button> --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
              <div class="card h-100 card-plain border">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                  {{-- <a href="javascript:;"> --}}
                  <i class="fa fa-plus text-secondary mb-3"></i>
                  <!-- Button trigger modal -->
                  <a href="{{route('createExam', $mataKuliah->id)}}" class="btn btn-outline-info">Tambah Ujian</a>
                  {{-- <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#ujianModal"> --}}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <!-- Assignment Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Assignment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="fas fa-landmark opacity-10"></i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 ">
                  <a href="{{route('viewAssignmentFile',$mataKuliah->id)}}">
                    <h6 class="text-center mb-0">File Assignment</h6>
                  </a>
                  <hr class="horizontal dark my-3">
                </div>
              </div>
            </div>

            <div class="col-md-6 mt-md-0 mt-4">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="fab fa-paypal opacity-10"></i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 ">
                  {{-- <a href="{{route('tambahAssignmentPilgan',$mataKuliahselect->id)}}">
                    <h6 class="text-center mb-0">Pilihan Ganda</h6>
                  </a> --}}
                  {{-- <hr class="horizontal dark my-3">
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-md-0 mt-4">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="fab fa-paypal opacity-10"></i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 ">
                  <a href="{{route('tambahAssignmentText',$mataKuliah->id)}}">
                    <h6 class="text-center mb-0">Text Assignment</h6>
                  </a>
                  <hr class="horizontal dark my-3">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  --}}

  <!-- Pertemuan Modal -->
  <div class="modal fade" id="pertemuanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan {{ $mataKuliah->judul }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container-fluid py-4">
          <div class="row">
            <div class="card-body">
              <form role="form text-left" action="{{route('storePertemuan')}}" method="POST">
                @csrf
                <input type="hidden" name="mata_kuliah_id" value="{{$mataKuliah->id}}">
                {{-- <div class="mb-3"> --}}
                  {{-- <label for="exampleFormControlSelect1">Pertemuan Ke</label> --}}
                  <input type="hidden" value="1" class="form-control" name="pertemuan" placeholder="Isi Angka" aria-label="Name" aria-describedby="email-addon" required>
                {{-- </div> --}}
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Topik Pertemuan</label>
                  <input type="text" class="form-control" name="judul" placeholder="Isi topik pertemuan" aria-label="Name" aria-describedby="email-addon" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi Pertemuan</label>
                  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Tugas Mandiri *opsional, masukkan link tugas</label>
                  {{-- <input type="file" class="form-control" name="tugas_mandiri"> --}}
                  <input type="text" class="form-control" name="mandiri" placeholder="Masukkan link materi tugas mandiri" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Tipe</label>
                  <select class="form-control" name="tipe" id="exampleFormControlSelect1">
                    <option value="1">Sebelum Video</option>
                    <option value="2">Pertengahan Video</option>
                    <option value="3">Setelah Video</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect2">Konten Video</label>
                  <select class="form-control selectpicker"  multiple="" data-live-search="true" name="kontenVideo_id[]" id="exampleFormControlSelect2">
                    @foreach ($kontenVideo as $item)
                    <option value="{{$item->id}}">{{$item->judul}}</option>
                    @endforeach
                    {{-- <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="2">2</option> --}}
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect2">Konten Dokumen</label>
                  <select class="form-control selectpicker" multiple="" data-live-search="true" name="kontenDokumen_id[]" id="exampleFormControlSelect2">
                    @foreach ($kontenDokumen as $item)
                    <option value="{{$item->id}}">{{$item->judul}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-end">
                  <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</button>
                  <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Quiz Modal -->
    <div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Quiz {{ $mataKuliah->judul }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="container-fluid py-4">
            <div class="row">
              <div class="card-body">
                <form role="form text-left" action="{{route('QuizImport')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="mata_kuliah_id" value="{{$mataKuliah->id}}">
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
                    {{-- <input type="hidden" class="form-control" name="kelas_id" value="{{$kelas->id}}"> --}}
                    <input type="hidden" class="form-control" name="assignment" value="text">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Pertemuan</label>
                    <select class="form-control" name="pertemuan_id" id="exampleFormControlSelect1">
                      @foreach ($pertemuan->where('mata_kuliah_id', $mataKuliah->id) as $item)
                      <option value="{{$item->id}}">{{$item->judul}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">File</label>
                    <input type="file" class="form-control" name="file" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Deskripsi</label>
                    <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlSelect1">Deadline</label>
                      <input class="form-control datepicker" name="deadline" placeholder="Please select date" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                  <div class="text-end">
                    <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</button>
                    <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Import</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Assignment Modal -->
    <div class="modal fade" id="assignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Assignment {{ $mataKuliah->judul }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="container-fluid py-4">
            <div class="row">
              <div class="card-body">
                <form role="form text-left" action="{{route('AssignmentStore')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="mata_kuliah_id" value="{{$mataKuliah->id}}">
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Deskripsi</label>
                    <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Pertemuan</label>
                    <select class="form-control" name="pertemuan_id" id="exampleFormControlSelect1">
                      @foreach ($pertemuanselect as $item)
                      <option value="{{$item->id}}">{{$item->judul}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Jenis</label>
                    <select class="form-control" name="jenis" id="exampleFormControlSelect1">
                      <option value="Latihan Soal">Latihan Soal</option>
                      <option value="Investigasi Pendalaman">Investigasi Pendalaman</option>
                      <option value="Experiment">Experiment</option>
                      <option value="Tugas">Tugas</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">File *opsional</label>
                    <input type="file" class="form-control" name="file">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Deadline</label>
                    <input class="form-control datepicker" name="deadline" placeholder="Please select date" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                  <div class="text-end">
                    <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</button>
                    <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{--  --}}

    <!-- Grading Modal -->
    {{-- <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Grading!</h3>
                  <p class="mb-0">Enter grade and feedback</p>
              </div>
              <div class="card-body pb-3">
                <form role="form text-left" id="grading" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <label>Nilai</label>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="grade" id="grade" class="form-control" placeholder="Grade" aria-label="Name" aria-describedby="name-addon" readonly>
                      </div>
                    </div>
                  </div>
                  <label>Assignment</label>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="grade" id="grade" class="form-control" placeholder="Nilai Assignmnet" aria-label="Name" aria-describedby="name-addon">
                      </div>
                    </div>
                  </div>
                  <label>Quiz</label>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="grade" id="grade" class="form-control" placeholder="Nilai Quiz" aria-label="Name" aria-describedby="name-addon">
                      </div>
                    </div>
                  </div>
                  <label>UTS</label>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="grade" id="grade" class="form-control" placeholder="Nilai Ujian Tengah Semester" aria-label="Name" aria-describedby="name-addon">
                      </div>
                    </div>
                  </div>
                  <label>UAS</label>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="grade" id="grade" class="form-control" placeholder="Nilai Ujian Akhir Semester" aria-label="Name" aria-describedby="name-addon">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

  {{-- @push('scripts')
  <script>
    tinymce.init({
      selector: ".nonEditableMCE",
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
      readonly: 1
    });

    tinymce.init({
      selector: ".editableMCE",
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',

    });
  </script>
  @endpush --}}
@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
      $('select').selectpicker();
  });
</script> 
@endpush


</x-app-layout>