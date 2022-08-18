<x-app-layout>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6 col-12 mx-auto">
          <div class="card card-body mt-4">
            <h6 class="mb-0">Tambah Data Iklan</h6>
            <hr class="horizontal dark my-3">
            <form role="form text-left" action="{{route('iklan.store')}}" method="POST" enctype="multipart/form-data" id="dropzone">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Iklan</label>
                <input type="file" class="form-control" name="gambar" required>
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
  </main>
</x-app-layout>