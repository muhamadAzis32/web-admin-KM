<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h3 class="text-center">Detail {{$kelas->nama}}</h3>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Kelas</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$kelas->nama}}" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1" >Deskripsi</label>
              <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4">{{$kelas->deskripsi}}</textarea>
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
                    <h5 class="mb-0">
                      @foreach ($kontenVideo as $item)
                      <li>{{$item->judul}}</li>
                      @endforeach
                    </h5>
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
                    <h5 class="mb-0">
                      @foreach ($kontenDokumen as $item)
                      <li>{{$item->judul}}</li>
                      @endforeach
                    </h5>
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
                  <label for="exampleFormControlSelect1">Kategori</label>
                  <select class="form-control" name="kategori" id="exampleFormControlSelect1" required>
                    <option value="Basic">Basic</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Link</label>
                  <input type="text" class="form-control" name="link" placeholder="Masukkan Link" required>
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlSelect1">BAB</label>
                  <input type="number" class="form-control" name="bab" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <select class="form-control" id="exampleFormControlSelect1" disabled>
                    @foreach ($kelasselect as $item)
                    <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                      selected
                      @endif>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  <input name="kelas_id" value="{{$kelas->id}}" type="hidden" required>
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
                  <label for="exampleFormControlSelect1">Kategori</label>
                  <select class="form-control" name="kategori" id="exampleFormControlSelect1" required>
                    <option value="Basic">Basic</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">File Dokumen</label>
                  <input type="file" class="form-control" name="file" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">BAB</label>
                  <input type="number" class="form-control" name="bab" required>
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <select class="form-control" id="exampleFormControlSelect1" disabled>
                    @foreach ($kelasselect as $item)
                    <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                      selected
                      @endif>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  <input name="kelas_id" value="{{$kelas->id}}" type="hidden" required>
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

</x-app-layout>