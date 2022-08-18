<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="mb-4">Assignment Details</h5>
            <div class="row"> 
              <div class="col-lg-12 mx-auto">
                <h3 class="mt-lg-0 mt-4">{{ $assignment->judul }}</h3>
                <br>
                <h5>Pertemuan Ke- {{ $assignment->pertemuan_id }}</h5>
                <span class="badge badge-warning">{{ $assignment->jenis }}</span>
                <span class="badge badge-success">{{ $assignment->deadline }}</span>
                <br>
                <label class="mt-4">Deskripsi</label>
                <p>
                  {{ $assignment->deskripsi }}
                </p>
                <div class="row mt-4">
                  <div class="col-lg-5">
                    <a href="{{ $assignment->file }}" class="btn bg-gradient-primary mb-0 mt-lg-auto w-100" target="_BLANK">Lihat Berkas Tugas</a>
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
          <h6>Data Mahasiswa</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Assignment</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($userAssignment->where('assignment_id', $assignment->id) as $item)
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1">
                        <div>
                          <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/blue-shoe.jpg" class="avatar me-3" alt="image">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $item->user->name }}</h6>
                          <p class="text-sm font-weight-bold text-secondary mb-0"><span class="text-success">Submitted</span> assignment</p>
                        </div>
                      </div>
                    </td>
                    <td class="">
                      <a href="{{route('showUserAssignment',$item->id)}}" class="btn btn-link text-dark"><i class="fas fa-file-pdf text-lg me-1"></i>Cek Nilai</a>
                    </td>
                    <td class="">
                      <a href="{{ asset($item->assignment) }}" class="btn btn-link text-dark" target="_BLANK"><i class="fas fa-download text-lg me-1"></i>Download Assignment</a>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-bold mb-0">{{ $item->grade }}</p>
                    </td>
                    <td class="align-middle text-end">
                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                        <button class="btn btn-link text-dark px-3 mb-0 btn-update" data-link="{{ route('grading', $item->id) }}" data-grade="{{ $item->grade ?? 0 }}" data-grade_1="{{ $item->grade_1 ?? 0 }}" data-grade_2="{{ $item->grade_2 ?? 0 }}" data-grade_3="{{ $item->grade_3 ?? 0 }}" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp"><i class="fas fa-user-edit text-secondary"></i></button>
                        {{-- <a class="btn btn-link text-dark px-3 mb-0" href="#"><i class="fas fa-user-edit text-secondary"></i></a> --}}
                        
                        </button>
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

    <!-- Grading Modal -->
    <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Grading!</h3>
                  <p class="mb-0">Enter grade and feedback</p>
              </div>
              <div class="card-body pb-3">
                <form role="form text-left" id="grading" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <label>Grade</label>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="grade" id="grade" class="form-control" placeholder="Grade" aria-label="Name" aria-describedby="name-addon" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kedalaman Analisa</label>
                        <textarea class="form-control" name="feedback_1" id="feedback_1" aria-label="With textarea" rows="4" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Grade</label>
                        <input type="number" min="0" max="100" name="grade_1" id="grade_1" class="form-control grade-value" placeholder="Grade" aria-label="Name" aria-describedby="name-addon" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Flow Argumentasi dan Banyaknya Rujukan</label>
                        <textarea class="form-control" name="feedback_2" id="feedback_2" aria-label="With textarea" rows="4" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Grade</label>
                        <input type="number" min="0" max="100" name="grade_2" id="grade_2" class="form-control grade-value" placeholder="Grade" aria-label="Name" aria-describedby="name-addon" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kosmetika dan Alur Tampilan</label>
                        <textarea class="form-control" name="feedback_2" id="feedback_2" aria-label="With textarea" rows="4" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Grade</label>
                        <input type="number" min="0" max="100" name="grade_3" id="grade_3" class="form-control grade-value" placeholder="Grade" aria-label="Name" aria-describedby="name-addon" >
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    @push('scripts')
    <script type="text/javascript">
      $(document).ready(function() {
        $('select').selectpicker();
      });

      $('.btn-update').click(function(event) {
        var id = $(this).data("link");
        var grade = $(this).data("grade");
        var grade_1 = $(this).data("grade_1");
        var grade_2 = $(this).data("grade_2");
        var grade_3 = $(this).data("grade_3");

        $('#grading').attr('action', id);
        $('#grade').val(grade);
        $('#grade_1').val(grade_1);
        $('#grade_2').val(grade_2);
        $('#grade_3').val(grade_3);

        console.log($('#grading'));

      });

      $('.grade-value').on('change', function(){
        $('#grade').val(
          $('#grade_1').val() * 0.5 + $('#grade_2').val() * 0.3 + $('#grade_3').val() *0.2
        );

        //lebih baik dikasih db untuk persentasenya, biar enak diubahnya
      });

      

      
    </script>
    @endpush
  
    {{-- @push('scripts')
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
    @endpush --}}
  
  
  
  </x-app-layout>