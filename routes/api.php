<?php

use App\Http\Controllers\API\AdministrationController;

use App\Http\Controllers\API\KelasController;
use App\Http\Controllers\API\EnrollMataKuliahController;
use App\Http\Controllers\API\EnrollStudiController;
use App\Http\Controllers\API\KontenDokumenController;
use App\Http\Controllers\API\KontenVideoController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\KalenderController;
use App\Http\Controllers\API\UserVideoController;
use App\Http\Controllers\API\UserDokumenController;
use App\Http\Controllers\API\UserAssignmentController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\DownloadController;
use App\Http\Controllers\API\MataKuliahController;
use App\Http\Controllers\API\PertemuanController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\API\UserQuizController;
use App\Http\Controllers\API\NilaiController;
use App\Http\Controllers\API\UserExamPGController;
use App\Http\Controllers\API\ViewController;
use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\IklanController;
use App\Http\Controllers\API\JobChannelController;
use App\Http\Controllers\API\ProfilController;
use App\Http\Controllers\API\AssignmentController;
// use App\Http\Controllers\API\AssignmentFileController;
use App\Http\Controllers\API\AssignmentPilganController;
use App\Http\Controllers\API\AssignmentTextController;
use App\Http\Controllers\API\DiscussionForumController;
use App\Http\Controllers\API\DiscussionReplyController;
use App\Http\Controllers\API\DiscussionReply2Controller;
use App\Http\Controllers\API\DiscussionLikeController;
use App\Http\Controllers\API\DiscussionLike2Controller;
use App\Http\Controllers\API\DokumenKonsultasiController;
use App\Http\Controllers\API\ExamController;
use App\Http\Controllers\API\LeaderboardController;
use App\Http\Controllers\API\TranskipController;
use App\Http\Controllers\API\UserExamController;
use App\Http\Controllers\API\Jadwal_kuliahController;
use App\Http\Controllers\API\UserJobChannelController;
use App\Http\Controllers\API\UserMandiriController;
use App\Http\Controllers\API\SertifikatController;
use App\Http\Controllers\API\GuideController;

use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\DataDosenController;
use App\Http\Controllers\API\UjiankuliahController;

use App\Models\DokumenKonsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 
Route::resource('/jadwal-matkul', Jadwal_kuliahController::class);
Route::resource('/dokumen-konsultasi', DokumenKonsultasiController::class);
Route::post('/administrasi', [AdministrationController::class, 'store']);
Route::post('/administrasi/{id}', [AdministrationController::class, 'update']); // Update adminstrasi
// Public routes
Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/registration', [PassportAuthController::class, 'apiRegist']);
Route::post('/login', [PassportAuthController::class, 'login']);

// Program
Route::resource('/program', ProgramController::class);

// Data Dosen
Route::resource('data-dosen', DataDosenController::class);

// Route progam studi
Route::get('/kelas/search/{name}', [KelasController::class, 'search']); 
Route::get('/kelas/{id}/video', [KelasController::class, 'kelas_video']); // Bug
Route::get('/kelas/{id}/dokumen', [KelasController::class, 'kelas_dokumen']); // Bug
Route::post('/kelas/{id}/video', [KontenVideoController::class, 'store']); // Bug
Route::post('/kelas/{id}/dokumen', [KontenDokumenController::class, 'store']); // Bug
Route::get('/kelas/program/{id}', [KelasController::class, 'program_kelas']);
Route::resource('/kelas', KelasController::class);

// Route kategori
Route::get('/kategori/search/{name}', [KategoriController::class, 'search']);
Route::get('/kategori/{id}/video', [KategoriController::class, 'kelas_video']); // Bug
Route::get('/kategori/{id}/dokumen', [KategoriController::class, 'kelas_dokumen']); // Bug
Route::resource('/kategori', KategoriController::class);

// Route mata kuliah
Route::resource('/mata-kuliah', MataKuliahController::class);

// Route konten dokumen
Route::get('/dokumen/search/{name}', [KontenDokumenController::class, 'search']);
Route::get('/kelas/{id}/dokumen/jumlah', [KontenDokumenController::class, 'jumlah_dokumen']); // Bug
Route::resource('/dokumen', KontenDokumenController::class);

// Route konten video
Route::get('/video/search/{name}', [KontenVideoController::class, 'search']);
Route::get('/kelas/{id}/video/jumlah', [KontenVideoController::class, 'jumlah_video']); // Bug
Route::resource('/video', KontenVideoController::class);

//Route Artikel
Route::get('/artikel/search/{judul}', [ArtikelController::class, 'search']);
Route::get('/artikel/new', [ArtikelController::class, 'latest_article']);
Route::resource('/artikel', ArtikelController::class);

//Route Iklan
Route::get('/iklan/{id}/download', [IklanController::class, 'download']);
Route::get('/iklan/{id}/view', [IklanController::class, 'view']);
Route::resource('iklan', IklanController::class);

//Route JobChannel
Route::get('/job_kerja', [JobChannelController::class, 'job_kerja']);
Route::get('/job_magang', [JobChannelController::class, 'job_magang']);
Route::get('/job_project', [JobChannelController::class, 'job_project']);
Route::get('/jobChannel/{id}/view', [JobChannelController::class, 'view']);
Route::resource('/jobChannel', JobChannelController::class);

//Route Quiz
Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/Pertemuan', [QuizController::class, 'Pertemuan']);
Route::get('/quiz/{id}', [QuizController::class, 'show']);

//User Quiz
Route::get('/user-quiz', [UserQuizController::class, 'index']);

//User ExamPG
Route::post('/user-exampg', [UserExamPGController::class, 'store']);

//Route Assignment
Route::get('/assignment', [AssignmentController::class, 'index']);
Route::get('/assignment/{id}/download', [AssignmentController::class, 'download']);
Route::get('/assignment/{id}/view', [AssignmentController::class, 'view']);
Route::get('/assignment/{id}', [AssignmentController::class, 'show']);

//Route Exam
Route::get('/exam/{id}/download', [ExamController::class, 'download']);
Route::get('/exam/{id}/view', [ExamController::class, 'view']);
Route::resource('/exam', ExamController::class);

//User Assignment
Route::resource('/userAssignment', UserAssignmentController::class);

//Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'index']);

//DiscussionForum
Route::get('/discussionForum', [DiscussionForumController::class, 'index']);
Route::get('/discussionForumMatkul/{id}', [DiscussionForumController::class, 'showByMatkul']);

//DiscussionReply
Route::get('/discussionReply/{id}', [DiscussionReplyController::class, 'index']);
Route::delete('/discussionReply/destroy/{id}', [DiscussionReplyController::class, 'destroy']);

//DiscussionReply2
Route::get('/discussionReply2/{id}', [DiscussionReply2Controller::class, 'index']);
Route::delete('/discussionReply2/destroy/{id}', [DiscussionReply2Controller::class, 'destroy']);

//DiscussionLike
Route::get('/discussionLike/{id}', [DiscussionLikeController::class, 'index']);
Route::delete('/discussionLike/destroy/{id}', [DiscussionLikeController::class, 'destroy']);

//DiscussionLike2
Route::get('/discussionLike2', [DiscussionLike2Controller::class, 'index']);
Route::delete('/discussionLike2/destroy/{id}', [DiscussionLike2Controller::class, 'destroy']);

//DiscussionLike2
// Route::get('/discussionLike3', [DiscussionLike3Controller::class, 'index']);
// Route::delete('/discussionLike3/destroy/{id}', [DiscussionLike3Controller::class, 'destroy']);

//Route Assignment Pilgan
Route::get('/assignmentPilgan', [AssignmentPilganController::class, 'index']);
Route::get('/assignmentPilgan/{mata_kuliah}/{pertemuan}', [AssignmentPilganController::class, 'show']);

//Route Assignment Text
// Route::get('/assignmentText', [AssignmentFileController::class, 'index']);

// Download and view Route
Route::get('download/{tipe}/{filename}', [DownloadController::class, 'index']);
Route::get('/dokumen/{id}/download', [KontenDokumenController::class, 'download']);
Route::get('/dokumen/{id}/view', [KontenDokumenController::class, 'view']);
Route::get('/view/{filename}', [ViewController::class, 'index']);
Route::get('/view2/{filename}', [ViewController::class, 'index2']);
Route::get('/kalender', [KalenderController::class, 'index']);

// Route Jumlah Mahasiswa
Route::get('/jumlah-enroll/{id}', [EnrollStudiController::class, 'enroll']);
Route::get('/jumlah-enroll-matkul/{id}', [EnrollMataKuliahController::class, 'enroll']);

//E-Guide
Route::get('/buku_panduan', [GuideController::class, 'buku_panduan']);
Route::get('/video_panduan', [GuideController::class, 'video_panduan']);
Route::get('/kamus_kg', [GuideController::class, 'kamus_kg']);
Route::get('/view3/{file_name}', [ViewController::class, 'view_buku_panduan']);

Route::get('/enroll/program/{id}', [EnrollStudiController::class, 'enroll_program']);

// Protected routes
Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('/dokumen-konsultasi', DokumenKonsultasiController::class);
    Route::resource('/ujian-kuliah', UjiankuliahController::class);
    Route::get('/getAdministrasi', [AdministrationController::class, 'getAdministrasi'])->name('getAdministrasi');
    Route::get('/sertifikat', [SertifikatController::class, 'sertifikat']);
    Route::get('/getAdministrasi', [AdministrationController::class, 'getAdministrasi'])->name('getAdministrasi');
    Route::get('/sertifikat', [SertifikatController::class, 'sertifikat']);
    //User Job Channel
    Route::post('/userjobchannel', [UserJobChannelController::class, 'store']);

    Route::put('/updateAdministrasi', [AdministrationController::class, 'updateAdministrasi'])->name('updateAdministrasi');

    //Transkip
    Route::get('/transkip', [TranskipController::class, 'index']);
    Route::get('/transkip/semester/{semester}', [TranskipController::class, 'transkipSemester']);

    //DiscussionForum
    Route::post('/discussionForum', [DiscussionForumController::class, 'store']);
    Route::put('/discussionForum/update/{id}', [DiscussionForumController::class, 'update']);
    Route::delete('/discussionForum/destroy/{id}', [DiscussionForumController::class, 'destroy']);

    //DiscussionReply
    Route::post('/discussionReply', [DiscussionReplyController::class, 'store']);
    Route::put('/discussionReply/update/{id}', [DiscussionReplyController::class, 'update']);

    //DiscussionReply2
    Route::post('/discussionReply2', [DiscussionReply2Controller::class, 'store']);
    Route::put('/discussionReply2/update/{id}', [DiscussionReply2Controller::class, 'update']);

    //DiscussionLike
    Route::post('/discussionLike', [DiscussionLikeController::class, 'store']);
    Route::put('/discussionLike/update/{id}', [DiscussionLikeController::class, 'update']);

    //DiscussionLike2
    Route::post('/discussionLike2', [DiscussionLike2Controller::class, 'store']);
    Route::put('/discussionLike2/update/{id}', [DiscussionLike2Controller::class, 'update']);

    //DiscussionLike3
    // Route::post('/discussionLike3', [DiscussionLike3Controller::class, 'store']);
    // Route::put('/discussionLike3/update/{id}', [DiscussionLike3Controller::class, 'update']);

    //Route Profil
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::delete('/profil/{id}', [ProfilController::class, 'destroy']);
    Route::get('/profil/{id}/view', [ProfilController::class, 'show']);

    Route::put('/enroll/video/{id}', [UserVideoController::class, 'update']);
    Route::put('/enroll/dokumen/{id}', [UserDokumenController::class, 'update']);

    Route::get('/enroll', [EnrollStudiController::class, 'index']);
    
    Route::get('/enroll/mata-kuliah', [EnrollMataKuliahController::class, 'index']);
    Route::get('enroll/video', [EnrollMataKuliahController::class, 'enrolled_video']);
    Route::get('enroll/dokumen', [EnrollMataKuliahController::class, 'enrolled_dokumen']);
    Route::get('/enroll/{id}', [EnrollMataKuliahController::class, 'findbyid']);
    Route::post('/enroll', [EnrollStudiController::class, 'store']);

    Route::delete('/unenroll/{id}', [EnrollStudiController::class, 'unenrolls']);
    Route::delete('/unenroll', [EnrollStudiController::class, 'unenrollsbykelasid']);
    Route::get('/pertemuan', [PertemuanController::class, 'index']);
    Route::get('/pertemuan/{id}', [PertemuanController::class, 'findbyid']);
    Route::get('/pertemuan_kuliah/{id}', [PertemuanController::class, 'pertemuan_matkul']);
    Route::get('/user-details', [PassportAuthController::class, 'userDetail']);
    Route::put('/user-details', [PassportAuthController::class, 'updateuserDetail']);
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::put('/kelas/{id}', [KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::put('/dokumen/{id}', [KontenDokumenController::class, 'update']);
    Route::delete('/dokumen/{id}', [KontenDokumenController::class, 'destroy']);

    Route::put('/video/{id}', [KontenVideoController::class, 'update']);
    Route::delete('/video/{id}', [KontenVideoController::class, 'destroy']);

    //User Assignment
    Route::post('/userAssignment', [UserAssignmentController::class, 'store']);

    // User Mandiri
    Route::post('/userMandiri', [UserMandiriController::class, 'store']);

    // Route User Exam
    Route::get('/userExam', [UserExamController::class, 'index']);
    Route::post('/userExam', [UserExamController::class, 'store']);
    Route::get('/userExam/{id}', [UserExamController::class, 'show']);

    //Route Nilai
    // Route::post('/nilaiQuiz', [NilaiController::class, 'nilaiQuiz']);
    Route::get('/gradeAssignment/{id}', [NilaiController::class, 'gradeAssignment']);
    Route::get('/gradeUts/{id}', [NilaiController::class, 'gradeUts']);
    Route::get('/gradeUas/{id}', [NilaiController::class, 'gradeUas']);
    Route::get('/gradeQuiz/{id}', [NilaiController::class, 'gradeQuiz']);

    //Route Quiz
    Route::post('/user-quiz', [UserQuizController::class, 'store']);
    Route::post('/nilai-quiz', [UserQuizController::class, 'nilaiQuiz']);

    Route::get('nilai-akhir/{matkul}', [NilaiController::class, 'nilaiAkhir']);

    //riyanti
    Route::get('get/pertemuan/{mata_kuliah_id}', [MataKuliahController::class, 'userModule']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
