<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	//	demo routing
	Route::get('/user/{id}',function($id){
		return 'User ' . $id;
	});

	Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
	    return 'post : ' .$postId .' ,comment : '. $commentId; 
	});


	Route::get('user/{name?}', function ($name = null) {
	    return $name;
	});

	Route::get('user/{name?}', function ($name = 'John') {
		    return $name;
		});

	Route::get('mongo/show', 'Mongo@showCollections');

	Route::get('mongo/insert', 'Mongo@insertCol');

	Route::get('mongo/update', 'Mongo@updateCol');

	Route::get('mongo/delete', 'Mongo@deleteCol');


	Route::get('prescription', 'Prescription@showAll');

    Route::get('prescription/insert', 	
	['as' => 'insert' , 'uses' => 'Prescription@insertForm']);
	
	Route::post('prescription/insert',
	['as' => 'insert_store' , 'uses' => 'Prescription@insertSave']);


	Route::get('prescription/update', 'Prescription@update');
	Route::get('prescription/delete', 'Prescription@delete');	

	Route::get('header/form', 'Header@getForm');
	Route::post('header/post', 'Header@store');
	Route::get('header/show', 'Header@display');

});



//xu ly don thuoc
Route::get('/don-thuoc-moi', 'Prescription@showAll');
Route::get('/don-thuoc-moi/show/{id}', 'Prescription@showItem'); 
Route::get('/don-thuoc-moi/xoa/{id}', 'Prescription@delete');
Route::get('/don-thuoc-moi/xu-ly/{id}', 'Prescription@update');

Route::get('/cho-xu-ly', 'PrescriptionWaiting@showAll');
Route::get('/cho-xu-ly/{id}', 'PrescriptionWaiting@showItem');
Route::get('/cho-xu-ly/xoa-toa/{id}', 'PrescriptionWaiting@delete');
Route::post('cho-xu-ly/xu-ly/', 'PrescriptionWaiting@handle');
Route::get('/cho-xu-ly/xoa/{id}', 'PrescriptionWaiting@delete');

Route::get('/cho-xat-nhan', 'PrescriptionConfirn@showAll');

Route::get('/giao-nhan', 'PrescriptionOrder@showAll');

Route::get('/hoan-thanh', 'PrescriptionFinish@showAll');


// Route::get('/show-toa', function () {
//     return view('show-toa');
// });