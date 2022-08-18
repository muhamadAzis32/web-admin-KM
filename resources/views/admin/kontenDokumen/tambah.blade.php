<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Tambah Data Dokumen</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('kontenDokumen.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1">File Dokumen</label>
                <br>
                <input type="file" class="" name="file">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1">BAB</label>
                <input type="number" class="form-control" name="bab">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas_id" id="exampleFormControlSelect1">
                  @foreach ($kelas as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
                  @endforeach
                </select>
              </div>

              <div class="text-end">
                      <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>