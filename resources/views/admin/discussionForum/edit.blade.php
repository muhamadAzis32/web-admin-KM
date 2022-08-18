<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-6 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Iklan</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('iklan.update',$iklan->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Iklan</label> <br>
                <img src="{{ asset( $iklan->gambar) }}" alt=""> <br>
                <input type="file" class="form-control" name="gambar" required>
              </div>
              <div class="text-end">
                      <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>