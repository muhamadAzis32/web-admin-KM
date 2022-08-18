<x-app-layout>
    <main class="main-content max-height-vh-100 h-100">
        <div class="container-fluid my-3 py-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-2">Detail Quiz</h6>
                                    <h6>Pertemuan {{ $quiz->pertemuan->judul }}</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <span class="badge badge-success">Imported</span>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <ul class="list-group">
                                    <li
                                        class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">{{ $quiz->mataKuliah->judul }}</h6>
                                            <span class="mb-2 text-xs">Deskripsi : <span
                                                    class="text-dark font-weight-bold ms-sm-2">{{ $quiz->deskripsi }}</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-md-0 mt-4">
                    <div class="card h-100">
                        <div class="card-body mt-4" align="center">
                            <p>Total Soal</p>
                            <h3>{{ $totalSoal }}</h3>
                        </div>
                        {{-- <div class="card-body pt-4 p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Details</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Mahasiswa Mengerjakan</h6>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        5
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Mahasiswa Belum Mengerjakan</h6>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        2
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Mahasiswa Berhasil Mengerjakan</h6>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        4
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Mahasiswa Tidak Berhasil Mengerjakan</h6>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        1
                      </div>
                    </li>
                  </ul>
                </div> --}}
                    </div>
                </div>
            </div>
        </div>
        @foreach ($question as $item)
          <div class="row mt-4">
            <div class="col-lg-12 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Soal Nomor {{ $item->no }}</p>
                    <div class="ms-auto">
                      @if ($item->jawaban == 1)
                        <span class="badge badge-primary">Jawaban: A</span>
                      @elseif ($item->jawaban == 2)
                        <span class="badge badge-primary">Jawaban: B</span>
                      @elseif ($item->jawaban == 3)
                        <span class="badge badge-primary">Jawaban: C</span>
                      @elseif ($item->jawaban == 4)
                        <span class="badge badge-primary">Jawaban: D</span>
                      @elseif ($item->jawaban == 5)
                        <span class="badge badge-primary">Jawaban: E</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->soal }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Opsi A</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->opsi_a }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Opsi B</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->opsi_b }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Opsi C</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->opsi_c }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Opsi D</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->opsi_d }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Opsi E</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->opsi_e }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Penjelasan</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="mb-0">{{ $item->penjelasan }}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </main>
</x-app-layout>
