<x-app-layout>
<div class="container-fluid py-4 ">
  <div class="card">
    <div class="card-header d-flex pb-0 p-3">
      <h6 class="my-auto">Tambah Data</h6>
      <div class="nav-wrapper position-relative ms-auto w-50">
        <ul class="nav nav-pills nav-fill p-1" role="tablist">
          <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
              Kerja
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
              Magang
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false">
              Project
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="card-body p-3 mt-2">
      <div class="tab-content" id="v-pills-tabContent">
        {{-- <div class="" style="background-image: url('../../assets/img/bg-smart-home-1.jpg'); background-size:cover;"> --}}
        <div class="card-body tab-pane fade show position-relative active  border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
          <form role="form text-left" action="{{route('jobChannel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
              <input type="text" class="form-control" name="posisi_pekerjaan" placeholder="Posisi Pekerjaan" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Gaji</label>
              <input type="number" class="form-control" name="gaji" placeholder="Gaji" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Bidang</label>
              <input type="text" class="form-control" name="bidang" placeholder="Bidang" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Jenis</label>
              <select class="form-control" name="jenis">
                <option selected value="Full Time">Full Time</option>
                <option value="Full Time">Full Time</option>
                <option value="Internship">Internship</option>
                <option value="Part Time">Part Time</option>
              </select>
            </div>
            <input type="hidden" name="tipe" value="Kerja">
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Requirement</label>
                <textarea class="form-control ckeditor" name="requirement" rows="6"> </textarea>
          </div> 
          <div class="mb-3">
            <label for="exampleFormControlSelect1">Job Desk</label>
              <textarea class="form-control ckeditor" name="job_desk" rows="6"> </textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlSelect1">Alamat</label>
          <textarea class="form-control" aria-label="With textarea" name="alamat" rows="4" required></textarea>
        </div>       
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Foto</label>
              <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
            </div>
          </form>
        </div>

        <div class="card-body tab-pane fade position-relative  border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">
          <form role="form text-left" action="{{route('jobChannel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
              <input type="text" class="form-control" name="posisi_pekerjaan" placeholder="Posisi Pekerjaan" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Gaji</label>
              <input type="number" class="form-control" name="gaji" placeholder="Gaji" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Bidang</label>
              <input type="text" class="form-control" name="bidang" placeholder="Bidang" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Jenis</label>
              <select class="form-control" name="jenis">
                <option selected value="Internship">Internship</option>
                <option value="Full Time">Full Time</option>
                <option value="Internship">Internship</option>
                <option value="Part Time">Part Time</option>
              </select>
            </div>
            <input type="hidden" name="tipe" value="Magang">
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Requirement</label>
                <textarea class="form-control ckeditor" name="requirement" rows="6"> </textarea>
          </div> 
          <div class="mb-3">
            <label for="exampleFormControlSelect1">Job Desk</label>
              <textarea class="form-control ckeditor" name="job_desk" rows="6"> </textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlSelect1">Alamat</label>
          <textarea class="form-control" aria-label="With textarea" name="alamat" rows="4" required></textarea>
        </div>      
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Foto</label>
              <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
            </div>
          </form>
        </div>
        <div class="card-body tab-pane fade position-relative  border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam3">
          <form role="form text-left" action="{{route('jobChannel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
              <input type="text" class="form-control" name="posisi_pekerjaan" placeholder="Posisi Pekerjaan" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Gaji</label>
              <input type="number" class="form-control" name="gaji" placeholder="Gaji" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Bidang</label>
              <input type="text" class="form-control" name="bidang" placeholder="Bidang" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Jenis</label>
              <select class="form-control" name="jenis">
                <option selected value="Full Time">Full Time</option>
                <option value="Full Time">Full Time</option>
                <option value="Internship">Internship</option>
                <option value="Part Time">Part Time</option>
              </select>
            </div>
            <input type="hidden" name="tipe" value="Project"> 
            <div class="mb-3">
                <label for="exampleFormControlSelect1">Requirement</label>
                  <textarea class="form-control ckeditor" name="requirement" rows="6"> </textarea>
            </div> 
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Job Desk</label>
                <textarea class="form-control ckeditor" name="job_desk" rows="6"> </textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlSelect1">Alamat</label>
            <textarea class="form-control" aria-label="With textarea" name="alamat" rows="4" required></textarea>
          </div>     
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Foto</label>
              <input type="file" class="form-control" name="foto" required>
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