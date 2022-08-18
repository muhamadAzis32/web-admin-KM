<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Data Hak Akses Kelas Dosen</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('akseskelasDosen.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Mata Kuliah</label>
                <select class="form-control" name="mata_kuliah_id" id="exampleFormControlSelect1">
                  @foreach ($matkul as $item)
                  <option value="{{$item->id}}">{{$item->judul}}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1">Dosen</label>
                <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                  @foreach ($user->where('role','dosen') as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
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
</x-app-layout>