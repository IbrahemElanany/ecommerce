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

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['web','admin']],function (){

    #admin
    Route::get('/adminpanel/users/data',['as'=>'adminpanel.users.data','uses'=>'UsersController@anyData']);

    Route::get('/adminpanel', 'AdminController@index');

    #users

    Route::resource('/adminpanel/users', 'UsersController');

    Route::post('/adminpanel/users/{id}', 'UsersController@changePassword');

    Route::get('/adminpanel/users/{id}/delete', 'UsersController@destroy');






    #settings

    Route::get('/adminpanel/sitesetting', 'SiteSettingController@index');

    Route::post('/adminpanel/sitesetting', 'SiteSettingController@store');

    #Bu

    Route::resource('/adminpanel/bu', 'BuController');

    Route::get('/adminpanel/bu', 'BuController@index');

    Route::post('/adminpanel/bu', 'BuController@store');

    Route::get('/adminpanel/bu/{id}/delete', 'BuController@destroy');

    Route::get('/showAllBuilding', 'BuController@showAll');

    Route::get('/ForRent', 'BuController@ForRent');

    Route::get('/ForBuy', 'BuController@ForBuy');

    Route::get('/type/{type}', 'BuController@showByType');

    Route::post('/search', 'BuController@search');





























//    Route::get('/datatable/lang',function (){
//        $slangJson = [
//            "sProcessing"=>  "جاري التحميل...",
//            "sLengthMenu"=>   "أظهر _MENU_ مُدخلات",
//            "sZeroRecords"=> "لم يُعثر على أية سجلات",
//            "sInfo"=>         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
//            "sInfoEmpty"=>    "يعرض 0 إلى 0 من أصل 0 سجلّ",
//            "sInfoFiltered"=> "(منتقاة من مجموع _MAX_ مُدخل)",
//            "sInfoPostFix"=>  "",
//            "sSearch"=>      "ابحث:",
//            "sUrl"=>         "",
//            "oPaginate"=>[
//                "sFirst"=>    "الأول",
//                "sPrevious"=> "السابق",
//                "sNext" =>    "التالي",
//                "sLast"=>     "الأخير"
//            ],
//        ];
//
//        return json_encode($slangJson);
////        return response()->json($slangJson);
//    });


//    Route::post('/adminpanel/users/changePassword', 'UsersController@changePassword');

//    Route::post('/adminpanel/users/{id}', ['as'=>'','uses'=>'UsersController@changePassword']);


});


