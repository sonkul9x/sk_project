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
/* ROUTE LANGUAGE */

Route::get('language/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});


// Route::group(['namespace' => 'User'], function() {
// Route::get('/', 'MainController@getIndex')->name('getIndex');
// Route::get('chi-tiet-tin/{id}/{slug}', 'MainController@getDetail')->name('getDetail')->where('id', '[0-9]+');
// });

/*ROUTE BACKEND */
//ROUTE LOGIN
Route::get('sk_login', 'LoginController@getLogin')->name('getLogin');
Route::post('sk_login', 'LoginController@postLogin')->name('postLogin');
Route::get('logout', 'LoginController@getLogout')->name('getLogout');


Route::middleware(['auth'])->group(function () {
    // ROUTE ADMIN
    Route::group(['prefix' => 'sk_admin', 'namespace' => 'Admin'], function () {
        // DASHBOARD
        Route::get('/', function () {
            return view('admin.modules.dashboard.main');
        })->name('dashboard');

         // USER
        Route::group(['prefix' => 'user','middleware' => 'IsRoles'], function () {
            /*--Group-- */
            Route::get('group', 'UserController@getUserGroup')->name('getUserGroup');
            Route::get('groupadd', 'UserController@getGroupAdd')->name('getGroupAdd');
            Route::post('groupadd', 'UserController@postGroupAdd')->name('postGroupAdd');
            Route::get('groupedit/{id}', 'UserController@getGroupEdit')->name('getGroupEdit')->where('id', '[0-9]+');
            Route::post('groupedit/{id}', 'UserController@postGroupEdit')->name('postGroupEdit')->where('id', '[0-9]+');
            Route::get('groupdel/{id}', 'UserController@getGroupDel')->name('getGroupDel')->where('id', '[0-9]+');


            /*--Permistion--*/
            Route::get('permis', 'UserController@getUserPer')->name('getUserPer');
            Route::get('peradd', 'UserController@getPerAdd')->name('getPerAdd');
            Route::post('peradd', 'UserController@postPerAdd')->name('postPerAdd');
            Route::get('perdel/{id}', 'UserController@getPerDel')->name('getPerDel')->where('id', '[0-9]+');
            Route::get('peredit/{id}', 'UserController@getPerEdit')->name('getPerEdit');
            Route::post('peredit/{id}', 'UserController@postPerEdit')->name('postPerEdit')->where('id', '[0-9]+');

            /* --User-- */
            Route::get('list', 'UserController@getUserList')->name('getUserList');
            Route::get('add', 'UserController@getUserAdd')->name('getUserAdd');
            Route::post('add', 'UserController@postUserAdd')->name('postUserAdd');
            Route::get('delete/{id}', 'UserController@getUserDel')->name('getUserDel')->where('id', '[0-9]+');
            Route::get('edit/{id}', 'UserController@getUserEdit')->name('getUserEdit');
            Route::post('edit/{id}', 'UserController@postUserEdit')->name('postUserEdit')->where('id', '[0-9]+');
            });
            
            // CATEGORY
            Route::group(['prefix' => 'category'], function () {
                Route::get('index', 'CateController@index')->name('getCatList');
                Route::get('add', 'CateController@create')->name('getCatAdd');
                Route::post('add', 'CateController@store')->name('postCatAdd');
                Route::get('delete/{id}', 'CateController@destroy')->name('getCatDel')->where('id', '[0-9]+');
                Route::get('edit/{id}', 'CateController@edit')->name('getCatEdit');
                Route::post('edit/{id}', 'CateController@update')->name('postCatEdit')->where('id', '[0-9]+');
            });
             // NEW
            Route::group(['prefix' => 'new'], function () {
                Route::get('index', 'NewsController@index')->name('getNewList');
                Route::get('add', 'NewsController@create')->name('getNewAdd');
                Route::post('add', 'NewsController@store')->name('postNewAdd');
                Route::get('delete/{id}', 'NewsController@destroy')->name('getNewDel')->where('id', '[0-9]+');
                Route::get('edit/{id}', 'NewsController@edit')->name('getNewEdit');
                Route::post('edit/{id}', 'NewsController@update')->name('postNewEdit')->where('id', '[0-9]+');
            });
             // PAGE 
            Route::group(['prefix' => 'page'], function () {
                Route::get('index', 'PageController@index')->name('getPageList');
                Route::get('add', 'PageController@create')->name('getPageAdd');
                Route::post('add', 'PageController@store')->name('postPageAdd');
                Route::get('delete/{id}', 'PageController@destroy')->name('getPageDel')->where('id', '[0-9]+');
                Route::get('edit/{id}', 'PageController@edit')->name('getPageEdit');
                Route::post('edit/{id}', 'PageController@update')->name('postPageEdit')->where('id', '[0-9]+');
            });
             // CUSTOMER 
            Route::group(['prefix' => 'customer'], function () {
                Route::get('index', 'CustomerController@index')->name('getCustomerList');
                 Route::get('show/{id}', 'CustomerController@show')->name('getCustomerShow')->where('id', '[0-9]+');
                Route::get('delete/{id}', 'CustomerController@destroy')->name('getCustomerDel')->where('id', '[0-9]+');
                Route::get('send/{id}', 'CustomerController@getCustomerSend')->name('getCustomerSend');
                Route::post('send/{id}', 'CustomerController@postCustomerSend')->name('postCustomerSend')->where('id', '[0-9]+');
            });

             //FILE MANAGER CONTROL
            Route::get('filemanager', function () {
                return view('admin.modules.filemanager.file');
            })->name('FileManager');        
            Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
            Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');       
       
    });
    

});