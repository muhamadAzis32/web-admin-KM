<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data Administrasi</h6>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="table-responsive">
            <table id="datatable-search" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">E-Mail</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admin as $item)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $item->nama_lengkap }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $item->nik }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $item->email }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <img src="{{ asset( $item->pas_foto) }}" alt="foto_user" height="150" class="img-fluid shadow border-radius-xl">
                  </td>
                  <td class="align-middle text-center">
                    @if ( $item->isVerified == true )
                      <span class="badge badge-success">Terverifikasi</span>
                    @else
                      <span class="badge badge-danger">Belum Terverifikasi</span>
                    @endif
                  </td>
                  <td>`
                    <div class="align-middle text-center">
                      <form id="form-delete" action="{{route('administrasi.destroy', $item->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                      </form>
                      <a class="btn btn-link text-dark px-3 mb-0" href="{{route('administrasi.edit', $item->id)}}"><i class="fas fa-user-edit text-secondary"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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
              var form =  $(this).closest("form");
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