<?php
use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Hospital;
/*
 *
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/index', function () {

    return view('website.register');
});


Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/news', 'HomeController@news')->name('news');

Auth::routes();



Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');
Route::post('/admin/profile', 'AdminController@profile_update')->name('admin.profile.update');

Route::get('/profile', 'UserController@profile')->name('user.profile');

Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');

Route::get('/hospital/profile','HospitalController@profile')->name('Hospital.profile');
Route::post('/hospital/profile', 'HospitalController@profile_update')->name('Hospital.profile.update');

//Route::resource('/hospital/vaccine','VaccineController');
Route::resource('Schedule','ScheduleController');
Route::get('/Home', 'HospitalController@home')->name('hospital.home');

Route::resource('hospital','HospitalController');
Route::get('takeVaccine', 'HospitalController@takeVaccine');
Route::post('createQr', 'HospitalController@createQr')->name('createQr');;
Route::get('takeVaccine', 'HospitalController@takeVaccine');

Route::get('showSure', 'HospitalController@showSure')->name('showSure');
Route::get('ShowVaccine', 'VaccineController@ShowVaccine')->name('ShowVaccine')->middleware('auth');
Route::resource('Message','MessageController');
Route::resource('Question','QuestionController');

Route::get('message', 'MessageController@indexForHospital')->name('message.hospital');
Route::post('replay', 'MessageController@replay')->name('message.replay');

Route::get('replay/{id}', 'MessageController@showForReplay')->name('message.replay.show');
Route::get('MarkAsRead_all','MessageController@MarkAsRead_all')->name('MarkAsRead_all');
Route::get('ReadNotification','MessageController@ReadNotification')->name('ReadNotification');
Route::get('ReadNotification2','MessageController@ReadNotification2')->name('ReadNotification2');



Route::resource('admin','AdminController');
Route::get('hospitals','AdminController@showAllHospitals')->name('admin.allH');
Route::get('posts','AdminController@showAllPosts')->name('admin.allPost');


Route::resource('vaccine','VaccineController');
Route::resource('user','UserController');

Route::resource('post','PostController');
Route::resource('appointments','AppointmentsController');
Route::get('MarkAsRead_all_user','AppointmentsController@MarkAsRead_all')->name('MarkAsRead_all_user');

Route::match(['GET','POST'],'subcat', 'AppointmentsController@subCat')->name('subCat');
Route::match(['GET','POST'],'subDay', 'AppointmentsController@subDay')->name('subDay');
Route::match(['GET','POST'],'ajax-request', 'AppointmentsController@subDate');

Route::get('/qrCode/{id}', 'HospitalController@showQr')->name('qrCode');
Route::get('/path',  function() {
    return public_path();
} );











Auth::routes();
Route::get('/userOrHospital','Auth\RegisterController@userOrHospitalPage')->name('userOrHospital');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/hospital', 'Auth\LoginController@showHospitalLoginForm');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/hospital', 'Auth\RegisterController@showHospitalRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/hospital', 'Auth\LoginController@hospitalLogin')->name('hospital.login');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/hospital', 'Auth\RegisterController@createHospital')->name('hospital.register');;


Route::view('/home', 'home')->middleware('auth');
