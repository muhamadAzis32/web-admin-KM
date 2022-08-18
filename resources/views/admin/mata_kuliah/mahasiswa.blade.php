<x-app-layout>
    <div class="row mt-4">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Mahasiswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Akhir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assignment</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quiz</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UTS</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UAS</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($nilaimahasiswa as $key => $item)
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div>
                            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/blue-shoe.jpg" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item['nama'] }}</h6>
                            {{-- <p class="text-sm font-weight-bold text-secondary mb-0"><span class="text-success">Submitted</span> exam</p> --}}
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-success">y</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm font-weight-bold mb-0">{{ $item['nilai'] }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm font-weight-bold mb-0">{{ $item['assignment'] }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm font-weight-bold mb-0">{{ $item['quiz'] }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm font-weight-bold mb-0">{{ $item['uts'] }}</p>
                      </td><td class="align-middle text-center text-sm">
                        <p class="text-sm font-weight-bold mb-0">{{ $item['uas'] }}</p>
                      </td>
                      <td class="align-middle text-end">
                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          {{-- <button class="btn btn-link text-dark px-3 mb-0 btn-update" data-link="{{ route('storeExam', $item['id']) }}" data-grade="{{ $item->grade ?? 0 }}" data-grade_1="{{ $item->grade_1 ?? 0 }}" data-grade_2="{{ $item->grade_2 ?? 0 }}" data-grade_3="{{ $item->grade_3 ?? 0 }}" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp"><i class="fas fa-user-edit text-secondary"></i></button> --}}
                          <a class="btn btn-link text-dark px-3 mb-0" href="{{url('/detail-nilai/'.$item['id'].'/'.$matkul->id)}}"><i class="fas fa-user-edit text-secondary"></i></a>
                          
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
</x-app-layout>