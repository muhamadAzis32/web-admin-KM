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
                          <a href="/fe-file">
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
                          <a href="/fe-pilgan">
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
                          <a href="/fe-text">
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
        <div class="row">
          <div class="col-lg-5 col-sm-5">
            <div class="card  mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Kelas</p>
                      <a href="/mata_kuliah">
                        <h5 class="font-weight-bolder mb-0">
                          Nama Mata Kuliah 1
                      </a>
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
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
          



        {{-- <table id="datatable-search" class="table align-items-center mb-0">

          <thead>
            <tr>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pertemuan</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">1</span>
              </td>
              <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">a</p>
              </td>
              <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">kakakku jahat</p>u
              </td>
              <td class="align-middle text-center">
              <p class="text-xs font-weight-bold mb-0">sampe selesai</p>
              </td>
              <td>
                <div class="ms-auto text-center">
                  <form action="#" method="POST" style="display: inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash text-secondary"></i></button>
                  </form>
                  <a class="btn btn-link text-dark px-3 mb-0" href="#"><i class="fas fa-user-edit text-secondary"></i></a>
                  <a class="btn btn-link text-dark px-3 mb-0" href="#"><i class="fas fa-eye text-secondary"></i></a>
                </div>
              </td>
            </tr>
          </tbody>
        </table> --}}
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