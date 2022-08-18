<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Dokumen</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('kontenDokumen.update',$kontenDokumen->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{$kontenDokumen->judul}}" placeholder="Masukkan Judul">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" value="{{$kontenDokumen->deskripsi}}" placeholder="Masukkan Deskripsi">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Skill Level</label>
                <select class="form-control" name="kategori_id" id="exampleFormControlSelect1">
                  @foreach ($kategori as $item)
                  <option value="{{$item->id}}" @if ($item->id == $kontenDokumen->kategori_id)
                      selected
                  @endif>{{$item->nama_kategori}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">File Dokumen</label>
                <br>
                <input type="file" class="" name="file">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Pertemuan</label>
                <input type="number" class="form-control" value="{{$kontenDokumen->pertemuan}}" name="pertemuan">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Mata Kuliah</label>
                <select class="form-control" name="mata_kuliah_id" id="exampleFormControlSelect1">{{$kontenDokumen->judul}}
                  @foreach ($matakuliah as $item)
                  <option value="{{$item->id}}" @if ($item->id == $kontenDokumen->mata_kuliah_id)
                      selected
                  @endif>{{$item->judul}}</option>
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