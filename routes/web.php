<?php
Route::get('/',function(){
	return redirect('admin/home');
});
Auth::routes();
	Route::group(['prefix' => 'admin', 'namespace' =>'Admin'], function(){

		Route::group(['middleware'=>['auth','auto-check-permission'] ], function(){
			Route::view('home', 'admin.home');
			Route::resource('governorate', 'GovernorateController');
			Route::resource('city', 'CitiesController');
			Route::resource('clients', 'ClientsController');
			Route::resource('category', 'CategoriesController');
			Route::resource('post', 'PostsController');
			Route::resource('users', 'UserController');
			Route::get('change-password', 'UserController@changePassword');
			Route::post('change-password', 'UserController@changePasswordSave');
			Route::resource('contacts', 'ContactsController');
			Route::resource('settings', 'SettingsController');
			Route::resource('donation', 'DonationController');
			Route::resource('role', 'RoleController');
	        Route::get('clients/{id}/active','ClientsController@active');
	        Route::get('clients/{id}/de-active','ClientsController@deActive');
        });

	});

	//
    Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
    });
	Route::group(['prefix'=>'blood-bank', 'namespace'=>'Front'], function(){
		Route::get('register', 'AuthController@register');
		Route::post('register', 'AuthController@registerSave');
		Route::get('login', 'AuthController@login');
        Route::post('login', 'AuthController@doLogin');
        Route::get('home', 'StyleController@home');
		Route::get('donation', 'StyleController@donation');
        Route::get('donation', 'StyleController@donationSearch');
		Route::get('/donation-details/{id}', 'StyleController@donationDetails');
		Route::get('contact', 'StyleController@contactUs');
        Route::post('contact', 'StyleController@contactUsPost');
		Route::get('posts', 'StyleController@posts');
		Route::get('who-we-are', 'StyleController@settings');

        Route::group(['middleware'=>'auth:client-web'], function(){
            Route::post('toggle-favourite', 'StyleController@toggleFavourite')->name('toggle-favourite');
        });




	});


Route::get('/home', 'HomeController@index')->name('home');
