<x-app-layout>
    
  <div class="row">

    {{-- BLABLA --}}
    <div class="col-md-12 ">
      {{-- <div class="col-xl-12"> --}}
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <h6 class="my-auto">Tambah Ujian</h6>
          <div class="nav-wrapper position-relative ms-auto w-50">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                  File/Text
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                  Pilihan Ganda
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2">
          <div class="tab-content" id="v-pills-tabContent">
            {{-- <div class="" style="background-image: url('../../assets/img/bg-smart-home-1.jpg'); background-size:cover;"> --}}
            <div class="card-body tab-pane fade show position-relative active  border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
                <div class="card-body">
                    <form role="form text-left" action="{{route('examStore')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="mata_kuliah_id" value="{{$mataKuliah->id}}">
                      {{-- <input type="text" name="user_id" value="{{Auth::user()->get();}}"> --}}
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Deskripsi</label>
                        <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Jenis</label>
                        <select class="form-control" name="jenis" id="exampleFormControlSelect1">
                          <option value="uts">UTS</option>
                          <option value="uas">UAS</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">File *opsional</label>
                        <input type="file" class="form-control" name="file">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Waktu Pengerjaan</label>
                        <input class="form-control datepicker" name="deadline" placeholder="Please select date" type="date" onfocus="focused(this)" onfocusout="defocused(this)">
                      </div>
                      <div class="text-end">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</button>
                        <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                      </div>
                    </form>
                  </div>
            </div>

            <div class="card-body tab-pane fade position-relative  border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">
                <div class="card-body">
                    <form role="form text-left" action="{{route('ExamPilganImport')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="mata_kuliah_id" value="{{$mataKuliah->id}}">
                      {{-- <input type="hidden" name="user_id" value="{{Auth::user()->get();}}"> --}}
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
                        {{-- <input type="hidden" class="form-control" name="kelas_id" value="{{$kelas->id}}"> --}}
                        {{-- <input type="hidden" class="form-control" name="assignment" value="text"> --}}
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Jenis</label>
                        <select class="form-control" name="jenis" id="exampleFormControlSelect1">
                          <option value="uts">UTS</option>
                          <option value="uas">UAS</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">Deskripsi</label>
                        <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1">File</label>
                        <input type="file" class="form-control" name="file" required>
                      </div>
                      <div class="mb-3">
                          <label for="exampleFormControlSelect1">Waktu Pengerjaan</label>
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
  </div>

  <div class="row mt-3">
    <div class="col-lg-6 col-md-6">
      <div class="card bg-gradient-primary">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-white text-sm mb-0 opacity-7">Exam</p>
                <a href="">
                    <h5 class="text-white font-weight-bolder mb-0">
                      Data Ujian Tengah Semester
                    </h5>
                </a>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                <i class="ni ni-controller text-dark text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <div class="card bg-gradient-primary">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-white text-sm mb-0 opacity-7">Exam</p>
                <a href="">
                    <h5 class="text-white font-weight-bolder mb-0">
                      Data Ujian Akhir Semester
                    </h5>
                </a>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                <i class="ni ni-note-03 text-dark text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>