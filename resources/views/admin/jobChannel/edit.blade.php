<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Job Channel</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('jobChannel.update',$jobChannel->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
                <input type="text" class="form-control" name="posisi_pekerjaan" value="{{$jobChannel->posisi_pekerjaan}}" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" value="{{$jobChannel->nama_perusahaan}}" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gaji</label>
                <input type="number" class="form-control" name="gaji" value="{{$jobChannel->gaji}}" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Bidang</label>
                <input type="text" class="form-control" name="bidang" value="{{$jobChannel->bidang}}" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Tipe</label>
                <select class="form-control" name="tipe">
                  <option selected value="{{$jobChannel->tipe}}">{{$jobChannel->tipe}}</option>
                  <option value="Kerja">Kerja</option>
                  <option value="Magang">Magang</option>
                  <option value="Project">Project</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Jenis</label>
                <select class="form-control" name="jenis">
                  <option selected value="{{ $jobChannel->jenis }}">{{ $jobChannel->jenis }}</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Internship">Internship</option>
                  <option value="Part Time">Part Time</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Requirement</label>
                  <textarea class="form-control ckeditor" name="requirement" rows="6" value="{{$jobChannel->requirement}}">{{$jobChannel->requirement}}</textarea>
            </div> 
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Job Desk</label>
                <textarea class="form-control ckeditor" name="job_desk" rows="6" value="{{$jobChannel->requirement}}">{{$jobChannel->job_desk}}</textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlSelect1">Alamat</label>
            <textarea class="form-control" aria-label="With textarea" name="alamat" rows="4" value="{{$jobChannel->alamat}}" required>{{$jobChannel->alamat}}</textarea>
          </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Foto</label> <br>
                <img src="{{ asset( 'storage/job-channel/'. $jobChannel->foto) }}" alt="" width="100%"> <br>
                <input type="file" class="form-control mt-4" name="foto" value="{{$jobChannel->foto}}" required>
              </div>         
              <div class="text-end">
                      <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
</x-app-layout>