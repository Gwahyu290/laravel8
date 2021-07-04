<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login',['title'=> 'Samchick']);
});

route::get('skaryawan','SkaryawanController@data');
route::get('skaryawan/add','SkaryawanController@add');
route::post('skaryawan','SkaryawanController@addProcess');
route::get('skaryawan/edit/{id}','SkaryawanController@edit');
route::patch('skaryawan/{id}','SkaryawanController@editProcess');
route::delete('skaryawan/{id}','SkaryawanController@delete');

route::get('cabang','CabangController@data');
route::get('cabang/add','CabangController@add');
route::post('cabang','CabangController@addProcess');
route::get('cabang/edit/{id}','CabangController@edit');
route::patch('cabang/{id}','CabangController@editProcess');
route::delete('cabang/{id}','CabangController@delete');

route::resource('dkaryawan', 'UserController');
route::resource('dkaryawank', 'DkaryawankController');
route::resource('report', 'ReportController');
route::resource('facebook', 'FacebookController');
route::resource('artikel', 'ArtikelController');
route::resource('whatsapp', 'WhatsappController');
route::resource('pamflet', 'PamfletController');
route::resource('instagram', 'InstagramController');
route::resource('googlemap', 'GMapsController');

route::resource('ofthemoon','OfthemoonController');
route::resource('ofthemoonk','OfthemoonkController');

route::resource('profilkaryawan','ProfilController');
route::resource('profilkaryawank','ProfilkController');
route::resource('reportk', 'ReportkController');
route::resource('facebookk', 'FacebookkController');
route::resource('artikelk', 'ArtikelkController');
route::resource('instagramk', 'InstagramkController');
route::resource('pamfletk', 'PamfletkController');
route::resource('whatsappk', 'WhatsappkController');
route::resource('googlemapk', 'GMapskController');
route::resource('nilaiharian', 'NilaiHarianController');
route::resource('nilaimingguan', 'NilaiMingguanController');
route::resource('user','UserController');

//search
route::post('instagram','InstagramController@index');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');