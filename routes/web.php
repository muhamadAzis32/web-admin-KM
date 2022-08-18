<?php
use App\Http\Controllers\KontenVideoController;
use App\Http\Controllers\KontenDokumenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JobChannelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserAssignmentController;
use App\Http\Controllers\UserExamController;
// use App\Http\Controllers\AssignmentFileController;
// use App\Http\Controllers\AssignmentPilganController;
// use App\Http\Controllers\AssignmentTextController;
use App\Http\Controllers\AksesKelasMahasiswaController;
use App\Http\Controllers\AksesKelasDosenController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscussionForumController;
use App\Models\AssignmentPilgan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\QuizController as ControllersQuizController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamPilganController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GuideController;
// use App\Http\Controllers\ChatsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProgramController;
use App\Models\Assignment;
use App\Models\UserExam;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('testApi', [GeneralController::class, 'testApi']);
Route::get('cobaRegister', [AuthController::class, 'cobaRegister'])->name('cobaRegister');
Route::get('chat', [MessageController::class, 'index']);
Route::group(['prefix' => 'message'], function () {
    Route::get('user/{query}', [MessageController::class, 'user']);
    Route::get('user-message/{id}', [MessageController::class, 'message']);
    Route::get('user-message/{id}/read', [MessageController::class, 'read']);
    Route::post('user-message', [MessageController::class, 'send']);
});
// Route::get('/test', function () {
//     return view('admin.ujian.tambah');
// });
// Route::get('/home', [ChatController::class, 'index'])->name('home');
Route::get('/landing-page', function () {
    return view('landingPage.index');
});
Route::get('/dosen-tetap', function () {
    return view('landingPage.dosen-tetap');
});
Route::get('/dosen-tidak-tetap', function () {
    return view('landingPage.dosen-tdk-tetap');
});
Route::get('/tenaga-kependidikan', function () {
    return view('landingPage.tenaga-kependidikan');
});

Route::get('/visi-misi', function () {
    return view('landingPage.visi-misi');
});

Route::get('/tujuan-sasaran', function () {
    return view('landingPage.tujuan-sasaran');
});

Route::get('/consultation', function () {
    return view('admin.consultation.index');
});

// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

//Route Assignment File
// Route::get('/assignmentFile/{id}/create', [AssignmentController::class, 'viewstoreFile'])->name('viewAssignmentFile');
Route::post('/assignment/store', [AssignmentController::class, 'store'])->name('AssignmentStore');
Route::get('/assignment/destroy/{id}', [AssignmentController::class, 'destroy'])->name('AssignmentDestroy');

//Route Assignment Text
// Route::get('/assignmentText/{id}/create', [AssignmentController::class, 'tambahAssignmentText'])->name('tambahAssignmentText');
// Route::post('/assignmentText/store', [AssignmentController::class, 'storeAssignmentText'])->name('storeAssignmentText');

//Route Assignment Pilihan Ganda
// Route::get('/assignmentPilgan/{id}/create', [AssignmentController::class, 'tambahAssignmentPilgan'])->name('tambahAssignmentPilgan');
// Route::post('/assignmentPilgan/store', [AssignmentController::class, 'storeAssignmentPilgan'])->name('storeAssignmentPilgan');
// Route::get('/assignmentPilgan/{id}/show', [AssignmentController::class, 'show'])->name('showPilgan');
// Route::post('/assignmentPilgan/import', [AssignmentController::class, 'importAssignmentPilgan'])->name('importAssignmentPilgan');
// Route::get('/assignmentPilgan/{id}/show', [AssignmentController::class, 'showPilgan'])->name('showPilgan');

Route::post('/pertemuan/store', [PertemuanController::class, 'store'])->name('storePertemuan');
Route::get('/pertemuan/destroy/{id}', [PertemuanController::class, 'destroy'])->name('hapusPertemuan');
Route::get('/pertemuan/lihat-pertemuan/{id}', [PertemuanController::class, 'detail'])->name('detailPertemuan');
Route::get('/tambahKuis/{id}/create', [AssignmentController::class, 'tambahKuis'])->name('tambahKuis');
// Route::post('/pertemuan/import', [PertemuanPilganController::class, 'soalQuiz'])->name('soalQuiz');
Route::get('/showAssignment/{id}', [UserAssignmentController::class, 'showAssignment'])->name('showAssignment');
Route::get('/show-userAssignment/{id}', [UserAssignmentController::class, 'showUserAssignment'])->name('showUserAssignment');
Route::put('/grading/{id}', [UserAssignmentController::class, 'grading'])->name('grading');
Route::put('/discussion/{id}', [DiscussionForumController::class, 'dosenUpdate'])->name('dosenUpdate');
//Quiz
Route::post('/QuizImport', [ControllersQuizController::class,'QuizImport'])->name('QuizImport');
Route::get('/quiz/destroy/{id}', [ControllersQuizController::class, 'destroy'])->name('QuizDestroy');
Route::get('/quiz/{id}', [ControllersQuizController::class, 'show'])->name('QuizShow');
Route::get('/question/{id}', [ControllersQuizController::class, 'question'])->name('question');
Route::get('/user-quiz/{quiz}/{id}', [ControllersQuizController::class, 'userQuiz'])->name('userQuiz');

Route::post('/ExamPilganImport', [ExamPilganController::class,'ExamPilganImport'])->name('ExamPilganImport');
Route::get('/ExamPilgan/destroy/{id}', [ExamPilganController::class, 'destroy'])->name('ExamPilganDestroy');

Route::get('/exam/{id}', [ExamController::class, 'create'])->name('createExam');
Route::post('/exam', [ExamController::class, 'store'])->name('examStore');
Route::get('/examDestroy/{id}', [ExamController::class, 'destroy'])->name('destroyExam');
Route::get('/examShow/{id}', [ExamController::class, 'show'])->name('showExam');
Route::put('/storeExam/{id}', [ExamController::class, 'storeExam'])->name('storeExam');
Route::get('/show-userExam/{id}', [ExamController::class, 'showUserExam'])->name('showUserExam');

Route::resource('administrasi', AdministrasiController::class);
Route::resource('guide', GuideController::class);




// Route::get('showKelas/{id)', [KelasController::class, 'show'])->name('showKelas');

//Route Login
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'Dashboard'])
            ->name('Dashboard');
    Route::get('/form', function () {
        return view('form');
    })->name('form');
    Route::get('/tab', function () {
        return view('tab');
    })->name('form');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::resource('program', ProgramController::class);
Route::resource('discussionForum', DiscussionForumController::class);
Route::resource('kontenVideo', KontenVideoController::class);
Route::resource('kontenDokumen', KontenDokumenController::class);
Route::resource('kelas', KelasController::class);
Route::resource('mataKuliah', MataKuliahController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('iklan', IklanController::class);
Route::resource('profil', ProfilController::class);
Route::resource('jobChannel', JobChannelController::class);
Route::get('jobChannel/show/{id}', [JobChannelController::class, 'show']);
Route::get('jobChannel/userDestroy/{id}', [JobChannelController::class, 'userDestroy']);
Route::get('jobChannel/view_approve/{id}', [JobChannelController::class, 'view_approve']);
Route::put('jobChannel/approve/{id}', [JobChannelController::class, 'approve']);

// Route::resource('assignment', AssignmentController::class);
// Route::resource('assignmentFile', AssignmentFileController::class);
// Route::resource('assignmentPilgan', AssignmentPilganController::class);
// Route::resource('assignmentText', AssignmentTextController::class);

Route::get('/data-mahasiswa/{id}', [MataKuliahController::class, 'mahasiswa'])->name('dataMahasiswa');

Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/mata_kuliah', function () {
        return view('dosen.assignment.index');
    });
    Route::get('/showmata_kuliah', function () {
        return view('dosen.tugas.tambahTugas');
    });
    Route::get('/showUjian', function () {
        return view('dosen.tugas.tambahUjian');
    });
    Route::get('/show', function () {
        return view('dosen.tugas.show');
    });

   
    Route::get('/detail-nilai/{matkul}/{id}', [MataKuliahController::class, 'detailNilai'])->name('detailNilai');
    Route::put('/konfirmasi-nilai/{matkul}/{id}', [MataKuliahController::class, 'konfirmasiNilai'])->name('konfirmasiNilai');
    Route::get('/assignment/{id}', [DashboardController::class, 'assignment'])->name('assignment');
    
    Route::get('/assignment/{id}/show', [DashboardController::class, 'show']);
    Route::get('/assignment/{id}/pilganDetail', [DashboardController::class, 'pilganDetail'])->name('pilganDetail');
    Route::get('/assignment/{id}/textDetail', [DashboardController::class, 'textDetail'])->name('textDetail');
    Route::get('/assignment/{id}/fileDetail', [DashboardController::class, 'fileDetail'])->name('fileDetail');
    // Route::get('/showPilgan/{id}', [AssignmentPilganController::class, 'show'])->name('showPilgan');
});
Route::get('/discussion-forum', [DiscussionForumController::class, 'dosenindex'])->name('discussion-forum');
Route::post('/tambah-komen', [DiscussionForumController::class, 'tambahKomen'])->name('tambahKomen');
Route::post('/tambah-like', [DiscussionForumController::class, 'tambahLike'])->name('tambahLike');
Route::post('/tambah-like-komen', [DiscussionForumController::class, 'tambahlikeKomen'])->name('tambahlikeKomen');
Route::post('/tambah-like-komen2', [DiscussionForumController::class, 'tambahlikeKomen2'])->name('tambahlikeKomen2');
Route::post('/tambah-reply-komen', [DiscussionForumController::class, 'tambahreplyKomen'])->name('tambahreplyKomen');
Route::get('/discussion/destroy/{id}', [DiscussionForumController::class, 'destroydosen'])->name('destroy-discussion-forum');
Route::get('/reply/destroy/{id}', [DiscussionForumController::class, 'hapusKomen'])->name('hapusKomen');
Route::put('/komen/{id}', [DiscussionForumController::class, 'komenUpdate'])->name('komenUpdate');
Route::put('/ganti-warna-kalender', [DashboardController::class, 'gantiWarnaKalender'])->name('gantiWarnaKalender');

Route::put('/isremed/{id}', [ExamController::class, 'isremed'])->name('isremed');

//Role Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::get('/admin', function () {
    //     return view('admin.index');
    // })->name('admin.dashboard');
    Route::get('/coba', [DashboardController::class, 'coba'])->name('coba');

    Route::get('/dataDosen', [DashboardController::class, 'dataDosen'])->name('dataDosen');
    Route::get('/tambahDataDosen', [DashboardController::class, 'tambahDataDosen'])->name('tambahDataDosen');
    Route::post('/storeDataDosen', [DashboardController::class, 'storeDataDosen'])->name('storeDataDosen'); 
    Route::get('/editDataDosen/{id}', [DashboardController::class, 'editDataDosen'])->name('editDataDosen');
    Route::get('/showDataDosen/{id}', [DashboardController::class, 'showDataDosen'])->name('showDataDosen');
    Route::put('/updateDataDosen/{id}', [DashboardController::class, 'updateDataDosen'])->name('updateDataDosen'); 
    Route::delete('/deleteDataDosen/{id}', [DashboardController::class, 'deleteDataDosen'])->name('deleteDataDosen');
    Route::get('/dataMahasiswa', [DashboardController::class, 'dataMahasiswa'])->name('dataMahasiswa');
    Route::get('/editDataMahasiswa/{id}', [DashboardController::class, 'editDataMahasiswa'])->name('editDataMahasiswa');
    Route::put('/updateDataMahasiswa/{id}', [DashboardController::class, 'updateDataMahasiswa'])->name('updateDataMahasiswa');
    Route::delete('/deleteDataMahasiswa/{id}', [DashboardController::class, 'deleteDataMahasiswa'])->name('deleteDataMahasiswa');
    Route::put('/warna-kalender/{id}', [DashboardController::class, 'warnaKalender'])->name('warnaKelender');
    Route::resource('akseskelasMahasiswa', AksesKelasMahasiswaController::class);
    // Route::resource('akseskelasDosen', AksesKelasDosenController::class)->except('edit', 'update');
    Route::resource('akseskelasDosen', AksesKelasDosenController::class);
    Route::get('/editAksesKelasDosen/{id}', [AksesKelasDosenController::class, 'edit'])->name('editAksesKelasDosen');
    Route::put('/updateAksesKelasDosen/{id}', [AksesKelasDosenController::class, 'update'])->name('updateAksesKelasDosen');
    Route::delete('/destroyAksesKelasDosen/{id}', [AksesKelasDosenController::class, 'destroy'])->name('destroyAksesKelasDosen');
    Route::resource('kategori', KategoriController::class);


});

//Role User
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/user', function () {
        return view('user');
    })->name('user.dashboard');
});

Route::get('/tested', function(){
    return response()->json([
        'msg'=> "Hello World, by Yuda"
    ]);
});




