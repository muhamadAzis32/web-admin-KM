<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Konten Video</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('akseskelasMahasiswa.update',$kontenVideo->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{$kontenVideo->judul}}" placeholder="Masukkan Judul">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" value="{{$kontenVideo->deskripsi}}" placeholder="Masukkan Deskripsi">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">{{ $kontenVideo->kategori }}</label>
                <select class="form-control" name="kategori" id="exampleFormControlSelect1" required>
                  <option value="Basic">Basic</option>
                  <option value="Intermediate">Intermediate</option>
                  <option value="Advanced">Advanced</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Link</label>
                <input type="text" class="form-control" name="link" value="{{$kontenVideo->link}}" placeholder="Masukkan Link">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1">BAB</label>
                <input type="number" class="form-control" value="{{$kontenVideo->bab}}" name="bab">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas_id" id="exampleFormControlSelect1">{{$kontenVideo->judul}}
                  @foreach ($kelas as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
                  @endforeach
                </select>
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
</x-app-layout>