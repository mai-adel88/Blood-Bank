<?php
Route::get('/',function(){
	return redirect('admin/home');
});
Auth::routes();
	Route::group(['prefix' => 'admin', 'namespace' =>'Admin'], function(){
				
		Route::group(['middleware'=>['auth','auto-check-permission'] ], function(){
			Route::view('/home', 'admin.home');
			Route::resource('/governorate', 'GovernorateController');
			Route::resource('/city', 'CitiesController');
			Route::resource('/clients', 'ClientsController');
			Route::resource('/category', 'CategoriesController');
			Route::resource('/post', 'PostsController');
			Route::resource('/users', 'UserController');
			Route::get('/change-password', 'UserController@changePassword');
			Route::post('/change-password', 'UserController@changePasswordSave');
			Route::resource('/contacts', 'ContactsController');
			Route::resource('/settings', 'SettingsController');
			Route::resource('/donation', 'DonationController');
			Route::resource('/role', 'RoleController');
	        Route::get('clients/{id}/active','ClientsController@active');
	        Route::get('clients/{id}/de-active','ClientsController@deActive');
        });

	});


Route::get('/home', 'HomeController@index')->name('home');
