<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Artikel</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('artikel.update',$artikel->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Artikel</label>
                <input type="text" class="form-control" name="judul" placeholder="Nama" value="{{$artikel->judul}}" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gambar</label> <br>  
                <img src="{{ asset( $artikel->gambar) }}" width="200" alt=""> <br>
                <input type="file" class="form-control" name="gambar" value="{{$artikel->gambar}}" required> 
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required>{{$artikel->deskripsi}}</textarea>
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