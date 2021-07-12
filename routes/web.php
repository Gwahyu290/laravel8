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
route::get('cabang','CabangController@data');
route::get('cabang/add','CabangController@add');
route::post('cabang','CabangController@addProcess');
route::get('cabang/edit/{id}','CabangController@edit');
route::patch('cabang/{id}','CabangController@editProcess');
route::delete('cabang/{id}','CabangController@delete');

route::resource('facebook', 'FacebookController');
route::resource('artikel', 'ArtikelController');
route::resource('whatsapp', 'WhatsappController');
route::resource('pamflet', 'PamfletController');
route::resource('instagram', 'InstagramController');
route::resource('googlemap', 'GMapsController');

route::resource('ofthemoon','OfthemoonController');
route::resource('nilaibulanan','NilaiBulananController');
route::resource('ofthemoonk','OfthemoonkController');

route::resource('accakun', 'AccakunController');
route::resource('facebookk', 'FacebookkController');
route::resource('artikelk', 'ArtikelkController');
route::resource('instagramk', 'InstagramkController');
route::resource('pamfletk', 'PamfletkController');
route::resource('whatsappk', 'WhatsappkController');
route::resource('googlemapk', 'GMapskController');
route::resource('nilaiharian', 'NilaiHarianController');
route::resource('nilaimingguan', 'NilaiMingguanController');
route::resource('user','UserController');
route::resource('userk','UserkController');

//search
route::post('instagram','InstagramController@index');
route::post('facebook','FacebookController@index');
route::post('googlemap','GmapsController@index');
route::post('artikel','ArtikelController@index');
route::post('whatsapp','WhatsappController@index');
route::post('pamflet','PamfletController@index');

route::post('nilaimingguan','NilaiMingguanController@index');
route::post('nilaiharian','NilaiHarianController@index');
route::post('nilaibulanan','NilaiBulananController@index');
route::post('ofthemoon','OfthemoonController@index');


//search
route::post('instagram','InstagramController@index');
route::post('facebook','FacebookController@index');
route::post('googlemap','GmapsController@index');
route::post('artikel','ArtikelController@index');
route::post('whatsapp','WhatsappController@index');
route::post('pamflet','PamfletController@index');

route::post('nilaimingguan','NilaiMingguanController@index');
route::post('nilaiharian','NilaiHarianController@index');

route::post('home','HomeController@index');

//delete
route::get('instagramk/{id}/delete','InstagramkController@destroy');
route::get('facebookk/{id}/delete','FacebookkController@destroy');
route::get('googlemapk/{id}/delete','GmapskController@destroy');
route::get('artikelk/{id}/delete','ArtikelkController@destroy');
route::get('whatsappk/{id}/delete','WhatsappkController@destroy');
route::get('pamfletk/{id}/delete','PamfletkController@destroy');

//acc akun
route::post('accakun/{id}','AccakunController@accProcess');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');