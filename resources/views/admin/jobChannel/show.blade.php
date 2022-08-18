<x-app-layout>
  <div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Approval {{$jobChannel->posisi_pekerjaan}} di {{$jobChannel->nama_perusahaan}}</h6>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Nama</th>
                  <th class="text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Telepon</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CV</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($userJobChannel as $item)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $item->user->name }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->no_telp }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <a href="{{asset($item->cv)}}" target="_blank"><span class="text-secondary text-xs font-weight-bold">Cek Berkas</span></a>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">@if($item->approve == 1) Diterima
                      @else Belum Interview
                      </p>
                      @endif
                    </td>
                  <td>
                    <div class="ms-auto text-center">
                      <a class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" href="{{url('jobChannel/destroyUser', $item->id)}}"><i class="fas fa-trash text-secondary"></i></a>
                      <form action="{{url('jobChannel/approve', $item->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method('PUT')
                      <button class="btn btn-link text-dark px-3 mb-0 show_approve" ><i class="fas fa-user-edit text-secondary"></i></button>
                      {{-- <a class="btn btn-link text-dark px-3 mb-0" href="{{route('jobChannel.view', $item->id)}}"><i class="fas fa-eye text-secondary"></i></a> --}}
                      </form>
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
                title: `Tolak Pelamar?`,
                text: "Keputusan tidak dapat dirubah!",
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

        $('.show_approve').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Terima pelamar?`,
                text: "Keputusan tidak dapat dirubah!",
                icon: "success",
                buttons: true,
                primaryMode: true,
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