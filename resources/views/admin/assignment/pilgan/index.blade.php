<x-app-layout>
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data Assignment Pilgan</h6>
            </div>
            {{-- <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="{{route('kelas.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
            </div> --}}
          </div>
        </div>
        <div class="card-body  px-0 pt-0 pb-2">
  
          <table id="datatable-search" class="table align-items-center mb-0">
  
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pertemuan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dosen</th> --}}
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            </thead>
  
            <tbody>
              @foreach ($assignmentPilgan as $item)
              <tr>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                </td>
                <td class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{ $item->judul }}</p>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{!! $item->deskripsi !!}</span>
                </td>
                {{-- {{dd($item->akseskelas->name)}}
                <td class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{ $item->akseskelas->name }}</p>
                </td> --}}
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->pertemuan }}</p>
                  </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->deadline }}</p>
                  </td>

                <td>
                  <div class="ms-auto text-center">
                    <form action="{{route('destroyAssignmentPilgan', $item->id)}}" style="display: inline">
                      @csrf
                      <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash text-secondary"></i></button>
                    </form>
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{route('editAssignmentPilgan', $item->id)}}"><i class="fas fa-user-edit text-secondary"></i></a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{route('showPilgan', $item->id)}}"><i class="fas fa-eye text-secondary"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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