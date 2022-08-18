<x-app-layout> 
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Tambah Data Kelas</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('kelas.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Kelas</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" aria-label="Name" aria-describedby="email-addon" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" required></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Prasyarat Sebelum</label>
                <select class="form-control" name="sebelum" id="exampleFormControlSelect1">
                  <option value="0">Kelas Pertama</option>
                  @foreach ($kelas as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Program</label>
                <select class="form-control" name="program_id" id="exampleFormControlSelect1">
                  <option value="0">Program</option>
                  @foreach ($program as $item)
                  <option value="{{ $item->id }}">{{ $item->nama_program }}</option>
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