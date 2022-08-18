<x-app-layout>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
          <div class="card card-body mt-4">
            <h6 class="mb-0">Edit Data {{$guide->tipe}}</h6>
            <hr class="horizontal dark my-3">
            <div class="card-body">
              @if($guide->tipe=="Buku Panduan")
              <form role="form text-left" action="{{route('guide.update',$guide->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="tipe" value="{{$guide->tipe}}">
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" value="{{$guide->judul}}" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">File</label>
                  <input type="file" class="form-control" name="file" value="{{asset($guide->file)}}" required>
                </div>      
                <div class="text-end">
                        <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                  <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Edit</button>
                </div>
              </form>
              @elseif($guide->tipe=="Video Panduan")
              <form role="form text-left" action="{{route('guide.update',$guide->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="tipe" value="{{$guide->tipe}}">
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" value="{{$guide->judul}}" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Link</label>
                  <input type="text" class="form-control" name="link" value="{{$guide->link}}" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Thumbnail</label>
                  <input type="file" class="form-control" name="thumbnail" {{asset($guide->thumbnail)}} required>{{asset($guide->thumbnail)}}
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                    <textarea class="form-control ckeditor" name="deskripsi" rows="6" value="{{$guide->deskripsi}}">{{$guide->deskripsi}}</textarea>
                  </div>
                <div class="text-end">
                  <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Edit</button>
              </div>
            </form>
            @elseif($guide->tipe=="Kamus KG")
            <form role="form text-left" action="{{route('guide.update',$guide->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="tipe" value="{{$guide->tipe}}">
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{$guide->judul}}" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi</label>
                  <textarea class="form-control ckeditor" name="deskripsi" rows="6" value="{{$guide->deskripsi}}">{{$guide->deskripsi}}</textarea>
                </div>
              <div class="text-end">
                <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
              <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Edit</button>
            </div>
          </form>
          @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
  </x-app-layout>