<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\MenuFeatureController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\PoemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Override the root route to redirect to user landing page (before Auth routes)
Route::get('/', function () {
    return redirect('/user-landing');
})->name('root');

// Public Routes
Route::get('/user-landing', [HomeController::class, 'index'])->name('user-landing');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/content/{id}', [HomeController::class, 'showContent'])->name('content.show');
Route::post('/content/{id}/comment', [HomeController::class, 'storeComment'])->name('content.comment');
Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines.index');
Route::get('/poems', [PoemController::class, 'index'])->name('poems.index');

Route::get('/halaman-utama', [HomeController::class, 'halamanUtama'])->name('halaman-utama');

Route::get('/editorial', [HomeController::class, 'editorial'])->name('editorial');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/news', [HomeController::class, 'berita'])->name('news.index');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');

Route::get('/galeri', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/berita/kategori/{category}', [HomeController::class, 'beritaKategori'])->name('news.category');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('menu_features', MenuFeatureController::class);
});
Route::get('/literasi-corner', [HomeController::class, 'literasiCorner'])->name('literasi-corner');


Route::get('/literasi-corner/cerita-seru', [HomeController::class, 'literasiCeritaSeru'])->name('literasi.cerita-seru');
Route::get('/literasi-corner/puisi-cilik', [HomeController::class, 'literasiPuisiCilik'])->name('literasi.puisi-cilik');
Route::get('/literasi-corner/baca-yuk', [HomeController::class, 'literasiBacaYuk'])->name('literasi.baca-yuk');
Route::get('/literasi-corner/kata-baru', [HomeController::class, 'literasiKataBaru'])->name('literasi.kata-baru');
Route::get('/literasi-corner/olahraga', [HomeController::class, 'literasiOlahraga'])->name('literasi.olahraga');
Route::get('/literasi-corner/ekstrakulikuler', [HomeController::class, 'literasiEkstrakulikuler'])->name('literasi.ekstrakulikuler');
Route::get('/literasi-corner/keagamaan', [HomeController::class, 'literasiKeagamaan'])->name('literasi.keagamaan');
Route::get('/numerasi-zone', [HomeController::class, 'numerasiZone'])->name('numerasi-zone');

Route::get('/numerasi-zone/angka-ajaib', [HomeController::class, 'numerasiAngkaAjaib'])->name('numerasi.angka-ajaib');
Route::get('/numerasi-zone/bermain-hitung', [HomeController::class, 'numerasiBermainHitung'])->name('numerasi.bermain-hitung');
Route::get('/numerasi-zone/cerita-matematika', [HomeController::class, 'numerasiCeritaMatematika'])->name('numerasi.cerita-matematika');
Route::get('/numerasi-zone/tips-hitung-cepat', [HomeController::class, 'numerasiTipsHitungCepat'])->name('numerasi.tips-hitung-cepat');

Route::get('/kreativitas-siswa', [HomeController::class, 'kreativitasSiswa'])->name('kreativitas-siswa');

Route::get('/kreativitas-siswa/karya-kita', [HomeController::class, 'kreativitasKaryaKita'])->name('kreativitas.karya-kita');
Route::get('/kreativitas-siswa/bintang-minggu-ini', [HomeController::class, 'kreativitasBintangMingguIni'])->name('kreativitas.bintang-minggu-ini');
Route::get('/kreativitas-siswa/foto-kegiatan', [HomeController::class, 'kreativitasFotoKegiatan'])->name('kreativitas.foto-kegiatan');

Route::get('/edutainment', [HomeController::class, 'edutainment'])->name('edutainment');

Route::get('/edutainment/teka-teki-seru', [HomeController::class, 'edutainmentTekaTekiSeru'])->name('edutainment.teka-teki-seru');
Route::get('/edutainment/komik-edukasi', [HomeController::class, 'edutainmentKomikEdukasi'])->name('edutainment.komik-edukasi');
Route::get('/edutainment/fun-facts', [HomeController::class, 'edutainmentFunFacts'])->name('edutainment.fun-facts');

// User Upload Routes (Public - No Authentication Required)
Route::get('/upload', [App\Http\Controllers\UserUploadController::class, 'create'])->name('upload.create');
Route::post('/upload', [App\Http\Controllers\UserUploadController::class, 'store'])->name('upload.store');
Route::get('/my-uploads', [App\Http\Controllers\UserUploadController::class, 'myUploads'])->name('upload.my-uploads');

// Authentication Routes
Auth::routes(['register' => false]); // Disable registration

// Explicit login routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('contents', ContentController::class);
    Route::post('contents/{content}/approve', [ContentController::class, 'approve'])->name('contents.approve');
    Route::post('contents/{content}/reject', [ContentController::class, 'reject'])->name('contents.reject');
    // Removed olahraga and ekstrakulikuler routes as per user request
    // Route::get('contents/olahraga', [ContentController::class, 'olahraga'])->name('contents.olahraga');
    // Route::get('contents/ekstrakulikuler', [ContentController::class, 'ekstrakulikuler'])->name('contents.ekstrakulikuler');
    Route::get('contents/karya-kita', [ContentController::class, 'karyaKita'])->name('contents.karya-kita');
    Route::get('contents/bintang-minggu-ini', [ContentController::class, 'bintangMingguIni'])->name('contents.bintang-minggu-ini');
    Route::get('contents/foto-kegiatan', [ContentController::class, 'fotoKegiatan'])->name('contents.foto-kegiatan');
    Route::get('contents/teka-teki-seru', [ContentController::class, 'tekaTekiSeru'])->name('contents.teka-teki-seru');
    Route::get('contents/komik-edukasi', [ContentController::class, 'komikEdukasi'])->name('contents.komik-edukasi');
    Route::get('contents/fun-facts', [ContentController::class, 'funFacts'])->name('contents.fun-facts');
    Route::get('contents/cerita-seru', [ContentController::class, 'ceritaSeru'])->name('contents.cerita-seru');
    Route::get('contents/puisi-cilik', [ContentController::class, 'puisiCilik'])->name('contents.puisi-cilik');
    Route::get('contents/baca-yuk', [ContentController::class, 'bacaYuk'])->name('contents.baca-yuk');
    Route::get('contents/kata-baru', [ContentController::class, 'kataBaru'])->name('contents.kata-baru');
    Route::get('contents/angka-ajaib', [ContentController::class, 'angkaAjaib'])->name('contents.angka-ajaib');
    Route::get('contents/bermain-hitung', [ContentController::class, 'bermainHitung'])->name('contents.bermain-hitung');
    Route::get('contents/cerita-matematika', [ContentController::class, 'ceritaMatematika'])->name('contents.cerita-matematika');
    Route::get('contents/tips-hitung-cepat', [ContentController::class, 'tipsHitungCepat'])->name('contents.tips-hitung-cepat');
    Route::get('visitors', [VisitorController::class, 'index'])->name('visitors.index');
    Route::resource('menu_features', MenuFeatureController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('comments', \App\Http\Controllers\Admin\CommentController::class);
});
