<x-app-layout>
    <div class="row">
      <div class="col-6">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h3 class="text-center">Detail {{$assignmentPilgan->judul}}</h3>
          </div>
          <div class="row px-xl-5 px-sm-4 px-3">
  
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{$assignmentPilgan->judul}}" readonly>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" >Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4">{{$assignmentPilgan->deskripsi}}</textarea>
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
                      <h6 class="text-center mb-0">Soal</h6>
                      {{-- <span class="text-xs">
                        
                      </span> --}}
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">
                        @foreach ($assignmentPilganSoal as $item)
                        <li>{{$item->soal}}</li>
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
                  <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                    Import Soal
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body p-3 mt-2">
            <div class="tab-content" id="v-pills-tabContent">
              {{-- <div class="" style="background-image: url('../../assets/img/bg-smart-home-1.jpg'); background-size:cover;"> --}}
              <div class="card-body tab-pane fade show position-relative active  border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
                <form role="form text-left" action="{{route('soalPilgan')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">File</label>
                    <input type="file" class="form-control" name="file" required>
                  </div>
                    <input name="kelas_id" value="{{$assignmentPilgan->kelas->id}}" type="hidden" required>
                    <input name="assignment_pilgan_id" type="hidden" value="{{$assignmentPilgan->id}}" required>
                  </div>
  
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Import</button>
                  </div>
                </form>
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