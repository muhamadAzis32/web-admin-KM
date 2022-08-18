<x-app-layout>
  <div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              Pertemuan Ke - {{ $pertemuan->pertemuan }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ $pertemuan->mataKuliah->judul }} <br>
              @foreach ($pertemuan->kontenVideo_id as $item)
                  {{$item['id']}}
              @endforeach
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Video</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                @foreach ($pertemuan->kontenVideo_id as $item)
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                    <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">
                        {{ App\Models\Pertemuan::getJudulVideo($item['id']) }}
                      </h6>
                      {{-- {{ App\Models\Pertemuan::getVideoAttribute($item['id']) }} --}}
                    </div>
                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="https://www.youtube.com/watch?v={{ App\Models\Pertemuan::getLinkVideo($item['id']) }}" target="_BLANK">Lihat Video</a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
              <div class="w-60">
                <p class="text-sm">
                  Terhitung tersedia dengan total <b>{{ $totalVideo }}</b> Konten Video  di Kampus Gratis.
                </p>
              </div>
              <div class="w-40 text-end">
                <a class="btn bg-gradient-dark mb-0 text-end" href="{{ route('kontenVideo.index') }}">Lihat Semua Konten Video</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Konten Dokumen</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                @foreach ($pertemuan->kontenDokumen_id as $item)
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                    <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ App\Models\Pertemuan::getJudulDokumen($item['id']) }}</h6>
                    </div>
                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="{{ asset(App\Models\Pertemuan::getFileDokumen($item['id'])) }}" target="_BLANK">Lihat Dokumen</a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
              <div class="w-60">
                <p class="text-sm">
                  Terhitung tersedia dengan total <b>{{ $totalDokumen }}</b> Konten Dokumen  di Kampus Gratis.
                </p>
              </div>
              <div class="w-40 text-end">
                <a class="btn bg-gradient-dark mb-0 text-end" href="{{ route('kontenDokumen.index') }}">Lihat Semua Konten Dokumen</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-app-layout>