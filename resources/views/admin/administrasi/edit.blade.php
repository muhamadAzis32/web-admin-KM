<x-app-layout>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
          <div class="card card-body mt-4">
            <h6 class="mb-0">Verifiikasi Data</h6>
            <hr class="horizontal dark my-3">
            <div class="card-body">
              <form class="row g-3" role="form text-left" action="{{route('administrasi.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
					<h5 class="mb-0">Data Diri</h5>
					<!-- Last name -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Nama Lengkap <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nama_lengkap" value="{{$admin->nama_lengkap}}" readonly>
							</div>
						</div>
					</div>

					<!-- NIK -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">NIK <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nik" value="{{$admin->nik}}" readonly>
							</div>
						</div>
					</div>

					<!-- Email -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Email <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="email" class="form-control" name="email" value="{{$admin->email}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Program Studi -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Program Studi / Jurusan</h6>
							</div>
						
							<div class="col-lg-8">
								<div class="row g-2 g-sm-4">
									<div class="col-12">
										<select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm" name="prodi">
											<option value="{{$admin->prodi}}" readonly selected>{{$admin->prodi}}</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option>15</option>
											<option>16</option>
											<option>17</option>
											<option>18</option>
											<option>19</option>
											<option>20</option>
											<option>21</option>
											<option>22</option>
											<option>23</option>
											<option>24</option>
											<option>25</option>
											<option>26</option>
											<option>27</option>
											<option>28</option>
											<option>29</option>
											<option>30</option>
											<option>31</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <!-- Tahun Ajar -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Tahun Ajar <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="tahun_ajar" value="{{$admin->tahun_ajar}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Semester -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Semester <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="semester" value="{{$admin->semester}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Alamat domisili -->
					<div class="col-12">
						<div class="row g-xl-0">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Alamat domisili <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<textarea class="form-control" rows="3" name="alamat_domisili" value="{{$admin->alamat_domisili}}" readonly>{{$admin->alamat_domisili}}</textarea>
							</div>
						</div>
					</div>

                    <!-- Alamat ktp -->
					<div class="col-12">
						<div class="row g-xl-0">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Alamat sesuai KTP <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<textarea class="form-control" rows="3"  name="alamat_ktp" value="{{$admin->alamat_ktp}}" readonly>{{$admin->alamat_ktp}}</textarea>
							</div>
						</div>
					</div>

                    <!-- No HP -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">No HP <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="no_hp" value="{{$admin->no_hp}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Tempat Lahir -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Tempat Lahir <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="tempat_lahir" value="{{$admin->tempat_lahir}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Tanggal Lahir -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Tanggal Lahir <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="date" class="form-control" name="tgl_lahir" value="{{$admin->tgl_lahir}}" readonly>
							</div>
						</div>
					</div>
                    {{-- <div class="col-12">
                        <div class="row g-xl-0 align-items-center">
                            <div class="col-lg-4">
                                <h6 class="mb-lg-0">Tanggal Lahir</h6>
                            </div>
                        
                            <div class="col-lg-8">
                                <div class="row g-2 g-sm-4">
                                    <div class="col-4">
                                        <select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                                            <option value="">Date</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                            <option>21</option>
                                            <option>22</option>
                                            <option>23</option>
                                            <option>24</option>
                                            <option>25</option>
                                            <option>26</option>
                                            <option>27</option>
                                            <option>28</option>
                                            <option>29</option>
                                            <option>30</option>
                                            <option>31</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                                            <option value="">Month</option>
                                            <option>Jan</option>
                                            <option>Feb</option>
                                            <option>Mar</option>
                                            <option>Apr</option>
                                            <option>Jun</option>
                                            <option>Jul</option>
                                            <option>Aug</option>
                                            <option>Sep</option>
                                            <option>Oct</option>
                                            <option>Nov</option>
                                            <option>Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                                            <option value="">Year</option>
                                            <option>1990</option>
                                            <option>1991</option>
                                            <option>1992</option>
                                            <option>1993</option>
                                            <option>1994</option>
                                            <option>1995</option>
                                            <option>1996</option>
                                            <option>1997</option>
                                            <option>1998</option>
                                            <option>1999</option>
                                            <option>2000</option>
                                            <option>2001</option>
                                            <option>2002</option>
                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

					<!-- Gender -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Jenis Kelamin <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<div class="d-flex">
									<div class="form-check radio-bg-light me-4">
										<input class="form-check-input selected" type="radio" name="kelamin" value="laki-laki" {{$admin->kelamin == 'laki-laki' ? 'checked' : '' }} readonly>
										<label class="form-check-label" for="flexRadioDefault1">
											Laki-laki
										</label>
									</div>
									<div class="form-check radio-bg-light">
										<input class="form-check-input selected" type="radio" name="kelamin" value="perempuan" {{$admin->kelamin == 'perempuan' ? 'checked' : ''}} readonly>
										<label class="form-check-label" for="flexRadioDefault2">
											Perempuan
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Divider -->
					<hr class="my-5">

					<!-- Data Keluarga -->
					<h5 class="mt-0">Data Keluarga</h5>
					
					<!-- Tinggal dengan siapa -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Tinggal dengan siapa <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="tinggal" value="{{$admin->tinggal}}" readonly>
							</div>
						</div>
					</div>

					<!-- Relation with applicant -->
					{{-- <div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Relation with applicant <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="relation">
							</div>
						</div>
					</div> --}}

					<!-- Yang Membiayai -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Yang Membiayai <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="pembiaya" value="{{$admin->pembiaya}}" readonly>
							</div>
						</div>
					</div>

					<!-- Nama Ayah -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Nama Ayah (beri tanda Alm bila sudah tiada)<span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nama_ayah" value="{{$admin->nama_ayah}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Nama Ibu -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Nama Ibu (beri tanda Alm bila sudah tiada)<span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nama_ibu" value="{{$admin->nama_ibu}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Pekerjaan Ayah -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Pekerjaan Ayah <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="kerja_ayah" value="{{$admin->kerja_ayah}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Penghasilan Ayah -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Penghasilan Ayah <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="penghasilan_ayah" value="{{$admin->penghasilan_ayah}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Pekerjaan Ibu -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Pekerjaan Ibu <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="kerja_ibu" value="{{$admin->kerja_ibu}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Penghasilan Ibu -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Penghasilan Ibu <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="penghasilan_ibu" value="{{$admin->penghasilan_ibu}}" readonly>
							</div>
						</div>
					</div>

					<!-- Pekerjaan diri sendiri -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Pekerjaan diri sendiri <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="pekerjaan" value="{{$admin->pekerjaan}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Penghasilan diri sendiri -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Penghasilan diri sendiri per bulan <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="penghasilan" value="{{$admin->penghasilan}}" readonly>
							</div>
						</div>
					</div>

					<!-- Divider -->
					<hr class="my-5">

					<!-- Dokumen yang diperlukan -->
					<h5 class="mt-0">Dokumen yang diperlukan</h5>

					<!-- Pakta Integritas -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Pakta Integritas <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="pakta_integritas" value="{{$admin->pakta_integritas}}" readonly>
							</div>
						</div>
					</div>  

                    <!-- Scan KTP -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Scan KTP <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="scan_ktp" value="{{$admin->scan_ktp}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Scan Kartu Keluarga -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Scan Kartu Keluarga <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="scan_kk" value="{{$admin->scan_kk}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Ijazah Terbaru -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Ijazah Terbaru <span class="text-danger">*</span></h6>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="scan_ijazah" value="{{$admin->scan_ijazah}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Pas Foto -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Pas Foto 4 x 6 <span class="text-danger">*</span></h6>
								<p class="mb-lg-0">Background warna merah </p>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="pas_foto" value="{{$admin->pas_foto}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Transkip Nilai -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Transkip Nilai / KHS </h6>
								<p class="mb-lg-0">Bila telah kuliah di tempat lain </p>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="transkip" value="{{$admin->transkip}}" readonly>
							</div>
						</div>
					</div>

                    <!-- Surat Rekomendasi -->
					<div class="col-12">
						<div class="row g-xl-0 align-items-center">
							<div class="col-lg-4">
								<h6 class="mb-lg-0">Surat Rekomendasi </h6>
								<p class="mb-lg-0">Didapatkan dari kampus asal </p>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="surat_rekomendasi" value="{{$admin->surat_rekomendasi}}" readonly>
							</div>
						</div>
					</div>

					<!-- Divider -->
					<hr class="my-5">

					<!-- Program Belajar Kampus Gratis -->
					<h5 class="mt-0">Program Belajar Kampus Gratis</h5>

					<!-- Program -->
                    <div class="col-lg-4">
                        <h6 class="mb-lg-0">Pilih Program </h6>
                    </div>
					<div class="col-lg-8">
                        <div class="d-flex">
                            <div class="form-check radio-bg-light me-4">
                                <input class="form-check-input" type="radio" name="program_id" value="D1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    D1
                                </label>
                            </div>
                            <div class="form-check radio-bg-light me-4">
                                <input class="form-check-input" type="radio" name="program_id" value="S1">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    S1
                                </label>
                            </div>
                            <div class="form-check radio-bg-light">
                                <input class="form-check-input" type="radio" name="program_id" value="Kursus">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Kursus
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="isVerified">
                <div class="text-end">
                        <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                  <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Verifikasi</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- @push('scripts')
    <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
     });
    </script>
    @endpush --}}
  </x-app-layout>