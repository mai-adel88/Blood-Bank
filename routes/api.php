<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1'], function(){
	Route::get('cities', 'AllController@cities');
	Route::get('clients', 'AllController@clients');
	Route::get('governorates', 'AllController@governorates');
	Route::get('settings', 'AllController@settings');
	Route::get('blood-types', 'AllController@bloodTypes');


	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::post('reset-password', 'AuthController@resetPassword');
	Route::post('new-password', 'AuthController@newPassword');

	

	Route::group(['middleware'=>'auth:api'], function(){
		Route::post('posts', 'AllController@posts');
		Route::put('update', 'AllController@updateProfile');
		Route::post('contactus', 'AllController@contactUs');
		Route::post('donation', 'AllController@orderDonation');
		Route::get('notifications', 'AllController@notifications');
		Route::get('notification-settings', 'AllController@notificationSettings');
		Route::post('update-notification-settings', 'AllController@updateNotificationSettings');
		Route::post('register-token', 'AuthController@registerToken');
		Route::post('remove-token', 'AuthController@removeToken');
		

		Route::get('list-of-favourites', 'AllController@listOfFavourites');
		Route::post('toggle-favourites', 'AllController@toggleFavourites');
		Route::post('search-blood-type', 'AllController@searchBloodType');



	
	});

});

