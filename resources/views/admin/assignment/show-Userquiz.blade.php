<x-app-layout>
    <main class="main-content max-height-vh-100 h-100">
        <div class="container-fluid my-3 py-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-2">Jawaban Quiz {{ $nilai->user->name }}</h6>
                                    <h6>Pertemuan {{ $quiz->pertemuan->judul }}</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <span class="badge badge-success">Submited</span>
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
                            <p>Nilai Quiz</p>
                            <h3>{{ $nilai->grade }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($answer as $item)
          <div class="row mt-4">
            <div class="col-lg-12 col-md-6 mt-2">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <p>Soal</p>
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
          </div>
        @endforeach
        
      </div>
    </main>
</x-app-layout>
