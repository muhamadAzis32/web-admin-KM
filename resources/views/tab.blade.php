<div class="col-md-6 mt-4">
  <div class="card">
    <div class="card-header pb-0 px-3">
      {{-- <h6 class="mb-0">Tambah Data</h6> --}}
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Konten Dokumen</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Konten Video</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card-body">
          <form role="form text-left" action="{{route('kontenDokumen.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Deskripsi</label>
              <textarea name="deskripsi" class="editableMCE" rows="11"> </textarea>
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
              <select class="form-control" id="exampleFormControlSelect1" disabled>
                @foreach ($kelasselect as $item)
                <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                  selected
                  @endif>{{$item->nama}}</option>
                @endforeach
              </select>
              <input name="kelas_id" value="{{$item->id}}" type="hidden">
            </div>

            <div class="text-center">
                          <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                  <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card-body">
          <form role="form text-left" action="{{route('kontenVideo.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Deskripsi</label>
              <textarea name="deskripsi" rows="11" class="editableMCE"> </textarea>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlSelect1">Link</label>
              <input type="text" class="form-control" name="link" placeholder="Masukkan Link">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlSelect1">BAB</label>
              <input type="number" class="form-control" name="bab">
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
              <input name="kelas_id" value="{{$item->id}}" type="hidden">
            </div>

            <div class="text-center">
                          <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                  <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>