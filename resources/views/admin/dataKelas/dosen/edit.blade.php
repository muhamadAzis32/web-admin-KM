<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Data Dosen </h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('updateDataDosen',  $user->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">E-Mail</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Password</label>
                <input type="password" class="form-control" name="password" value="{{$user->password}}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Firebase User ID</label>
                <input type="text" class="form-control" name="firebaseUID" value="{{$user->firebaseUID}}"">
              </div>
              <input type="hidden" name="role" value="{{$user->role}}">
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