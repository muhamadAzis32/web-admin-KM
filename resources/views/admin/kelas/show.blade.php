<x-app-layout>

    {{-- Mata Kuliah Modal --}}
    <div class="modal fade" id="matakuliahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="card-body">
                            <form role="form text-left" action="{{ route('mataKuliah.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Kode Mata Kuliah</label>
                                    <input type="text" class="form-control" name="kode" placeholder="Kode"
                                        aria-label="Kode" aria-describedby="email-addon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Nama"
                                        aria-label="Name" aria-describedby="email-addon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Deskripsi</label>
                                    <textarea class="form-control" aria-label="With textarea" placeholder="deskripsi"
                                        name="deskripsi" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Sks</label>
                                    <input type="number" class="form-control" name="sks" placeholder="sks"
                                        aria-label="Name" aria-describedby="email-addon" required>
                                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Semester</label>
                                    <input type="number" class="form-control" name="semester" placeholder="semester"
                                        aria-label="Name" aria-describedby="email-addon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Kategori</label>
                                    <select class="form-control" name="kategori_id" id="exampleFormControlSelect1">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"><i
                                            class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</button>
                                    <button type="submit" class="btn bg-gradient-dark"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Data Mata Kuliah</h6>
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                            data-bs-target="#matakuliahModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah
                            Data</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table id="datatable-search" class="table align-items-center mb-0">

                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kode</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Mata Kuliah</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Deskripsi</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Sks</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Level</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Program Studi</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($mataKuliah->where('kelas_id', $kelas->id) as $item)
                                <tr>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->kode }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->judul }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{!! $item->deskripsi !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{!! $item->sks !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $item->kategori->nama_kategori }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{ $item->kelas->nama }}</span>
                                    </td>
                                    <td>
                                        <div class="ms-auto text-center">
                                            <form action="{{ route('mataKuliah.destroy', $item->id) }}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"
                                                    class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm"
                                                    data-toggle="tooltip" title='Delete'><i
                                                        class="fas fa-trash text-secondary"></i></button>
                                            </form>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('mataKuliah.edit', $item->id) }}"><i
                                                    class="fas fa-user-edit text-secondary"></i></a>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('mataKuliah.show', $item->id) }}"><i
                                                    class="fas fa-eye text-secondary"></i></a>
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
        <script type="text/javascript">
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
