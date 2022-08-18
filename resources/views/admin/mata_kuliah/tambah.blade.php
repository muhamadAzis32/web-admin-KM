<x-app-layout> 
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Tambah Mata Kuliah</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('mataKuliah.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Mata Kuliah</label>
                <input type="text" class="form-control" name="judul" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" placeholder="deskripsi" name="deskripsi" rows="4" required></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Sks</label>
                <input type="text" class="form-control" name="sks" placeholder="sks" aria-label="Name" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control" name="kategori_id" id="exampleFormControlSelect1">
                  @foreach ($kategori as $item)
                  <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                  @endforeach
                </select>
              </div>
              <div class="text-end">
                      <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <a href="javascript:history.back()" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>                
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