<x-app-layout> 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6 col-12 mx-auto">
          <div class="card card-body mt-4">
            <h6 class="mb-0">Tambah Kuis</h6>
            <hr class="horizontal dark my-3">
            <div class="card-body">
              <form role="form text-left" action="{{route('ImportPilgan')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">File</label>
                  <input type="file" class="form-control" name="file" required>
                  <input type="hidden" name="kategori" value="">
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