@if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show col-5" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" style="color:white"><strong>{{$message}}</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

  @if ($message = Session::get('edit'))
  <div class="alert alert-warning alert-dismissible fade show col-5" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" style="color:white"><strong>{{$message}}</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

  @if ($message = Session::get('delete'))
  <div class="alert alert-danger alert-dismissible fade show col-5" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" style="color:white"><strong>{{$message}}</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif