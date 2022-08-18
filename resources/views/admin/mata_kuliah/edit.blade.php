<x-app-layout> 
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-6 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Mata Kuliah</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('mataKuliah.update',$matakuliah->id)}}" method="POST">
              @csrf
              @method("PUT")
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Kode Mata Kuliah</label>
                <input type="text" class="form-control" name="kode" value="{{$matakuliah->kode}}" placeholder="Kode" aria-label="Kode" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Mata Kuliah</label>
                <input type="text" class="form-control" name="judul" value="{{$matakuliah->judul}}" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" placeholder="deskripsi" name="deskripsi" rows="4" required>{{$matakuliah->deskripsi}}</textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Sks</label>
                <input type="hidden" name="kelas_id" value="{{$matakuliah->kelas_id}}" >
                <input type="number" class="form-control" name="sks" placeholder="sks"  value="{{$matakuliah->sks}}" aria-label="Name" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Semester</label>
                <input type="number" class="form-control" name="semester" placeholder="semester"  value="{{$matakuliah->semester}}" aria-label="Name" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control" name="kategori_id" id="exampleFormControlSelect1">
                  @foreach ($kategori as $item)
                  <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                  @endforeach
                </select>
              <div class="text-end mt-4">
                <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Edit</button>                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- @push('scripts')
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
  @endpush --}}
</x-app-layout>