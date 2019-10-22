<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class AuthController extends Controller
{
	public function register()
	{
		return view('style.register');
	}

	public function registerSave(Request $request)
	{
		$validator = [
            'name'    => 'required',
            'email'   => 'required|unique',
            'password'=> 'required',
            'd_o_b'   => 'required|date_format:Y-m-d',
            'phone'   => 'required|unique',
            'blood_type_id'=>'required|exists:bloodTypes',
            'city_id'   =>'required|exists:cities',
        ];
        $request->merge(['password'=>bcrypt($request->password)]);
        $input = $request->all();

        $validator = \Validator::make($input, $validator);

        $client=Client::create($input);
        $client->api_token = str_random(60); //
        auth('client-web')->login($client);
        $client->save();
        return redirect('blood-bank/home');
	}

    public function login()
    {
        return view('style.login');
    }

    public function doLogin(Request $request)
    {
        //dd($request->all());
        //$tt=Client::where('phone',"01010")->update(['password' => bcrypt(123)]);

        $validation = $this->validate($request, [
        'phone'     => 'required',
        'password'  => 'required',
        ]);
        $remember_me = request('remember_token')? true : false;
        if (auth()->guard('client-web')->attempt(['phone' => $request->phone,
                            'password' => $request->password,
                             'is_active' => 1], $remember_me)) {
            // The user is active, not suspended, and exists.

            return redirect('blood-bank/home');
        }else{

            return 'phone or password in correct';
            return back();
        }
    }
}
