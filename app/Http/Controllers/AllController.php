<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\City;
use App\Governorate;
use App\Client;
use App\ContactUs;
use App\DonationRequest;
use App\Settings;
use App\BloodType;
use App\Notification;
use App\Token;

class AllController extends Controller
{

	public function clients()
	{
		$clients = Client::paginate(2);
		return apiResponse(1, "success", $clients);
	}
	//search in posts with category And title or content (filter)
	public function posts(Request $request) 
	{
		$posts = Post::where(function($q) use($request){
			if($request->has('category_id')){ //dropdown
				$q->where('category_id', $request->category_id);
			}

			if($request->has('keyword')){ //search
				$q->where(function($q) use($request){
					$q->where('title', 'like', '%'.$request->keyword.'%');

					$q->orWhere('content', 'like', '%'.$request->keyword.'%');
				});
			}
		})->paginate(5);


		return apiResponse(1, 'dd', $posts);

	}



	public function listOfFavourites(Request $request)  //get list of favourit posts
	{
		$list = $request->user()->posts()->paginate(1); 

		return apiResponse(1, 'success', $list);

	}

	public function toggleFavourites(Request $request)
	{
		$validator = validator()->make($request->all(), [
			'post_id' =>'required|exists:posts,id'
		]);

		if($validator->fails())
		{
			return apiResponse(0, $validator->errors());
		}
	

		$favPost = Post::find($request->post_id);
		$toggle = $request->user()->posts()->toggle($request->post_id); //
		return apiResponse(1, 'success', $favPost);
	}




	public function governorates()
	{
		$governorates = Governorate::get();
		return apiResponse(1, "success", $governorates);

	}
	public function cities(Request $request)
	{
		$cities = City::where(function($query) use($request){
			if($request->has('governorate_id')) 
				$query->with('governorate')->where('governorate_id', $request->governorate_id);
		})->get();

		return apiResponse(1, "success", $cities);
	}

	public function settings()
	{
		$settinges = Settings::get();
		return apiResponse(1, 'success', $settinges);
	}
	public function updateProfile(Request $request)
	{
		if($request->has('password')){
			$request->merge(['password'=>bcrypt($request->password)]);
		}
		$inputs =$request->all();
		$profUpdate = $request->user()->update($inputs);
		
		// $profUpdate = Client::where('id', $request->id)->update([
		// 	'email'			=>$request->email,
		// 	'name'			=>$request->name,
		// 	'd_o_b'			=>$request->d_o_b,
		// 	'blood_type_id'	=>$request->blood_type_id,
		// 	'last_donation_date'=>$request->last_donation_date,
		// 	'city_id'		=>$request->city_id,
		// 	'password'		=>$request->password,
		// 	'phone'			=>$request->phone
		// ]);
		return apiResponse(1, "success", $request->user());
	}

	public function contactUs(Request $request)
	{
		$validator = validator()->make($request->all(), [
			'name'		=>'required',
			'email'		=>'required',
			'phone'		=>'required',
			'subject'	=>'required',
			'message'	=>'required',
		]);

		if($validator->fails()){
			return apiResponse(1, $validator->errors());
		}

		$contact = ContactUs::create($request->all());

		return apiResponse(1, 'success', $contact);
	}

	public function bloodTypes()
	{
		$types = BloodType::get();
		return apiResponse(1, 'success', $types);
	}

	//make donation and its notification and link this notification with clients
	public function orderDonation(Request $request)
	{
		$validator = validator()->make($request->all(), [
			'full_name'		  =>'required',
			'phone'			  =>'required',
			'age'			  =>'required',
			'hospital_name'	  =>'required',
			'hospital_address'=>'required',
			'num_of_bag'	  =>'required',
			'notes'		 	  =>'required',
			'latitude'		  =>'required',
			'longitude'		  =>'required',
			'city_id'		  =>'required|exists:clients,id'

		]);
		if($validator->fails()){
			return apiResponse(1, $validator->errors());
		}

		//create donation order
		$donation = $request->user()->donationOrders()->create($request->all());

		
		//find clients where choosed the governorates and blood types to recieve notifications
		$clientIds = $donation->city->governorate
		->clients()->whereHas('bloodtypes', function($q) use($request){

			$q->where('blood_types.id', $request->blood_type_id);

		})->pluck('clients.id')->toArray(); //return array of client ids

		if(count($clientIds)){
		//create notification in db
			$notifications = $donation->notifications()->create([
				'content'  =>$donation->bloodType->type . 'محتاج تبرع لفصيلة'
			]);	
		}


		//attach(many-to-many) clients with there notifications
		$notifications->clients()->attach($clientIds);


		//send notification to mobile |for sending push notification with Firebase Cloud Messaging (FCM).
		//get tokens for FCM (push notification using firebase cloud)
		$tokens = Token::whereIn('client_id', $clientIds)->where('token','!=',null)->pluck('token')->toArray();

		if(count($tokens)){
			$title='blood type';
			$body =$notifications->content;
			$data = [
				'donation_req_id'=>$donation->id
			];
			$send = notifyByFirebase($title,$body, $tokens, $data);
			info('Firebase result:' . $send);
		}
		return apiResponse(1, "success", $send);

	}
	//search in donation requests with blood types
	public function searchBloodType(Request $request) 
	{
		$donation_requests = DonationRequest::where(function($q) use($request){
			if($request->has('blood_type_id')){
				$q->where('blood_type_id', $request->blood_type_id);
			}

			if($request->has('city_id')){
				$q->where('city_id', $request->city_id);
			}

		})->paginate(4);

		return apiResponse(1, 'success', $donation_requests);
	}

	public function notifications()
	{
		$list = Notification::paginate(1);
		return apiResponse(1, 'success', $list);
	}

	public function notificationSettings(Request $request)
	{
		$govIds = $request->user()->governorates()->pluck('governorates.id')->toArray();
		

		$bloodTypesIds = $request->user()->bloodTypes()->pluck('blood_types.id')->toArray();
		return apiResponse(1, 'success',  [
				'govIds' => $govIds,
				'bloodTypesIs'=>$bloodTypesIds
						]);

	}

	public function updateNotificationSettings(Request $request)
	{
		$validator = validator()->make($request->all(), [
			'governorates'	  =>'required|array',
			'blood_types'	  =>'required|array',

		]);
		if($validator->fails()){
			return apiResponse(1, $validator->errors());
		}

		$gov = $request->user()->governorates()->sync($request->governorates);
		$bloodTypes = $request->user()->bloodTypes()->sync($request->blood_types);

		return apiResponse(1,'success',[$gov,$bloodTypes]);
	}
    
}
