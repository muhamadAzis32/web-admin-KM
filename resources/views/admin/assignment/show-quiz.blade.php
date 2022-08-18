<x-app-layout>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="mb-4">Quiz Details</h5>
              <div class="row">
                <div class="col-lg-12 mx-auto">
                  <h3 class="mt-lg-0 mt-4">{{ $quiz->judul }}</h3>
                  <br>
                  <h5>Pertemuan Ke- {{ $quiz->pertemuan_id }}</h5>
                  <span class="badge badge-success">Pre test dan Post test</span>
                  <br>
                  <label class="mt-4">Deskripsi</label>
                  <p>
                    {{ $quiz->deskripsi }}
                  </p>
                  <div class="row mt-4">
                    <div class="col-lg-5">
                      <a href="{{ route('question', $quiz->id) }}" class="btn bg-gradient-primary mb-0 mt-lg-auto w-100" target="_BLANK">Lihat Soal Quiz</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Data Mahasiswa Mengerjakan Quiz</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($nilai->where('quiz_id', $quiz->id) as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div>
                            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/blue-shoe.jpg" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->user->name }}</h6>
                            <p class="text-sm font-weight-bold text-secondary mb-0"><span class="text-success">Submitted</span> quiz</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm font-weight-bold mb-0">{{ $item->grade }}</p>
                      </td>
                      <td class="align-middle text-end">
                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          {{-- <a class="btn btn-link text-dark px-3 mb-0" href="#"><i class="fas fa-user-edit text-secondary"></i></a> --}}
                          <a href="{{ url('/user-quiz/'.$item->user->id, $item->quiz_id) }}" class="btn bg-gradient-info mb-0"> Lihat Jawaban</a>
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
    </div>
    <div class="col-md-4">
    </x-app-layout>