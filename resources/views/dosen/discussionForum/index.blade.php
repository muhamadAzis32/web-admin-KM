<x-app-layout>
  <div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{Auth::user()->name}}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{Auth::user()->role}}
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <div class="text-end ms-auto">
              <button type="button" class="btn btn-sm bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#discussionModal">
                <i class="fas fa-plus pe-2"></i> Add Discussion
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card overflow-scroll">
          <div class="card-body d-flex">
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg border-1 rounded-circle bg-gradient-primary">
                <i class="fas fa-plus text-white"></i>
              </a>
              <p class="mb-0 text-sm" style="margin-top:6px;">Add story</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/team-1.jpg">
              </a>
              <p class="mb-0 text-sm">Abbie W</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/team-2.jpg">
              </a>
              <p class="mb-0 text-sm">Boris U</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/team-3.jpg">
              </a>
              <p class="mb-0 text-sm">Kay R</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/team-4.jpg">
              </a>
              <p class="mb-0 text-sm">Tom M</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/team-5.jpg">
              </a>
              <p class="mb-0 text-sm">Nicole N</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/marie.jpg">
              </a>
              <p class="mb-0 text-sm">Marie P</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-primary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/bruce-mars.jpg">
              </a>
              <p class="mb-0 text-sm">Bruce M</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-secondary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/ivana-squares.jpg">
              </a>
              <p class="mb-0 text-sm">Sandra A</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-secondary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/kal-visuals-square.jpg">
              </a>
              <p class="mb-0 text-sm">Katty L</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-secondary">
                <img alt="Image placeholder" class="p-1" src="../../../assets/img/ivana-square.jpg">
              </a>
              <p class="mb-0 text-sm">Emma O</p>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
              <a href="javascript:;" class="avatar avatar-lg rounded-circle border border-secondary">
                <img alt="Image placeholder" class="p-1" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/team-9.jpg">
              </a>
              <p class="mb-0 text-sm">Tao G</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      {{-- Postingan Discussion --}}
      <div class="col-12 col-lg-8">
        @foreach ($post as $item)
        <div class="row mb-4">
          <div class="card">
            <div class="col-12">
              <div class="row align-items-center mb-3 border-bottom">
                <div class="col-9">
                  <div class="card-header  py-3">
                    <div class="d-flex">
                      <a href="javascript:;">
                        <img src="../../../assets/img/team-4.jpg" class="avatar" alt="profile-image">
                      </a>
                      <div class="mx-3">
                        <a href="javascript:;" class="text-dark font-weight-600 text-sm">{{ $item->user->name }}</a>
                        <small class="d-block text-muted">{{ $item->created_at }}</small>
                      </div>
                    </div>
                  </div>
                </div>
                @if ($item->user_id == Auth::user()->id)
                <div class="col-3 text-end">
                  <div class="dropstart">
                    <a href="javascript:;" class="text-secondary" id="dropdownMarketingCard" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="dropdownMarketingCard">
                      <li>
                        <button type="button" class="dropdown-item border-radius-md btn-update" data-bs-toggle="modal" data-bs-target="#editDiscussionModal" data-link="{{ route('dosenUpdate', $item->id) }}" data-judul="{{ $item->judul }}" data-isi="{{ $item->isi }}">Edit Post</button>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li>
                        <form method="get" action="{{route('destroy-discussion-forum',$item->id)}}">
                          @csrf
                          <button class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Post</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
                @endif
              </div>
            </div>
            <div class="card-body">
              <h5 class="mb-2">
                <a href="javascript:;">{{ $item->judul }}</a>
              </h5>
              <p class="mb-4">
                {!! $item->isi !!}
              </p>
              @if ($item->gambar != NULL)
              <img alt="Image placeholder" src="{{ asset( $item->gambar) }}" class="img-fluid border-radius-lg shadow-lg">
              @endif

              <div class="row align-items-center px-2 mt-4 mb-2">
                <div class="col-sm-6">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <form method="post" action="{{route('tambahLike')}}">
                        @csrf
                        <input type="hidden" name="discussion_id" value="{{$item->id}}">
                        <button class="btn-hola">
                          <i class="ni ni-like-2 me-1 cursor-pointer"></i>
                        </button>
                        <span class="text-sm me-3 ">{{$totalLike->where('discussion_id',$item->id)->count()}}</span>
                      </form>
                    </div>
                    {{-- LAGI EDIT KOMEN  --}}
                    <div class="d-flex align-items-center">
                      <button class="toogle-reply btn-hola">
                        <i class="ni ni-chat-round me-1 cursor-pointer"></i>
                        <span class="text-sm me-3 ">{{$totalKomen->where('discussion_id',$item->id)->count()}}</span>
                      </button>
                    </div>
                    {{-- <div class="d-flex align-items-center">
                      <i class="ni ni-curved-next me-1 cursor-pointer"></i>
                      <span class="text-sm me-2">12</span>
                    </div> --}}
                  </div>
                </div>

                <hr class="horizontal dark my-3">
              </div>
              <!-- Comments -->
              <div class="mb-1 komen">
                @foreach ($reply->where('discussion_id',$item->id) as $item1)
                <div class="d-flex mt-3">
                  <div class="flex-shrink-0">
                    <img alt="Image placeholder" class="avatar rounded-circle" src="../../../assets/img/team-5.jpg">
                  </div>

                  <div class="flex-grow-1 ms-3">
                    <h6 class="h5 mt-0"> {{$item1->user->name}}</h6>
                    <p class="text-sm">{!!$item1->isi!!}</p>
                    <div class="d-flex">
                      <form action="{{route('tambahlikeKomen')}}" method="post">
                        @csrf
                        <input type="hidden" name="reply_id" value="{{$item1->id}}">
                        <button class="btn-hola ni ni-like-2 me-1 cursor-pointer"></button>
                      </form>
                      <span class="text-sm me-2">{{$totalLike2->where('discussion_reply_id',$item1->id)->count()}}</span>
                      
                      <div>
                        <i class="ni ni-curved-next me-1 cursor-pointer"></i>
                      </div>
                      <span class="text-sm me-2">1 share</span>
                    </div>
                  </div>
                  @if ($item1->user_id == Auth::user()->id)
                  <div class="col-3 text-end">
                    <div class="dropstart">
                      <a href="javascript:;" class="text-secondary" id="dropdownMarketingCard" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="dropdownMarketingCard">
                        <li>
                          <button type="button" class="dropdown-item border-radius-md btn-komenUpdate" data-bs-toggle="modal" data-bs-target="#komenUpdateModal" data-link1="{{ route('komenUpdate', $item1->id) }}" data-isi1="{{ $item1->isi }}">Edit Comment</button>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>
                          <form method="get" action="{{route('hapusKomen',$item1->id)}}">
                            @csrf
                            <button class="dropdown-item border-radius-md text-danger" href="javascript:;">Delete Comment</button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  @endif
                </div>

                <div class="card-body pt-2">
                  {{-- REPLYKOMEN --}}
                  @foreach ($reply2->where('discussion_reply_id',$item1->id) as $reply2s)
                    <div class="d-flex align-items-center">
                      <div class="mb-1">
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img alt="Image placeholder" class="avatar rounded-circle" src="../../../assets/img/bruce-mars.jpg">
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h6 class="h5 mt-0">{{$reply2s->user->name}}</h6>
                            <p class="text-sm">{!!$reply2s->isi!!}</p>
                            <div class="d-flex">
                              
                              <form action="{{route('tambahlikeKomen2')}}" method="post">
                                @csrf
                                <input type="hidden" name="reply_id" value="{{$reply2s->id}}">
                                <button class="btn-hola ni ni-like-2 me-1 cursor-pointer"></button>
                              </form>
                              <span class="text-sm me-2">{{$totalLike3->where('discussion_reply_id',$reply2s->id)->count()}}</span>
                              <div>
                                <i class="ni ni-curved-next me-1 cursor-pointer"></i>
                              </div>
                              <span class="text-sm me-2">2 shares</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  <div class="d-flex mt-4">
                    <div class="flex-shrink-0">
                      <img alt="Image placeholder" class="avatar rounded-circle me-3" src="../../../assets/img/team-4.jpg">
                    </div>
                    <div class="flex-grow-1 my-auto">
                      <form action="{{route('tambahreplyKomen')}}" method="post">
                        @csrf
                        <input class="form-control " name="isi" placeholder="Write your reply">
                        <input type="hidden" name="reply_id" value="{{$item1->id}}">
                        <input type="submit" style="position: absolute; left: -9999px" />
                      </form>
                    </div>
                  </div>

                </div>
                @endforeach

                <div class="d-flex mt-4">
                  <div class="flex-shrink-0">
                    <img alt="Image placeholder" class="avatar rounded-circle me-3" src="../../../assets/img/team-4.jpg">
                  </div>
                  <div class="flex-grow-1 my-auto">
                    <form action="{{route('tambahKomen')}}" method="post">
                      @csrf
                      <input class="form-control " name="isi" placeholder="Write your comment">
                      <input type="hidden" name="discussion_id" value="{{$item->id}}">
                      <input type="submit" style="position: absolute; left: -9999px" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-12 col-lg-4">
        <div class="card mb-3 mt-lg-0 mt-4">
          <div class="card-body pb-0">
            <div class="row align-items-center mb-3">
              <div class="col-9">
                <h5 class="mb-1 text-gradient text-primary">
                  <a href="javascript:;">Leaderboard</a>
                </h5>
              </div>
              <div class="col-3 text-end">
                <div class="dropstart">
                  <a href="javascript:;" class="text-secondary" id="dropdownMarketingCard" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="dropdownMarketingCard">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Edit Team</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Add Member</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">See Details</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Team</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <p>A group of people who collectively are responsible for all of the work necessary to produce working, validated assets.</p>
            <div class="card-body p-3">
              <ul class="list-group">
                @foreach ($leaderboard as $item)
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="w-100">
                    <div class="d-flex align-items-center mb-2">
                      <span class="me-2 text-sm font-weight-bold text-capitalize ms-2">{{ $item->user->name }}</span>
                      <span class="ms-auto text-sm font-weight-bold">{{ $item->nilai }}</span>
                    </div>
                    <div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-gradient-dark w-{{ $item->nilai }}" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="{{ $item->nilai }}"></div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="card mt-4 mb-3">
          <div class="card-body pb-0">
            <div class="row align-items-center mb-3">
              <div class="col-9">
                <h5 class="mb-1 text-gradient text-primary">
                  <a href="javascript:;">Design</a>
                </h5>
              </div>
              <div class="col-3 text-end">
                <div class="dropstart">
                  <a href="javascript:;" class="text-secondary" id="dropdownDesignCard" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="dropdownDesignCard">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Edit Team</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Add Member</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">See Details</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Team</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <p>Because it's about motivating the doers. Because I’m here to follow my dreams and inspire other people to follow their dreams, too.</p>
            <ul class="list-unstyled mx-auto">
              <li class="d-flex">
                <p class="mb-0">Industry:</p>
                <span class="badge badge-secondary ms-auto">Design Team</span>
              </li>
              <li>
                <hr class="horizontal dark">
              </li>
              <li class="d-flex">
                <p class="mb-0">Rating:</p>
                <div class="rating ms-auto">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </li>
              <li>
                <hr class="horizontal dark">
              </li>
              <li class="d-flex">
                <p class="mb-0">Members:</p>
                <div class="avatar-group ms-auto">
                  <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Martin Doe">
                    <img alt="Image placeholder" src="../../../assets/img/team-4.jpg">
                  </a>
                  <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                    <img alt="Image placeholder" src="../../../assets/img/team-3.jpg">
                  </a>
                  <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexa Tompson">
                    <img alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                  </a>
                  <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexandra Smith">
                    <img alt="Image placeholder" src="../../../assets/img/team-5.jpg">
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-body p-3">
            <div class="d-flex">
              <div class="avatar avatar-lg">
                <img alt="Image placeholder" src="../../../assets/img/small-logos/logo-slack.svg">
              </div>
              <div class="ms-2 my-auto">
                <h6 class="mb-0">Slack Meet</h6>
                <p class="text-xs mb-0">11:00 AM</p>
              </div>
            </div>
            <p class="mt-3"> You have an upcoming meet for Marketing Planning</p>
            <p class="mb-0"><b>Meeting ID:</b> 902-128-281</p>
            <hr class="horizontal dark">
            <div class="d-flex">
              <button type="button" class="btn btn-sm bg-gradient-success mb-0">
                Join
              </button>
              <div class="avatar-group ms-auto">
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexa Tompson">
                  <img alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                </a>
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                  <img alt="Image placeholder" src="../../../assets/img/team-2.jpg">
                </a>
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                  <img alt="Image placeholder" src="../../../assets/img/team-3.jpg">
                </a>
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Martin Doe">
                  <img alt="Image placeholder" src="../../../assets/img/ivana-squares.jpg">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-body p-3">
            <div class="d-flex">
              <div class="avatar avatar-lg">
                <img alt="Image placeholder" src="../../../assets/img/small-logos/logo-invision.svg">
              </div>
              <div class="ms-2 my-auto">
                <h6 class="mb-0">Invision</h6>
                <p class="text-xs mb-0">4:50 PM</p>
              </div>
            </div>
            <p class="mt-3"> You have an upcoming video call for <span class="text-primary">Soft Design</span> at 5:00 PM.</p>
            <p class="mb-0"><b>Meeting ID:</b> 111-968-981</p>
            <hr class="horizontal dark">
            <div class="d-flex">
              <button type="button" class="btn btn-sm bg-gradient-success mb-0">
                Join
              </button>
              <div class="avatar-group ms-auto">
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexa Tompson">
                  <img alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                </a>
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                  <img alt="Image placeholder" src="../../../assets/img/team-2.jpg">
                </a>
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                  <img alt="Image placeholder" src="../../../assets/img/team-3.jpg">
                </a>
                <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Martin Doe">
                  <img alt="Image placeholder" src="../../../assets/img/ivana-squares.jpg">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">

    <!-- Discussion Modal -->
    <div class="modal fade" id="discussionModal" tabindex="-1" role="dialog" aria-labelledby="discussionModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add discussion to develop knowladge</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('discussionForum.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Judul Diskusi</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul diskusi" id="recipient-name">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" placeholder="Masukkan judul diskusi" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Mata Kuliah</label>
                <select class="form-control" name="mata_kuliah_id" id="exampleFormControlSelect1">
                  @foreach ($AksesKelas->where('user_id',Auth::user()->id) as $item)
                  <option value="{{$item->matkul->id}}">{{$item->matkul->judul}}</option>
                  @endforeach
                </select> 
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Gambar</label>
                <input type="file" class="form-control" name="gambar">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Isi</label>
                <textarea class="form-control" name="isi" id="basic-conf"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">POST!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">

    <!-- Edit Modal -->
    <div class="modal fade" id="editDiscussionModal" tabindex="-1" role="dialog" aria-labelledby="editDiscussionModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit discussion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="dosenUpdate" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Judul Diskusi</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul diskusi" id="recipient-name">
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control" placeholder="Masukkan judul diskusi" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Isi</label>
                <textarea class="form-control basic-conf" name="isi" id="basic-conf2">
                  {{-- <span class="basic-conf">sd</span> --}}
                </textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">EDIT!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Komen -->
    <div class="modal fade" id="komenUpdateModal" tabindex="-1" role="dialog" aria-labelledby="komenUpdateModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="komenUpdate" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="message-text" class="col-form-label">Isi</label>
                <input class="form-control" name="isi" id="isi1">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">EDIT!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>

  tinymce.init({
    selector: '#basic-conf',
    selector:  '#basic-conf2',
    width: 450,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });



    $(document).ready(function() {
      // Toggles paragraphs display
      $(".toogle-reply").click(function() {
        $(".komen").toggle();
      });
    });

    $('.btn-update').click(function(event) {
      var id = $(this).data("link");
      var judul = $(this).data("judul");
      var isi = $(this).data("isi");
      var gambar = $(this).data("gambar");

      $('#dosenUpdate').attr('action', id);
      $('#judul').val(judul);
      $('.basic-conf').val('isi');
      $('#gambar').val(gambar);

      console.log($('.basic-conf'));

    });

    $('.btn-komenUpdate').click(function(event) {
      var id = $(this).data("link1");
      var isi = $(this).data("isi1");

      $('#komenUpdate').attr('action', id);
      $('#isi1').val(isi);

      console.log($('isi1'));

    });

    // $('.btn-komenUpdate').click(function(event) {
    //   var id = $(this).data("link");
    //   var isi = $(this).data("isi1");

    //   $('#komenUpdate').attr('action', id);
    //   $('#isi1').val(isi);

    //   console.log($('isi'));

    // });
  </script>
  @endpush
</x-app-layout>