<x-app-layout>
    <main class="main-content max-height-vh-100 h-100">
        <div class="container-fluid my-3 py-3">
          <div class="row">
            <div class="col-md-7">
              <div class="card">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                          <h6 class="mb-0">{{ $userAssignment->user->name }} Assignment's Details</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                          <i class="far fa-calendar-alt me-2"></i>
                          <small>{{ $userAssignment->created_at }}</small>
                          <span class="badge badge-success">Submitted</span>
                        </div>
                      </div>
                </div>
                <div class="card-body pt-4 p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">{{ $userAssignment->matakuliah->judul }}</h6>
                        <span class="mb-2 text-xs">Pertemuan : <span class="text-dark font-weight-bold ms-sm-2">{{ $userAssignment->pertemuan->judul }}</span></span>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Deskripsi</h6>
                        <p align= "justify">
                            {{ $userAssignment->pertemuan->deskripsi }}
                        </p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-5 mt-md-0 mt-4">
              <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                  <div class="row">
                    <div class="col-md-6">
                      <h6 class="mb-0">Grades</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body" align="center">
                    <p>Total Grade</p>
                    <h3>{{ $userAssignment->grade }}</h3>
                    <span class="badge badge-success">Pass</span>
                  </div>
                <div class="card-body pt-4 p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Details</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Kedalaman analisa</h6>
                          <span class="text-xs">{{ $userAssignment->feedback_1 }}</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        {{ $userAssignment->grade_1 }}
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Flow Argumentasi dan Banyaknya Rujukan</h6>
                          <span class="text-xs">{{ $userAssignment->feedback_2 }}</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        {{ $userAssignment->grade_2 }}
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Kosmetika dan Alur Tampilan</h6>
                          <span class="text-xs">{{ $userAssignment->feedback_3 }}</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        {{ $userAssignment->grade_3 }}
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        {{-- <div class="container-fluid my-3 py-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header pb-0 px-3">
                      <div class="row">
                          <div class="col-md-6">
                            <h6 class="mb-0">Attachment</h6>
                          </div>
                          <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="fas fa-file-pdf text-lg me-1"></i>
                            <span class="badge badge-danger">Pdf</span>
                          </div>
                        </div>
                  </div>
                  <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="mb-3 text-sm">Preview PDF</h6>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
      </main>
</x-app-layout>