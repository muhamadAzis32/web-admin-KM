<x-app-layout>
  <div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Data Job Channel</h6>
          </div>
          <div class="col-6 text-end">
            <a class="btn bg-gradient-dark mb-0" href="{{route('jobChannel.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="table-responsive p-0">
            <table id="datatable-search" class="table align-items-center mb-0">

              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Posisi Pekerjaan</th>
                  <th class="text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Perusahaan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gaji</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bidang</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Requirement</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job Desk</th> --}}
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($jobChannel as $item)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->posisi_pekerjaan }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->nama_perusahaan }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->gaji }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->bidang }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->tipe }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->jenis }}</p>
                  </td>
                  {{-- <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->requirement }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->job_desk }}</p>
                  </td> --}}
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->alamat }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <img src="{{asset($item->foto)}}" width="100"  >
                  </td>
                  <td>
                    <div class="ms-auto text-center">
                      <form action="{{route('jobChannel.destroy', $item->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash text-secondary"></i></button>
                      </form>
                      <a class="btn btn-link text-dark px-3 mb-0" href="{{route('jobChannel.edit', $item->id)}}"><i class="fas fa-user-edit text-secondary"></i></a>
                      <a class="btn btn-link text-dark px-3 mb-0" href="{{url('jobChannel/show', $item->id)}}"><i class="fas fa-eye text-secondary"></i></a>
                    </div>
                  </td>
                </tr>
                {{-- <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{!! $item->deskripsi !!}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{route('kelas.edit', $item->id)}}" class="btn btn-primary"><i class="material-icons">edit</i></a>
                      <form action="{{route('kelas.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i></button>
                      </form>
                    </div>
                  </td>
                </tr> --}}
                @endforeach
              </tbody>

            </table>
          </div>
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