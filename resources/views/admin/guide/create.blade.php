<x-app-layout>
    <div class="container-fluid py-4 ">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <h6 class="my-auto">Tambah Data</h6>
          <div class="nav-wrapper position-relative ms-auto w-50">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                  Buku Panduan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                  Video Panduan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false">
                  Kamus KG
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2">
          <div class="tab-content" id="v-pills-tabContent">
            {{-- <div class="" style="background-image: url('../../assets/img/bg-smart-home-1.jpg'); background-size:cover;"> --}}
            <div class="card-body tab-pane fade show position-relative active  border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
              <form role="form text-left" action="{{route('guide.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">File</label>
                  <input type="file" class="form-control" name="file" placeholder="File Buku Panduan" required>
                </div>
                <input type="hidden" name="tipe" value="Buku Panduan">
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
                </div>
              </form>
            </div>
    
            <div class="card-body tab-pane fade position-relative  border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">
              <form role="form text-left" action="{{route('guide.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlSelect1">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Link Video Panduan" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail" placeholder="Thumbnail video" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Deskripsi</label>
                      <textarea class="form-control ckeditor" name="deskripsi" rows="6"> </textarea>
                </div>
                  <input type="hidden" name="tipe" value="Video Panduan">
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
                </div>
              </form>
            </div>
            <div class="card-body tab-pane fade position-relative  border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam3">
              <form role="form text-left" action="{{route('guide.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlSelect1">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                  </div>
                  <input type="hidden" name="tipe" value="Kamus KG">
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                    <textarea class="form-control ckeditor" name="deskripsi" rows="6"> </textarea>
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
    {{-- @push('scripts') --}}
    <script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    </x-app-layout>