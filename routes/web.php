<?php

use Illuminate\Support\Facades\Route;
use PHPMailer\PHPMailer;

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

Route::get('/', 'Auth@index');
Route::post('/login/post', 'Auth@loginpost');
Route::get('/lupapassword', 'Auth@lupapassword');
Route::get('/resetpassword/{id}', 'Auth@aktivasi');
Route::get('/logout', 'Auth@logout');
Route::get('/dashboard', 'User@index');
Route::get('faq/kategori/{id}', 'User@bykategori');
Route::post('/autocomplete/fetch', 'User@fetch')->name('autocomplete.fetch');
Route::get('/artikel/{id}', 'User@artikel');
Route::get('/artikel/membantu/{id}', 'User@artikelmembantu');
Route::post('/fetch/subkategori', 'User@fetchkhusus')->name('fetch.subkategori');
Route::get('/profil', 'User@profil');
Route::post('/user/tanyakhusus1/post', 'User@tanyakhususpost');
Route::post('/user/tanyakhusus/post', 'User@tanyakhususposttidakpuas');

Route::get('/admin', 'Admin@index');
Route::get('/admin/belumdijawab', 'Admin@belumdijawab');
Route::get('/admin/jawab/{id}', 'Admin@jawab');
Route::post('/admin/jawabpost', 'Admin@jawabpost');
Route::get('/admin/sudahdijawab', 'Admin@sudahdijawab');
Route::get('/admin/lihatjawaban/{id}', 'Admin@detailjawaban');
Route::get('/admin/sudahdijawab/ubah/{id}', 'Admin@ubahjawaban');
Route::post('/admin/sudahdijawab/ubahpost', 'Admin@ubahpost');
Route::get('/admin/koreksi', 'Admin@koreksi');
Route::get('/admin/koreksijawaban/{id}', 'Admin@koreksijawaban');
Route::post('/admin/koreksipost', 'Admin@koreksipost');

Route::get('/superadmin/belumdijawab', 'SuperAdmin@belumdijawab');
Route::get('/superadmin/sudahdijawab', 'SuperAdmin@sudahdijawab');
Route::get('/superadmin/lihatjawaban/{id}', 'SuperAdmin@lihatjawaban');
Route::get('/superadmin/koreksijawaban/{id}', 'SuperAdmin@koreksi');
Route::get('/superadmin/datafaq', 'SuperAdmin@datafaq');
Route::get('/superadmin/datafaq/detail/{id}', 'SuperAdmin@datafaqdetail');
Route::get('/superadmin/release/{id}', 'SuperAdmin@release');
Route::post('/datafaq/detailpost', 'SuperAdmin@detailpost');
Route::get('/superadmin/datafaq/{id}', 'SuperAdmin@faqdetail');
Route::post('/datafaq/detail/ubahpost', 'SuperAdmin@faqubahpost');
Route::get('/superadmin/datauser', 'SuperAdmin@datauser');
Route::post('/superadmin/datauser/tambahpost', 'SuperAdmin@datausertambahpost');
Route::get('/superadmin/datauser/detail/{id}', 'SuperAdmin@detailuser');
Route::post('/superadmin/detailuser/ubahpasswordpost', 'SuperAdmin@detailuserubahpost');
Route::post('/superadmin/detail/ubahpost', 'SuperAdmin@ubahpost');
Route::get('/superadmin/datauser/hapus/{id}', 'SuperAdmin@datauserhapus');
Route::get('/superadmin/dataadmin', 'SuperAdmin@dataadmin');
Route::post('/superadmin/dataadmin/tambahpost', 'SuperAdmin@dataadmintambahpost');
Route::get('/superadmin/dataadmin/detail/{id}', 'SuperAdmin@dataadmindetail');
Route::post('/superadmin/detail/ubahadminpost', 'SuperAdmin@adminubahpost');
Route::get('/superadmin/settingmenu', 'SuperAdmin@settingmenu');
Route::post('/superadmin/settingmenu/menu1post', 'SuperAdmin@menu1post');
Route::post('/superadmin/settingmenu/menu2post', 'SuperAdmin@menu2post');
Route::get('/superadmin/settingadmin/penggunaaktif01/{id}', 'SuperAdmin@penggunaaktif01');
Route::get('/superadmin/settingadmin/penggunatidakaktif01/{id}', 'SuperAdmin@penggunatidakaktif01');
Route::get('/superadmin/settingvariable', 'SuperAdmin@variable');
Route::get('/superadmin/report', 'SuperAdmin@report');
Route::get('/superadmin/ingatkan/{id}', 'SuperAdmin@ingatkan');

Route::post('/cetak/report', 'SuperAdmin@cetak');
Route::post('/cetak/report/artikel', 'SuperAdmin@cetakartikel');
Route::post('/cetak/report/pertanyaan', 'SuperAdmin@cetakpertanyaan');

Route::post('/lupapassword/post', 'Auth@lupapasswordpost');
Route::post('/aktivasi/post', 'Auth@aktivasipost');
