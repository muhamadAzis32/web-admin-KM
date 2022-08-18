<x-app-layout>
  <div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Data Mata Kuliah</h6>
          </div>
          <div class="col-6 text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i>
              &nbsp;&nbsp;Tambah Tugas
            </button>
            {{-- <a class="btn bg-gradient-dark mb-0" href="{{route('kelas.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a> --}}
          </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pilih Assignment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fas fa-landmark opacity-10"></i>
                          </div>
                        </div>
                        <div class="card-body pt-0 p-3 ">
                          <a href="{{route('tambahAssignmentFile',$kelas->id)}}">
                            <h6 class="text-center mb-0">File Assignment</h6>
                          </a>
                          <hr class="horizontal dark my-3">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                      <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fab fa-paypal opacity-10"></i>
                          </div>
                        </div>
                        <div class="card-body pt-0 p-3 ">
                          <a href="{{route('tambahAssignmentPilgan',$kelas->id)}}">
                            <h6 class="text-center mb-0">Pilihan Ganda</h6>
                          </a>
                          <hr class="horizontal dark my-3">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                      <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fab fa-paypal opacity-10"></i>
                          </div>
                        </div>
                        <div class="card-body pt-0 p-3 ">
                          <a href="{{route('tambahAssignmentText',$kelas->id)}}">
                            <h6 class="text-center mb-0">Text Assignment</h6>
                          </a>
                          <hr class="horizontal dark my-3">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="card-body  px-0 pt-0 pb-2">
        @foreach ($AssignmentText as $item)
        <div class="row">
          <div class="col-lg-5 col-sm-5">
            <div class="card  mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Pertemuan {{ $item->pertemuan }}</p>
                      <a href="{{route('textDetail', $item->id)}}">
                        <h5 class="font-weight-bolder mb-0">
                          {{ $item->judul }}
                      </a> <br>
                      <span class="text-success text-sm font-weight-bolder">{{ $item->deadline }}</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @foreach ($AssignmentFile as $item)
        <div class="row">
          <div class="col-lg-5 col-sm-5">
            <div class="card  mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Pertemuan {{ $item->pertemuan }}</p>
                      <a href="{{route('fileDetail', $item->id)}}">
                        <h5 class="font-weight-bolder mb-0">
                          {{ $item->judul }}
                      </a> <br>
                      <span class="text-success text-sm font-weight-bolder">{{ $item->deadline }}</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @foreach ($AssignmentPilgan as $item)
        <div class="row">
          <div class="col-lg-5 col-sm-5">
            <div class="card  mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Pertemuan {{ $item->pertemuan }}</p>
                      <a href="{{route('pilganDetail', $item->id)}}">
                        <h5 class="font-weight-bolder mb-0">
                          {{ $item->judul }}
                      </a> <br>
                      <span class="text-success text-sm font-weight-bolder">{{ $item->deadline }}</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });


    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Hapus Data?`,
          text: "Jika data terhapus, data akan hilang selamanya!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  </script>
  @endpush
</x-app-layout>