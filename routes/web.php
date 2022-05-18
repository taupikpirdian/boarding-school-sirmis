<?php

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

Route::get('/', 'HomeController@index');
Route::get('/tatatertib', 'HomeController@tataTertib');
Route::get('/galeri', 'HomeController@galeri');
Route::get('/jadwal-pendaftaran', 'HomeController@jadwalPendaftaran');
Route::get('/biaya-santri-pesantren-sirnamiskin', 'HomeController@pembiayaan');
Route::get('/ketuakamar', 'HomeController@ketuaKamar');
Route::get('/pembimbing', 'HomeController@pembimbing');
Route::get('/pembimbingbahasa', 'HomeController@pembimbingBahasa');
Route::get('/pembimbingtahfidz', 'HomeController@pembimbingTahfidz');
Route::get('/skripsi', 'HomeController@skripsi');


Auth::routes();

// Export to Excell
Route::get('export-file-aliyah/{type}', 'admin\PendaftaranAliyahController@exportFile')->name('export.file_aliyah');
Route::get('export-file-tsanawiyah/{type}', 'admin\PendaftaranTsanawiyahController@exportFile')->name('export.file_tsanawiyah');

Route::get('/sejarah-pesantren-sirnamiskin-bandung', 'SejarahFrontController@index');
Route::get('/visi-misi-tujuan-pesantren-sirnamiskin-bandung', 'VisiMisiFrontController@index');
Route::get('/target-pesantren-sirnamiskin-bandung', 'TargetFrontController@index');
Route::get('/tujuan_sirmis', 'TujuanFrontController@index');
Route::get('/struktur-pesantren', 'StrukturFrontController@index');
Route::get('/kegiatan-harian-santri-pesantren-sirnamiskin', 'KegiatanFrontController@index');
Route::get('/target', 'TargetFrontController@index');
Route::get('/kitab-yang-wajib-dikuasai-santri-pesantren-sirnamiskin', 'KitabFrontController@index');
Route::get('/block-akses', 'BlockFrontController@index');
Route::get('/persyaratan-pendaftaran-santri-pesantren-sirnamiskin', 'PersyaratanFrontController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/@dmin-BS', 'admin\AdminController@index');
Route::get('/dashboard-santri/{id}', 'admin\AdminController@dashboard');
Route::get('/kartu-ujian/{id}', 'admin\AdminController@cart');
Route::get('/dashboard-santri', 'admin\AdminController@index');
Route::get('/pendaftaran-berhasil', 'KonfirmasiController@index');
Route::get('/biodata_guru_mts', 'BiodataGuruMtsController@index');
Route::get('/guru-mts', 'FrontGuruMtsController@index');
Route::get('/biodata_guru_aliyah', 'BiodataGuruAliyahController@index');
Route::get('/galeri-pesantren', 'GaleriPesantrenFrontController@index');
Route::get('/galeri-aliyah', 'GaleriAliyahFrontController@index');
Route::get('/galeri-mts', 'GaleriMtsFrontController@index');
Route::get('/all-galeri', 'AllGaleriFrontController@index');
Route::get('/artikel-detail/{id}', 'ArtikelFrontController@index');
Route::get('/baca-berita/{slug}', 'BeritaFrontController@index');
Route::get('/acara-detail', 'AcaraFrontController@index');
Route::get('/biodata_guru_pesantren', 'BiodataGuruPesantrenController@index');
Route::get('/statistik-aliyah', 'admin\StatistikController@aliyah');
Route::get('/statistik-tsanawiyah', 'admin\StatistikController@tsanawiyah');
Route::get('/jadwal-kegiatan-santri-pesantren-sirmis', 'JadwalController@index');
Route::get('/prestasi-sirmis', 'PrestasiController@index');
Route::get('/direktori-aliyah', 'DirektoriController@aliyah');
Route::get('/direktori-tsanawiyah', 'DirektoriController@tsanawiyah');
Route::get('/direktori-pesantren', 'DirektoriController@pesantren');
Route::get('/baitul-ilmi', 'BaitulIlmiController@index');

// daftar
Route::get('/pendaftaran-santri-pesantren-sirnamiskin', 'HomeController@pendaftaranSantri');

// Group Authenticated First
Route::group(['middleware' => ['auth']], function() {
    // Route::get('/admin', ['as' => 'admin.dashboard', 'uses' => 'HomeController@admin']);

	//User
	Route::get('/user/index', ['as' => 'index', 'uses' => 'admin\UserController@index']);
	Route::get('/user/create', ['as' => 'create', 'uses' => 'admin\UserController@create']);
	Route::post('/user/create', ['as' => 'store', 'uses' => 'admin\UserController@store']);
	Route::get('/user/edit/{id}', ['as' => 'edit', 'uses' => 'admin\UserController@edit']);
	Route::put('/user/edit/{id}', ['as' => 'edit', 'uses' => 'admin\UserController@update']);
	Route::get('/user/show/{id}', ['as' => 'show', 'uses' => 'admin\UserController@show']);
	Route::delete('/user/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\UserController@destroy']);
	Route::get('/searchuser', ['as' => 'searchjabatan', 'uses' => 'admin\UserController@search']);

	// Role
	Route::resource('roles', 'admin\RoleController');
	Route::get('search-roles','admin\RoleController@search');
	Route::resource('user-groups', 'admin\UserGroupController');
	Route::get('search-user-groups','admin\UserGroupController@search');
	Route::resource('groups', 'admin\GroupController');
	Route::get('search-groups','admin\GroupController@search');
	Route::resource('group-roles', 'admin\GroupRoleController');
	Route::get('search-group-roles','admin\GroupRoleController@search');
});

// Front Pendaftaran Aliyah
Route::get('pendaftaran-aliyah/create', ['as' => 'acara', 'uses' => 'FrontPendaftaranAliyahController@index']);
Route::post('pendaftaran-aliyah/create', ['as' => 'create', 'uses' => 'FrontPendaftaranAliyahController@create']);

// Front Pendaftaran Tsanawiyah
Route::get('pendaftaran-tsanawiyah/create', ['as' => 'acara', 'uses' => 'FrontPendaftaranTsanawiyahController@index']);
Route::post('pendaftaran-tsanawiyah/create', ['as' => 'create', 'uses' => 'FrontPendaftaranTsanawiyahController@create']);
Route::put('pendaftaran-tsanawiyah/update/{id}', ['as' => 'create', 'uses' => 'FrontPendaftaranTsanawiyahController@update']);

// Slider
Route::get('slider_sirmis/index', ['as' => 'content', 'uses' => 'admin\SliderController@index']);
Route::get('slider_sirmis/create', ['as' => 'create', 'uses' => 'admin\SliderController@create']);
Route::post('slider_sirmis/create', ['as' => 'store', 'uses' => 'admin\SliderController@store']);
Route::get('slider_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\SliderController@edit']);
Route::put('slider_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\SliderController@update']);
Route::get('slider_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\SliderController@show']);
Route::delete('slider_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\SliderController@destroy']);
Route::get('/searchslider_sirmis', ['as' => 'searchslider_sirmis', 'uses' => 'admin\SliderController@search']);

// Sejarah
Route::get('sejarah_sirmis/index', ['as' => 'sejarah_sirmis', 'uses' => 'admin\SejarahController@index']);
Route::get('sejarah_sirmis/create', ['as' => 'create', 'uses' => 'admin\SejarahController@create']);
Route::post('sejarah_sirmis/create', ['as' => 'store', 'uses' => 'admin\SejarahController@store']);
Route::get('sejarah_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\SejarahController@edit']);
Route::put('sejarah_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\SejarahController@update']);
Route::get('sejarah_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\SejarahController@show']);
Route::delete('sejarah_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\SejarahController@destroy']);
Route::get('/searchsejarah_sirmis', ['as' => 'searchsejarah_sirmis', 'uses' => 'admin\SejarahController@search']);

// Visi Misi
Route::get('visi_misi/index', ['as' => 'content', 'uses' => 'admin\VisiMisiController@index']);
Route::get('visi_misi/create', ['as' => 'create', 'uses' => 'admin\VisiMisiController@create']);
Route::post('visi_misi/create', ['as' => 'store', 'uses' => 'admin\VisiMisiController@store']);
Route::get('visi_misi/edit/{id}', ['as' => 'edit', 'uses' => 'admin\VisiMisiController@edit']);
Route::put('visi_misi/edit/{id}', ['as' => 'edit', 'uses' => 'admin\VisiMisiController@update']);
Route::get('visi_misi/show/{id}', ['as' => 'show', 'uses' => 'admin\VisiMisiController@show']);
Route::delete('visi_misi/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\VisiMisiController@destroy']);
Route::get('/searchvisi_misi', ['as' => 'searchvisi_misi', 'uses' => 'admin\VisiMisiController@search']);

// Tujuan
Route::get('tujuan_sirmis/index', ['as' => 'tujuan_sirmis', 'uses' => 'admin\TujuanController@index']);
Route::get('tujuan_sirmis/create', ['as' => 'create', 'uses' => 'admin\TujuanController@create']);
Route::post('tujuan_sirmis/create', ['as' => 'store', 'uses' => 'admin\TujuanController@store']);
Route::get('tujuan_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TujuanController@edit']);
Route::put('tujuan_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TujuanController@update']);
Route::get('tujuan_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\TujuanController@show']);
Route::delete('tujuan_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\TujuanController@destroy']);
Route::get('/searchtujuan_sirmis', ['as' => 'searchtujuan_sirmis', 'uses' => 'admin\TujuanController@search']);

// Struktur
Route::get('struktur_sirmis/index', ['as' => 'struktur_sirmis', 'uses' => 'admin\StrukturController@index']);
Route::get('struktur_sirmis/create', ['as' => 'create', 'uses' => 'admin\StrukturController@create']);
Route::post('struktur_sirmis/create', ['as' => 'store', 'uses' => 'admin\StrukturController@store']);
Route::get('struktur_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StrukturController@edit']);
Route::put('struktur_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StrukturController@update']);
Route::get('struktur_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\StrukturController@show']);
Route::delete('struktur_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\StrukturController@destroy']);
Route::get('/searchstruktur_sirmis', ['as' => 'searchstruktur_sirmis', 'uses' => 'admin\StrukturController@search']);

// Galeri Pesantren
Route::get('galeri_pesantren/index', ['as' => 'galeri_pesantren', 'uses' => 'admin\GaleriPesantrenController@index']);
Route::get('galeri_pesantren/create', ['as' => 'create', 'uses' => 'admin\GaleriPesantrenController@create']);
Route::post('galeri_pesantren/create', ['as' => 'store', 'uses' => 'admin\GaleriPesantrenController@store']);
Route::get('galeri_pesantren/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GaleriPesantrenController@edit']);
Route::put('galeri_pesantren/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GaleriPesantrenController@update']);
Route::get('galeri_pesantren/show/{id}', ['as' => 'show', 'uses' => 'admin\GaleriPesantrenController@show']);
Route::delete('galeri_pesantren/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\GaleriPesantrenController@destroy']);
Route::get('/searchgaleri_pesantren', ['as' => 'searchgaleri_pesantren', 'uses' => 'admin\GaleriPesantrenController@search']);

// Galeri Tsanawiyah
Route::get('galeri_tsanawiyah/index', ['as' => 'galeri_tsanawiyah', 'uses' => 'admin\GaleriTsanawiyahController@index']);
Route::get('galeri_tsanawiyah/create', ['as' => 'create', 'uses' => 'admin\GaleriTsanawiyahController@create']);
Route::post('galeri_tsanawiyah/create', ['as' => 'store', 'uses' => 'admin\GaleriTsanawiyahController@store']);
Route::get('galeri_tsanawiyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GaleriTsanawiyahController@edit']);
Route::put('galeri_tsanawiyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GaleriTsanawiyahController@update']);
Route::get('galeri_tsanawiyah/show/{id}', ['as' => 'show', 'uses' => 'admin\GaleriTsanawiyahController@show']);
Route::delete('galeri_tsanawiyah/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\GaleriTsanawiyahController@destroy']);
Route::get('/searchgaleri_tsanawiyah', ['as' => 'searchgaleri_tsanawiyah', 'uses' => 'admin\GaleriTsanawiyahController@search']);

//Galeri Aliyah
Route::get('galeri_aliyah/index', ['as' => 'galeri_aliyah', 'uses' => 'admin\GaleriAliyahController@index']);
Route::get('galeri_aliyah/create', ['as' => 'create', 'uses' => 'admin\GaleriAliyahController@create']);
Route::post('galeri_aliyah/create', ['as' => 'store', 'uses' => 'admin\GaleriAliyahController@store']);
Route::get('galeri_aliyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GaleriAliyahController@edit']);
Route::put('galeri_aliyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GaleriAliyahController@update']);
Route::get('galeri_aliyah/show/{id}', ['as' => 'show', 'uses' => 'admin\GaleriAliyahController@show']);
Route::delete('galeri_aliyah/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\GaleriAliyahController@destroy']);
Route::get('/searchgaleri_aliyah', ['as' => 'searchgaleri_aliyah', 'uses' => 'admin\GaleriAliyahController@search']);

//Acara
Route::get('acara/index', ['as' => 'acara', 'uses' => 'admin\AcaraController@index']);
Route::get('acara/create', ['as' => 'create', 'uses' => 'admin\AcaraController@create']);
Route::post('acara/create', ['as' => 'store', 'uses' => 'admin\AcaraController@store']);
Route::get('acara/edit/{id}', ['as' => 'edit', 'uses' => 'admin\AcaraController@edit']);
Route::put('acara/edit/{id}', ['as' => 'edit', 'uses' => 'admin\AcaraController@update']);
Route::get('acara/show/{id}', ['as' => 'show', 'uses' => 'admin\AcaraController@show']);
Route::delete('acara/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\AcaraController@destroy']);
Route::get('/searchacara', ['as' => 'searchacara', 'uses' => 'admin\AcaraController@search']);
Route::get('acara/{id}', ['as' => 'acara', 'uses' => 'admin\AcaraController@acara']);
Route::get('/acara', 'AcaraController@acara');
Route::get('/search-list-acara', ['as' => 'search', 'uses' => 'AcaraController@search']);

// Berita
Route::get('berita/index', ['as' => 'berita', 'uses' => 'admin\BeritaController@index']);
Route::get('berita/create', ['as' => 'create', 'uses' => 'admin\BeritaController@create']);
Route::post('berita/create', ['as' => 'store', 'uses' => 'admin\BeritaController@store']);
Route::get('berita/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BeritaController@edit']);
Route::put('berita/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BeritaController@update']);
Route::get('berita/show/{id}', ['as' => 'show', 'uses' => 'admin\BeritaController@show']);
Route::delete('berita/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\BeritaController@destroy']);
Route::get('/searchberita', ['as' => 'searchberita', 'uses' => 'admin\BeritaController@search']);
Route::get('berita_home', ['as' => 'berita', 'uses' => 'admin\BeritaController@berita_home']);
Route::get('berita/{id}', ['as' => 'berita', 'uses' => 'admin\BeritaController@berita']);
Route::get('/berita', 'BeritaController@berita');
Route::get('/search-list-berita', ['as' => 'search', 'uses' => 'BeritaController@search']);

// Artikel
Route::get('artikel/index', ['as' => 'artikel', 'uses' => 'admin\ArtikelController@index']);
Route::get('artikel/create', ['as' => 'create', 'uses' => 'admin\ArtikelController@create']);
Route::post('artikel/create', ['as' => 'store', 'uses' => 'admin\ArtikelController@store']);
Route::get('artikel/edit/{id}', ['as' => 'edit', 'uses' => 'admin\ArtikelController@edit']);
Route::put('artikel/edit/{id}', ['as' => 'edit', 'uses' => 'admin\ArtikelController@update']);
Route::get('artikel/show/{id}', ['as' => 'show', 'uses' => 'admin\ArtikelController@show']);
Route::delete('artikel/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\ArtikelController@destroy']);
Route::get('/searchartikel', ['as' => 'searchberita', 'uses' => 'admin\ArtikelController@search']);
Route::get('artikel_home', ['as' => 'artikel', 'uses' => 'admin\ArtikelController@artikel_home']);
Route::get('artikel/{id}', ['as' => 'artikel', 'uses' => 'ArtikelFrontController@index']);
Route::get('/artikel', 'ArtikelController@index');
Route::get('/search-list-artikel', ['as' => 'search', 'uses' => 'ArtikelController@search']);

// Biodata Guru Mts
Route::get('biodata_guru_mts/index', ['as' => 'biodata_guru_mts', 'uses' => 'admin\BiodataGuruMtsController@index']);
Route::get('biodata_guru_mts/create', ['as' => 'create', 'uses' => 'admin\BiodataGuruMtsController@create']);
Route::post('biodata_guru_mts/create', ['as' => 'store', 'uses' => 'admin\BiodataGuruMtsController@store']);
Route::get('biodata_guru_mts/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BiodataGuruMtsController@edit']);
Route::put('biodata_guru_mts/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BiodataGuruMtsController@update']);
Route::get('biodata_guru_mts/show/{id}', ['as' => 'show', 'uses' => 'admin\BiodataGuruMtsController@show']);
Route::delete('biodata_guru_mts/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\BiodataGuruMtsController@destroy']);
Route::get('/searchbiodata_guru_mts', ['as' => 'searchbiodata_guru_mts', 'uses' => 'admin\BiodataGuruMtsController@search']);
Route::get('biodata_guru_mts_home', ['as' => 'biodata_guru_mts', 'uses' => 'admin\BiodataGuruMtsController@biodata_guru_mts_home']);
Route::get('biodata_guru_mts/{id}', ['as' => 'biodata_guru_mts', 'uses' => 'admin\BiodataGuruMtsController@biodata_guru_mts']);

// Biodata Guru Aliyah
Route::get('biodata_guru_aliyah/index', ['as' => 'biodata_guru_aliyah', 'uses' => 'admin\BiodataGuruAliyahController@index']);
Route::get('biodata_guru_aliyah/create', ['as' => 'create', 'uses' => 'admin\BiodataGuruAliyahController@create']);
Route::post('biodata_guru_aliyah/create', ['as' => 'store', 'uses' => 'admin\BiodataGuruAliyahController@store']);
Route::get('biodata_guru_aliyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BiodataGuruAliyahController@edit']);
Route::put('biodata_guru_aliyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BiodataGuruAliyahController@update']);
Route::get('biodata_guru_aliyah/show/{id}', ['as' => 'show', 'uses' => 'admin\BiodataGuruAliyahController@show']);
Route::delete('biodata_guru_aliyah/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\BiodataGuruAliyahController@destroy']);
Route::get('/searchbiodata_guru_aliyah', ['as' => 'searchbiodata_guru_aliyah', 'uses' => 'admin\BiodataGuruAliyahController@search']);
Route::get('biodata_guru_aliyah_home', ['as' => 'biodata_guru_aliyah', 'uses' => 'admin\BiodataGuruAliyahController@biodata_guru_aliyah_home']);
Route::get('biodata_guru_aliyah/{id}', ['as' => 'biodata_guru_aliyah', 'uses' => 'admin\BiodataGuruAliyahController@biodata_guru_aliyah']);

// Users
Route::get('user_sirmis/index', ['as' => 'user_sirmis', 'uses' => 'admin\UsersController@index']);
Route::get('user_sirmis/create', ['as' => 'create', 'uses' => 'admin\UsersController@create']);
Route::post('user_sirmis/create', ['as' => 'store', 'uses' => 'admin\UsersController@store']);
Route::get('user_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\UsersController@edit']);
Route::put('user_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\UsersController@update']);
Route::get('user_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\UsersController@show']);
Route::delete('user_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\UsersController@destroy']);
Route::get('/searchuser_sirmis', ['as' => 'searchuser_sirmis', 'uses' => 'admin\UsersController@search']);
Route::get('user_sirmis_home', ['as' => 'user_sirmis', 'uses' => 'admin\UsersController@user_sirmis_home']);
Route::get('user_sirmis/{id}', ['as' => 'user_sirmis', 'uses' => 'admin\UsersController@user_sirmis']);

// Biodata Guru Pesantren
Route::get('biodata_guru_pesantren/index', ['as' => 'biodata_guru_pesantren', 'uses' => 'admin\BiodataGuruPesantrenController@index']);
Route::get('biodata_guru_pesantren/create', ['as' => 'create', 'uses' => 'admin\BiodataGuruPesantrenController@create']);
Route::post('biodata_guru_pesantren/create', ['as' => 'store', 'uses' => 'admin\BiodataGuruPesantrenController@store']);
Route::get('biodata_guru_pesantren/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BiodataGuruPesantrenController@edit']);
Route::put('biodata_guru_pesantren/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BiodataGuruPesantrenController@update']);
Route::get('biodata_guru_pesantren/show/{id}', ['as' => 'show', 'uses' => 'admin\BiodataGuruPesantrenController@show']);
Route::delete('biodata_guru_pesantren/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\BiodataGuruPesantrenController@destroy']);
Route::get('/searchbiodata_guru_pesantren', ['as' => 'searchbiodata_guru_pesantren', 'uses' => 'admin\BiodataGuruPesantrenController@search']);
Route::get('biodata_guru_pesantren_home', ['as' => 'biodata_guru_pesantren', 'uses' => 'admin\BiodataGuruPesantrenController@biodata_guru_aliyah_home']);
Route::get('biodata_guru_pesantren/{id}', ['as' => 'biodata_guru_pesantren', 'uses' => 'admin\BiodataGuruPesantrenController@biodata_guru_pesantren']);

// // Artikel
// 	Route::get('/artikel', 'ArtikelController@artikel');

// Target
Route::get('target_sirmis/index', ['as' => 'target_sirmis', 'uses' => 'admin\TargetController@index']);
Route::get('target_sirmis/create', ['as' => 'create', 'uses' => 'admin\TargetController@create']);
Route::post('target_sirmis/create', ['as' => 'store', 'uses' => 'admin\TargetController@store']);
Route::get('target_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TargetController@edit']);
Route::put('target_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TargetController@update']);
Route::get('target_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\TargetController@show']);
Route::delete('target_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\TargetController@destroy']);
Route::get('/searchtarget_sirmis', ['as' => 'searchtarget_sirmis', 'uses' => 'admin\TargetController@search']);

// Jadwal
Route::get('jadwal_sirmis/index', ['as' => 'jadwal_sirmis', 'uses' => 'admin\JadwalController@index']);
Route::get('jadwal_sirmis/create', ['as' => 'create', 'uses' => 'admin\JadwalController@create']);
Route::post('jadwal_sirmis/create', ['as' => 'store', 'uses' => 'admin\JadwalController@store']);
Route::get('jadwal_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\JadwalController@edit']);
Route::put('jadwal_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\JadwalController@update']);
Route::get('jadwal_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\JadwalController@show']);
Route::delete('jadwal_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\JadwalController@destroy']);
Route::get('/searchjadwal_sirmis', ['as' => 'searchjadwal_sirmis', 'uses' => 'admin\JadwalController@search']);

// Status Guru
Route::get('status_guru/index', ['as' => 'status_guru', 'uses' => 'admin\StatusGuruController@index']);
Route::get('status_guru/create', ['as' => 'create', 'uses' => 'admin\StatusGuruController@create']);
Route::post('status_guru/create', ['as' => 'store', 'uses' => 'admin\StatusGuruController@store']);
Route::get('status_guru/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StatusGuruController@edit']);
Route::put('status_guru/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StatusGuruController@update']);
Route::get('status_guru/show/{id}', ['as' => 'show', 'uses' => 'admin\StatusGuruController@show']);
Route::delete('status_guru/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\StatusGuruController@destroy']);
Route::get('/searchstatus_guru', ['as' => 'searchstatus_guru', 'uses' => 'admin\StatusGuruController@search']);

// Kategori Guru
Route::get('kategori_guru/index', ['as' => 'kategori_guru', 'uses' => 'admin\KategoriGuruController@index']);
Route::get('kategori_guru/create', ['as' => 'create', 'uses' => 'admin\KategoriGuruController@create']);
Route::post('kategori_guru/create', ['as' => 'store', 'uses' => 'admin\KategoriGuruController@store']);
Route::get('kategori_guru/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriGuruController@edit']);
Route::put('kategori_guru/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriGuruController@update']);
Route::get('kategori_guru/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriGuruController@show']);
Route::delete('kategori_guru/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriGuruController@destroy']);
Route::get('/searchkategori_guru', ['as' => 'searchkategori_guru', 'uses' => 'admin\KategoriGuruController@search']);

// Mata Pelajaran
Route::get('matpel/index', ['as' => 'matpel', 'uses' => 'admin\MatpelController@index']);
Route::get('matpel/create', ['as' => 'create', 'uses' => 'admin\MatpelController@create']);
Route::post('matpel/create', ['as' => 'store', 'uses' => 'admin\MatpelController@store']);
Route::get('matpel/edit/{id}', ['as' => 'edit', 'uses' => 'admin\MatpelController@edit']);
Route::put('matpel/edit/{id}', ['as' => 'edit', 'uses' => 'admin\MatpelController@update']);
Route::get('matpel/show/{id}', ['as' => 'show', 'uses' => 'admin\MatpelController@show']);
Route::delete('matpel/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\MatpelController@destroy']);
Route::get('/searchmatpel', ['as' => 'searchmatpel', 'uses' => 'admin\MatpelController@search']);

// Kategori Galeri
Route::get('kategori_galeri/index', ['as' => 'kategori_galeri', 'uses' => 'admin\KategoriGaleriController@index']);
Route::get('kategori_galeri/create', ['as' => 'create', 'uses' => 'admin\KategoriGaleriController@create']);
Route::post('kategori_galeri/create', ['as' => 'store', 'uses' => 'admin\KategoriGaleriController@store']);
Route::get('kategori_galeri/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriGaleriController@edit']);
Route::put('kategori_galeri/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriGaleriController@update']);
Route::get('kategori_galeri/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriGaleriController@show']);
Route::delete('kategori_galeri/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriGaleriController@destroy']);
Route::get('/searchkategori_galeri', ['as' => 'searchkategori_galeri', 'uses' => 'admin\KategoriGaleriController@search']);

// Kategori Galeri
Route::get('kategori_acara/index', ['as' => 'kategori_acara', 'uses' => 'admin\KategoriAcaraController@index']);
Route::get('kategori_acara/create', ['as' => 'create', 'uses' => 'admin\KategoriAcaraController@create']);
Route::post('kategori_acara/create', ['as' => 'store', 'uses' => 'admin\KategoriAcaraController@store']);
Route::get('kategori_acara/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriAcaraController@edit']);
Route::put('kategori_acara/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriAcaraController@update']);
Route::get('kategori_acara/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriAcaraController@show']);
Route::delete('kategori_acara/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriAcaraController@destroy']);
Route::get('/searchkategori_acara', ['as' => 'searchkategori_acara', 'uses' => 'admin\KategoriAcaraController@search']);

// Kategori Galeri
Route::get('kategori_artikel/index', ['as' => 'kategori_artikel', 'uses' => 'admin\KategoriArtikelController@index']);
Route::get('kategori_artikel/create', ['as' => 'create', 'uses' => 'admin\KategoriArtikelController@create']);
Route::post('kategori_artikel/create', ['as' => 'store', 'uses' => 'admin\KategoriArtikelController@store']);
Route::get('kategori_artikel/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriArtikelController@edit']);
Route::put('kategori_artikel/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriArtikelController@update']);
Route::get('kategori_artikel/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriArtikelController@show']);
Route::delete('kategori_artikel/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriArtikelController@destroy']);
Route::get('/searchkategori_artikel', ['as' => 'searchkategori_artikel', 'uses' => 'admin\KategoriArtikelController@search']);

// Kategori Berita
Route::get('kategori_berita/index', ['as' => 'kategori_berita', 'uses' => 'admin\KategoriBeritaController@index']);
Route::get('kategori_berita/create', ['as' => 'create', 'uses' => 'admin\KategoriBeritaController@create']);
Route::post('kategori_berita/create', ['as' => 'store', 'uses' => 'admin\KategoriBeritaController@store']);
Route::get('kategori_berita/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriBeritaController@edit']);
Route::put('kategori_berita/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriBeritaController@update']);
Route::get('kategori_berita/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriBeritaController@show']);
Route::delete('kategori_berita/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriBeritaController@destroy']);
Route::get('/searchkategori_berita', ['as' => 'searchkategori_berita', 'uses' => 'admin\KategoriBeritaController@search']);

// Ukuran Seragama
Route::get('ukuran_seragam/index', ['as' => 'ukuran_seragam', 'uses' => 'admin\UkuranSeragamController@index']);
Route::get('ukuran_seragam/create', ['as' => 'create', 'uses' => 'admin\UkuranSeragamController@create']);
Route::post('ukuran_seragam/create', ['as' => 'store', 'uses' => 'admin\UkuranSeragamController@store']);
Route::get('ukuran_seragam/edit/{id}', ['as' => 'edit', 'uses' => 'admin\UkuranSeragamController@edit']);
Route::put('ukuran_seragam/edit/{id}', ['as' => 'edit', 'uses' => 'admin\UkuranSeragamController@update']);
Route::get('ukuran_seragam/show/{id}', ['as' => 'show', 'uses' => 'admin\UkuranSeragamController@show']);
Route::delete('ukuran_seragam/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\UkuranSeragamController@destroy']);
Route::get('/searchukuran_seragam', ['as' => 'searchukuran_seragam', 'uses' => 'admin\UkuranSeragamController@search']);

// Pekerjaan Orangtua
Route::get('pekerjaan_ortu/index', ['as' => 'pekerjaan_ortu', 'uses' => 'admin\PekerjaanOrtuController@index']);
Route::get('pekerjaan_ortu/create', ['as' => 'create', 'uses' => 'admin\PekerjaanOrtuController@create']);
Route::post('pekerjaan_ortu/create', ['as' => 'store', 'uses' => 'admin\PekerjaanOrtuController@store']);
Route::get('pekerjaan_ortu/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PekerjaanOrtuController@edit']);
Route::put('pekerjaan_ortu/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PekerjaanOrtuController@update']);
Route::get('pekerjaan_ortu/show/{id}', ['as' => 'show', 'uses' => 'admin\PekerjaanOrtuController@show']);
Route::delete('pekerjaan_ortu/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PekerjaanOrtuController@destroy']);
Route::get('/searchpekerjaan_ortu', ['as' => 'searchpekerjaan_ortu', 'uses' => 'admin\PekerjaanOrtuController@search']);

// Penghasilan Orang Tua
Route::get('penghasilan_ortu/index', ['as' => 'penghasilan_ortu', 'uses' => 'admin\PenghasilanOrtuController@index']);
Route::get('penghasilan_ortu/create', ['as' => 'create', 'uses' => 'admin\PenghasilanOrtuController@create']);
Route::post('penghasilan_ortu/create', ['as' => 'store', 'uses' => 'admin\PenghasilanOrtuController@store']);
Route::get('penghasilan_ortu/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PenghasilanOrtuController@edit']);
Route::put('penghasilan_ortu/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PenghasilanOrtuController@update']);
Route::get('penghasilan_ortu/show/{id}', ['as' => 'show', 'uses' => 'admin\PenghasilanOrtuController@show']);
Route::delete('penghasilan_ortu/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PenghasilanOrtuController@destroy']);
Route::get('/searchpenghasilan_ortu', ['as' => 'searchpenghasilan_ortu', 'uses' => 'admin\PenghasilanOrtuController@search']);

// Pendidikan Orang Tua
Route::get('pendidikan_ortu/index', ['as' => 'pendidikan_ortu', 'uses' => 'admin\PendidikanOrtuController@index']);
Route::get('pendidikan_ortu/create', ['as' => 'create', 'uses' => 'admin\PendidikanOrtuController@create']);
Route::post('pendidikan_ortu/create', ['as' => 'store', 'uses' => 'admin\PendidikanOrtuController@store']);
Route::get('pendidikan_ortu/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PendidikanOrtuController@edit']);
Route::put('pendidikan_ortu/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PendidikanOrtuController@update']);
Route::get('pendidikan_ortu/show/{id}', ['as' => 'show', 'uses' => 'admin\PendidikanOrtuController@show']);
Route::delete('pendidikan_ortu/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PendidikanOrtuController@destroy']);
Route::get('/searchpendidikan_ortu', ['as' => 'searchpendidikan_ortu', 'uses' => 'admin\PendidikanOrtuController@search']);

// Pendaftaran Aliyah
Route::get('pendaftaran_aliyah/index', ['as' => 'pendaftaran_aliyah', 'uses' => 'admin\PendaftaranAliyahController@index']);
Route::get('pendaftaran_aliyah/create', ['as' => 'create', 'uses' => 'admin\PendaftaranAliyahController@create']);
Route::post('pendaftaran_aliyah/create', ['as' => 'store', 'uses' => 'admin\PendaftaranAliyahController@store']);
Route::get('pendaftaran_aliyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PendaftaranAliyahController@edit']);
Route::put('pendaftaran_aliyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PendaftaranAliyahController@update']);
Route::get('pendaftaran_aliyah/show/{id}', ['as' => 'show', 'uses' => 'admin\PendaftaranAliyahController@show']);
Route::delete('pendaftaran_aliyah/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PendaftaranAliyahController@destroy']);
Route::get('/searchpendaftaran_aliyah', ['as' => 'searchpendaftaran_aliyah', 'uses' => 'admin\PendaftaranAliyahController@search']);

// Pendaftaran Tsanawiyah
Route::get('pendaftaran_tsanawiyah/index', ['as' => 'pendaftaran_tsanawiyah', 'uses' => 'admin\PendaftaranTsanawiyahController@index']);
Route::get('pendaftaran_tsanawiyah/create', ['as' => 'create', 'uses' => 'admin\PendaftaranTsanawiyahController@create']);
Route::post('pendaftaran_tsanawiyah/create', ['as' => 'store', 'uses' => 'admin\PendaftaranTsanawiyahController@store']);
Route::get('pendaftaran_tsanawiyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PendaftaranTsanawiyahController@edit']);
Route::put('pendaftaran_tsanawiyah/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PendaftaranTsanawiyahController@update']);
Route::get('pendaftaran_tsanawiyah/show/{id}', ['as' => 'show', 'uses' => 'admin\PendaftaranTsanawiyahController@show']);
Route::delete('pendaftaran_tsanawiyah/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PendaftaranTsanawiyahController@destroy']);
Route::get('/searchpendaftaran_tsanawiyah', ['as' => 'searchpendaftaran_tsanawiyah', 'uses' => 'admin\PendaftaranTsanawiyahController@search']);

// Persyaratan
Route::get('persyaratan_pendaftaran/index', ['as' => 'persyaratan_pendaftaran', 'uses' => 'admin\PersyaratanController@index']);
Route::get('persyaratan_pendaftaran/create', ['as' => 'create', 'uses' => 'admin\PersyaratanController@create']);
Route::post('persyaratan_pendaftaran/create', ['as' => 'store', 'uses' => 'admin\PersyaratanController@store']);
Route::get('persyaratan_pendaftaran/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PersyaratanController@edit']);
Route::put('persyaratan_pendaftaran/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PersyaratanController@update']);
Route::get('persyaratan_pendaftaran/show/{id}', ['as' => 'show', 'uses' => 'admin\PersyaratanController@show']);
Route::delete('persyaratan_pendaftaran/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PersyaratanController@destroy']);
Route::get('/searchpersyaratan_pendaftaran', ['as' => 'searchpersyaratan_pendaftaran', 'uses' => 'admin\PersyaratanController@search']);

// Lokasi
Route::get('lokasi_sirmis/index', ['as' => 'lokasi_sirmis', 'uses' => 'admin\LokasiSirmisController@index']);
Route::get('lokasi_sirmis/create', ['as' => 'create', 'uses' => 'admin\LokasiSirmisController@create']);
Route::post('lokasi_sirmis/create', ['as' => 'store', 'uses' => 'admin\LokasiSirmisController@store']);
Route::get('lokasi_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\LokasiSirmisController@edit']);
Route::put('lokasi_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\LokasiSirmisController@update']);
Route::get('lokasi_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\LokasiSirmisController@show']);
Route::delete('lokasi_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\LokasiSirmisController@destroy']);
Route::get('/searchlokasi_sirmis', ['as' => 'searchlokasi_sirmis', 'uses' => 'admin\LokasiSirmisController@search']);

// Display All User In Table
Route::get('user-list', 'HomeController@userList')->name('user-list');

// Export User Table Data In Excel With Set Header
Route::get('user-export', 'HomeController@exportUserData')->name('user-export');

// Jenis Kelamin
Route::get('jenis_kelamin/index', ['as' => 'jenis_kelamin', 'uses' => 'admin\JenisKelaminController@index']);
Route::get('jenis_kelamin/create', ['as' => 'create', 'uses' => 'admin\JenisKelaminController@create']);
Route::post('jenis_kelamin/create', ['as' => 'store', 'uses' => 'admin\JenisKelaminController@store']);
Route::get('jenis_kelamin/edit/{id}', ['as' => 'edit', 'uses' => 'admin\JenisKelaminController@edit']);
Route::put('jenis_kelamin/edit/{id}', ['as' => 'edit', 'uses' => 'admin\JenisKelaminController@update']);
Route::get('jenis_kelamin/show/{id}', ['as' => 'show', 'uses' => 'admin\JenisKelaminController@show']);
Route::delete('jenis_kelamin/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\JenisKelaminController@destroy']);
Route::get('/searchjenis_kelamin', ['as' => 'searchjenis_kelamin', 'uses' => 'admin\JenisKelaminController@search']);

// Mondok
Route::get('mondok_sirmis/index', ['as' => 'mondok_sirmis', 'uses' => 'admin\MondokController@index']);
Route::get('mondok_sirmis/create', ['as' => 'create', 'uses' => 'admin\MondokController@create']);
Route::post('mondok_sirmis/create', ['as' => 'store', 'uses' => 'admin\MondokController@store']);
Route::get('mondok_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\MondokController@edit']);
Route::put('mondok_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\MondokController@update']);
Route::get('mondok_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\MondokController@show']);
Route::delete('mondok_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\MondokController@destroy']);
Route::get('/searchmondok_sirmis', ['as' => 'searchmondok_sirmis', 'uses' => 'admin\MondokController@search']);

// prestasi_sirmis
Route::get('prestasi_sirmis/index', ['as' => 'prestasi_sirmis', 'uses' => 'admin\PrestasiController@index']);
Route::get('prestasi_sirmis/create', ['as' => 'create', 'uses' => 'admin\PrestasiController@create']);
Route::post('prestasi_sirmis/create', ['as' => 'store', 'uses' => 'admin\PrestasiController@store']);
Route::get('prestasi_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PrestasiController@edit']);
Route::put('prestasi_sirmis/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PrestasiController@update']);
Route::get('prestasi_sirmis/show/{id}', ['as' => 'show', 'uses' => 'admin\PrestasiController@show']);
Route::delete('prestasi_sirmis/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PrestasiController@destroy']);
Route::get('/searchprestasi_sirmis', ['as' => 'searchprestasi_sirmis', 'uses' => 'admin\PrestasiController@search']);
Route::get('/prestasi/{id}', ['as' => 'prestasi_sirmis', 'uses' => 'PrestasiController@prestasi']);
Route::get('/search-list-prestasi', ['as' => 'search', 'uses' => 'PrestasiController@search']);

// pimpinan_lembaga
Route::get('pimpinan_lembaga/index', ['as' => 'pimpinan_lembaga', 'uses' => 'admin\PimpinanController@index']);
Route::get('pimpinan_lembaga/create', ['as' => 'create', 'uses' => 'admin\PimpinanController@create']);
Route::post('pimpinan_lembaga/create', ['as' => 'store', 'uses' => 'admin\PimpinanController@store']);
Route::get('pimpinan_lembaga/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PimpinanController@edit']);
Route::put('pimpinan_lembaga/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PimpinanController@update']);
Route::get('pimpinan_lembaga/show/{id}', ['as' => 'show', 'uses' => 'admin\PimpinanController@show']);
Route::delete('pimpinan_lembaga/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PimpinanController@destroy']);
Route::get('/searchpimpinan_lembaga', ['as' => 'searchpimpinan_lembaga', 'uses' => 'admin\PimpinanController@search']);

// kategori_pimpinan
Route::get('kategori_pimpinan/index', ['as' => 'kategori_pimpinan', 'uses' => 'admin\KategoriPimpinanController@index']);
Route::get('kategori_pimpinan/create', ['as' => 'create', 'uses' => 'admin\KategoriPimpinanController@create']);
Route::post('kategori_pimpinan/create', ['as' => 'store', 'uses' => 'admin\KategoriPimpinanController@store']);
Route::get('kategori_pimpinan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriPimpinanController@edit']);
Route::put('kategori_pimpinan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriPimpinanController@update']);
Route::get('kategori_pimpinan/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriPimpinanController@show']);
Route::delete('kategori_pimpinan/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriPimpinanController@destroy']);
Route::get('/searchkategori_pimpinan', ['as' => 'searchkategori_pimpinan', 'uses' => 'admin\KategoriPimpinanController@search']);

// kategori_visimisi
Route::get('kategori_visimisi/index', ['as' => 'kategori_visimisi', 'uses' => 'admin\KategoriVisiMisiController@index']);
Route::get('kategori_visimisi/create', ['as' => 'create', 'uses' => 'admin\KategoriVisiMisiController@create']);
Route::post('kategori_visimisi/create', ['as' => 'store', 'uses' => 'admin\KategoriVisiMisiController@store']);
Route::get('kategori_visimisi/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriVisiMisiController@edit']);
Route::put('kategori_visimisi/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriVisiMisiController@update']);
Route::get('kategori_visimisi/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriVisiMisiController@show']);
Route::delete('kategori_visimisi/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriVisiMisiController@destroy']);
Route::get('/searchkategori_visimisi', ['as' => 'searchkategori_visimisi', 'uses' => 'admin\KategoriVisiMisiController@search']);

// kategori_lembaga
Route::get('kategori_lembaga/index', ['as' => 'kategori_lembaga', 'uses' => 'admin\KategoriLembagaController@index']);
Route::get('kategori_lembaga/create', ['as' => 'create', 'uses' => 'admin\KategoriLembagaController@create']);
Route::post('kategori_lembaga/create', ['as' => 'store', 'uses' => 'admin\KategoriLembagaController@store']);
Route::get('kategori_lembaga/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriLembagaController@edit']);
Route::put('kategori_lembaga/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriLembagaController@update']);
Route::get('kategori_lembaga/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriLembagaController@show']);
Route::delete('kategori_lembaga/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriLembagaController@destroy']);
Route::get('/searchkategori_lembaga', ['as' => 'searchkategori_lembaga', 'uses' => 'admin\KategoriLembagaController@search']);

// detail_lembaga
Route::get('detail_lembaga/index', ['as' => 'detail_lembaga', 'uses' => 'admin\DetailLembagaController@index']);
Route::get('detail_lembaga/create', ['as' => 'create', 'uses' => 'admin\DetailLembagaController@create']);
Route::post('detail_lembaga/create', ['as' => 'store', 'uses' => 'admin\DetailLembagaController@store']);
Route::get('detail_lembaga/edit/{id}', ['as' => 'edit', 'uses' => 'admin\DetailLembagaController@edit']);
Route::put('detail_lembaga/edit/{id}', ['as' => 'edit', 'uses' => 'admin\DetailLembagaController@update']);
Route::get('detail_lembaga/show/{id}', ['as' => 'show', 'uses' => 'admin\DetailLembagaController@show']);
Route::delete('detail_lembaga/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\DetailLembagaController@destroy']);
Route::get('/searchdetail_lembaga', ['as' => 'searchdetail_lembaga', 'uses' => 'admin\DetailLembagaController@search']);

// kategori testimoni
Route::get('kategori_testimoni/index', ['as' => 'kategori_testimoni', 'uses' => 'admin\KategoriTestimoniController@index']);
Route::get('kategori_testimoni/create', ['as' => 'create', 'uses' => 'admin\KategoriTestimoniController@create']);
Route::post('kategori_testimoni/create', ['as' => 'store', 'uses' => 'admin\KategoriTestimoniController@store']);
Route::get('kategori_testimoni/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriTestimoniController@edit']);
Route::put('kategori_testimoni/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriTestimoniController@update']);
Route::delete('kategori_testimoni/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriTestimoniController@destroy']);

// testimoni
Route::get('testimoni/index', ['as' => 'testimoni', 'uses' => 'admin\TestimoniController@index']);
Route::get('testimoni/create', ['as' => 'create', 'uses' => 'admin\TestimoniController@create']);
Route::post('testimoni/create', ['as' => 'store', 'uses' => 'admin\TestimoniController@store']);
Route::get('testimoni/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TestimoniController@edit']);
Route::put('testimoni/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TestimoniController@update']);
Route::get('testimoni/show/{id}', ['as' => 'show', 'uses' => 'admin\TestimoniController@show']);
Route::delete('testimoni/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\TestimoniController@destroy']);
Route::get('/searchtestimoni', ['as' => 'searchtestimoni', 'uses' => 'admin\TestimoniController@search']);

// tentang-pesantren
Route::get('tentang-pesantren/index', ['as' => 'tentang-pesantren', 'uses' => 'admin\TentangPesantrenController@index']);
Route::get('tentang-pesantren/create', ['as' => 'create', 'uses' => 'admin\TentangPesantrenController@create']);
Route::post('tentang-pesantren/create', ['as' => 'store', 'uses' => 'admin\TentangPesantrenController@store']);
Route::get('tentang-pesantren/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TentangPesantrenController@edit']);
Route::put('tentang-pesantren/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TentangPesantrenController@update']);
Route::get('tentang-pesantren/show/{id}', ['as' => 'show', 'uses' => 'admin\TentangPesantrenController@show']);
Route::delete('tentang-pesantren/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\TentangPesantrenController@destroy']);

// pembiayaan
Route::get('pembiayaan/index', ['as' => 'pembiayaan', 'uses' => 'admin\PembiayaanController@index']);
Route::get('pembiayaan/create', ['as' => 'create', 'uses' => 'admin\PembiayaanController@create']);
Route::post('pembiayaan/create', ['as' => 'store', 'uses' => 'admin\PembiayaanController@store']);
Route::get('pembiayaan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PembiayaanController@edit']);
Route::put('pembiayaan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PembiayaanController@update']);
Route::get('pembiayaan/show/{id}', ['as' => 'show', 'uses' => 'admin\PembiayaanController@show']);
Route::delete('pembiayaan/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PembiayaanController@destroy']);

// jadwal-pendaftaran
Route::get('jadwal-pendaftaran/index', ['as' => 'jadwal-pendaftaran', 'uses' => 'admin\JadwalPendaftaranController@index']);
Route::get('jadwal-pendaftaran/create', ['as' => 'create', 'uses' => 'admin\JadwalPendaftaranController@create']);
Route::post('jadwal-pendaftaran/create', ['as' => 'store', 'uses' => 'admin\JadwalPendaftaranController@store']);
Route::get('jadwal-pendaftaran/edit/{id}', ['as' => 'edit', 'uses' => 'admin\JadwalPendaftaranController@edit']);
Route::put('jadwal-pendaftaran/edit/{id}', ['as' => 'edit', 'uses' => 'admin\JadwalPendaftaranController@update']);
Route::get('jadwal-pendaftaran/show/{id}', ['as' => 'show', 'uses' => 'admin\JadwalPendaftaranController@show']);
Route::delete('jadwal-pendaftaran/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\JadwalPendaftaranController@destroy']);

// Kegiatan
Route::get('kegiatan/index', ['as' => 'kegiatan', 'uses' => 'admin\KegiatanController@index']);
Route::get('kegiatan/create', ['as' => 'create', 'uses' => 'admin\KegiatanController@create']);
Route::post('kegiatan/create', ['as' => 'store', 'uses' => 'admin\KegiatanController@store']);
Route::get('kegiatan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KegiatanController@edit']);
Route::put('kegiatan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KegiatanController@update']);
Route::get('kegiatan/show/{id}', ['as' => 'show', 'uses' => 'admin\KegiatanController@show']);
Route::delete('kegiatan/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KegiatanController@destroy']);

// Kategori
Route::get('kategori-kegiatan/index', ['as' => 'kategori-kegiatan', 'uses' => 'admin\KategoriKegiatanController@index']);
Route::get('kategori-kegiatan/create', ['as' => 'create', 'uses' => 'admin\KategoriKegiatanController@create']);
Route::post('kategori-kegiatan/create', ['as' => 'store', 'uses' => 'admin\KategoriKegiatanController@store']);
Route::get('kategori-kegiatan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriKegiatanController@edit']);
Route::put('kategori-kegiatan/edit/{id}', ['as' => 'edit', 'uses' => 'admin\KategoriKegiatanController@update']);
Route::get('kategori-kegiatan/show/{id}', ['as' => 'show', 'uses' => 'admin\KategoriKegiatanController@show']);
Route::delete('kategori-kegiatan/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\KategoriKegiatanController@destroy']);

// Flow
Route::get('flow/index', ['as' => 'flow', 'uses' => 'admin\FlowController@index']);
Route::get('flow/create', ['as' => 'create', 'uses' => 'admin\FlowController@create']);
Route::post('flow/create', ['as' => 'store', 'uses' => 'admin\FlowController@store']);
Route::get('flow/edit/{id}', ['as' => 'edit', 'uses' => 'admin\FlowController@edit']);
Route::put('flow/edit/{id}', ['as' => 'edit', 'uses' => 'admin\FlowController@update']);
Route::get('flow/show/{id}', ['as' => 'show', 'uses' => 'admin\FlowController@show']);
Route::delete('flow/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\FlowController@destroy']);

