<?php



Route::group(['middleware' => ['web']], function () {
	Route::auth();
	
	// API Android client
	Route::post('prescription/post-image', 	'PrescriptionApi@getRequestImg');
	Route::post('prescription/post-drugs', 	'PrescriptionApi@getRequestList');
	Route::post('prescription/conform', 	'PrescriptionApi@getConform');

	Route::get('prescription', 'Prescription@showAll');
    Route::get('prescription/insert', 	
	['as' => 'insert' , 'uses' => 'Prescription@insertForm']);
	Route::post('prescription/insert',
	['as' => 'insert_store' , 'uses' => 'Prescription@insertSave']);
	// Route::get('prescription/update', 'Prescription@update');
	// Route::get('prescription/delete', 'Prescription@delete');	

	//	test API
	Route::post('test','TestAPI@checkResponse');
});

Route::group(['middleware' => ['web', 'auth']], function () {
	
	// Route::get('/', 'Home@index');

	//	Hiển thị toa thuốc
	Route::get('/don-thuoc-moi', 'Prescription@showAll');
	Route::get('/don-thuoc-moi/show/{id}', 'Prescription@showItem'); 
	Route::get('/don-thuoc-moi/xoa/{id}', 'Prescription@resendPre');
	Route::get('/don-thuoc-moi/xu-ly/{id}', 'Prescription@update');

	Route::get('/cho-xu-ly', 'PrescriptionWaiting@showAll');
	Route::get('/cho-xu-ly/{id}', 'PrescriptionWaiting@showItem');
	Route::get('/cho-xu-ly/xoa-toa/{id}', 'PrescriptionWaiting@unavailablePre');
	Route::post('cho-xu-ly/xu-ly/', 'PrescriptionWaiting@handle');
	Route::get('/cho-xu-ly/xoa/{id}', 'PrescriptionWaiting@unavailablePre');

	Route::get('/cho-xat-nhan', 'PrescriptionConfirn@showAll');
	Route::get('/cho-xat-nhan/show-toa/{id}', 'PrescriptionConfirn@showItem');
	Route::get('/giao-nhan', 'PrescriptionOrder@showAll');
	Route::get('/hoan-thanh', 'PrescriptionFinish@showAll');

	Route::get('/', function(){
		return view('main');
	});

	Route::get('/api/v1/notif', 'notification@notif');
	Route::get('/api/v1/newpre', 'adminAPI@newpre');
	Route::get('/api/v1/newpre/cancel/{id}', 'adminAPI@newpreCancel');
	Route::get('/api/v1/newpre/can/{id}', 'adminAPI@newpreCan');

	Route::get('/api/v1/handlingpre', 'adminAPI@handlingpre');
	Route::get('/api/v1/handlingpre/cancel/{id}', 'adminAPI@handlingpreCancel');
	Route::get('/api/v1/handlingpre/can/{id}', 'adminAPI@handlingpreCan');

	Route::get('/api/v1/confirm', 'adminAPI@confirm');
	Route::get('/api/v1/get-pre/{id}', 'adminAPI@getPre');
	Route::post('/api/v1/drug-import', 'adminAPI@drugImport');

	Route::get('/api/v1/ship', 'adminAPI@ship');
});


