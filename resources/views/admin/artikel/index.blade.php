<x-app-layout>
  <div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Data Artikel</h6>
          </div>
          <div class="col-6 text-end">
            <a class="btn bg-gradient-dark mb-0" href="{{route('artikel.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Artikel</a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="table-responsive">
          <table id="datatable-search" class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($artikel as $item)
              <tr>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $item->judul }}</span>
                </td>
                <td class="align-middle text-center">
                  <img src="{{ asset( $item->gambar) }}" width="200" class="img-fluid shadow border-radius-xl">
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{!! $item->deskripsi !!}</span>
                </td>
                <td>
                  <div class="align-middle text-center">
                    <form id="form-delete" action="{{route('artikel.destroy', $item->id)}}" method="POST" style="display: inline">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                    </form>
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{route('artikel.edit', $item->id)}}"><i class="fas fa-user-edit text-secondary"></i></a>
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