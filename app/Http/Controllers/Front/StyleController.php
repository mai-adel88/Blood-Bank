<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DonationRequest;
use App\Post;
use App\Client;
use App\ContactUs;
use App\BloodType;
use App\Settings;

class StyleController extends Controller
{
	public function home(Request $request)
	{
		//login by id
		$client = Client::first();
		auth('client-web')->login($client);
		//dd(auth('client-web')->user());
		//dd($request->user());
		$posts = Post::take(9)->get();
		return view('style.home', compact('posts'));
	}

	public function donation()
	{
        $donations = DonationRequest::paginate(5);

		return view('style.donations',compact('donations'));
	}

    public function donationSearch(Request $request)
    {
       // dd($request->blood_type_id);


           //$donations = DonationRequest::where('blood_type_id','like','%'. $request->blood_type_id . '%'  )->paginate(1);

            $donations = DonationRequest::where(function($q) use($request){
                if($request->blood_type_id){
                    $q->where('blood_type_id',$request->blood_type_id);
                }
                if($request->city_id){
                    $q->where('city_id',$request->city_id);
                }


            })->paginate(10);
                 //dd($donations)
            return view('style.donations',compact('donations'));




    }

	public function donationDetails($id)
	{
		$donations = DonationRequest::where('id',$id)->get();
		return view('style.donation_details',compact('donations'));
	}

	public function posts()
	{
		$posts = Post::paginate(2);
		return view('style.posts', compact('posts'));
	}

	public function toggleFavourite(Request $request)
	{
		$toggle = $request->user()->posts()->toggle($request->post_id); //
		return apiResponse(1, 'success', $toggle);
	}

    public function contactUs()
    {
        $contact = ContactUs::get();
        return view('style.contact', compact('contact'));
    }

    public function contactUsPost(Request $request)
    {
        $this->validate($request, [
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   =>  'required',
        'subject' =>'required',
        'message' => 'required'
        ]);
       $contacts = ContactUS::create($request->all());

       \Mail::send('style.email',[
           'name'    => $request->get('name'),
           'email'   => $request->get('email'),
           'phone'   => $request->get('phone'),
           'subject' => $request->get('subject'),
           'message' => $request->get('message')
            ], function($message) use($request)
           {
               $message->from($request->get('email'));
               $message->to('maiadel799@gmail.com', 'Admin');
           });
       return back()->with('success', 'شكرا لتواصلك معنا');
    }

    public function settings()
    {
        $settings = Settings::get();
        return view('style.who-we-are', compact('settings'));
    }
}
