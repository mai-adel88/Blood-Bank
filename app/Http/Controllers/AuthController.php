<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use App\Client;
use App\Token;
class AuthController extends Controller
{
    public function register(Request $request)
    {
    	//Validation in Api ,should use Validator not as a web
    	$validator = validator()->make($request->all(), [
		    	'name'				=>	'required',
		    	'email'				=>	'required|unique:clients',
		    	'd_o_b'				=>	'required',
		    	'blood_type_id'		=>	'required',
		    	'last_donation_date'=>	'required',
		    	'city_id'			=>	'required',
		    	'password'			=>	'required',
		    	'phone'				=>	'required',
    	]);
    	if($validator->fails())
    	{
    		return apiResponse(0, $validator->errors());
    	}

    	$request->merge(['password'=>bcrypt($request->password)]);
    	$clients= Client::create($request->all());
    	$clients->api_token = str_random(60);
    	$clients->save();

    	return apiResponse(1, 'success', [
    		'api_token'	=>$clients->api_token,
    		'clients'	=>$clients
    	]);
    }


    public function login(Request $request)
    {
		//Validation in Api ,should use Validator not as a web
    	$validator = validator()->make($request->all(), [
    			'phone'				=>	'required',
		    	'password'			=>	'required',
		    	
    	]);
    	if($validator->fails())
    	{
    		return apiResponse(0, $validator->errors());
    	}

    	$client = Client::where('phone', $request->phone)->first();
        if($client){

            if(\Hash::make($request->password,[$client->password])){
                return apiResponse(1, 'done', [
                    'client'=>$client,
                    'api_token'=>$client->api_token
                ]);    
            }else{
                return apiResponse(0,'error in data');
            }
    
        }else{
            return apiResponse(0,'error in data');
        }
    }

    //trying to associate user with the device -create token/ remove- to send notifications
    public function registerToken(Request $request)  
    {
        $validator = validator()->make($request->all(), [
                'token'  =>  'required',
                'type'   =>  'required|in:android,ios',
        ]);
        if($validator->fails())
        {
            return apiResponse(0, $validator->errors());
        }

        Token::where('token', $request->token)->delete();//if two person open the app from the same device -> not to have the same token
        $request->user()->tokens()->create($request->all()); //create new token for this device
        return apiResponse(1, 'تم التسجيل بنجاح ');

    }

    public function removeToken(Request $request) //if the moblie made sign out from the app, remove its token
    {
         $validator = validator()->make($request->all(), [
                'token'  =>  'required',
                
        ]);
        if($validator->fails())
        {
            return apiResponse(0, $validator->errors());
        }

        Token::where('token', $request->token)->delete();

        return apiResponse(1, 'تم الحذف بنجاح');
    }

    // reset password with phone and send pin_code with sms or email
    public function resetPassword(Request $request)
    {
        $validation = validator()->make($request->all() ,[
            
            'phone'     =>'required',
            
        ]);

        if($validation->fails())
        {
            return apiResponse(0, $validation->errors());
        }


        $user = Client::where('phone', $request->phone)->first();
        if($user){
            $code = rand(1111, 9999);
            $update = $user->update(['pin_code'=>$code]);
            if($update){

                //send sms
                smsMisr($request->phone, "your reset code is" . $code);

                //send email first we should do->php artisan make:mail ResetPassword --markdown=emails.auth.resetPassword

                \Mail::to($user->email)
                        ->bcc("maiadel799@gmail.com") //my email to be sure to send the message 
                        ->send(new ResetPassword($user));


                return apiResponse(1, 'برجاء فحص هاتفك', ['pin_code_for_test'=>$code]);
            } else{
                return apiResponse(0, 'حدث خطأ  حاول مر ه اخرى');
            }
        }else{
            return apiResponse(0, 'لا يوجد حساب  مرتبط بهذا الهاتف');
        }
    }

    //new password
    public function newPassword(Request $request)
    {
        $validation = validator()->make($request->all() ,[
            'pin_code'  =>'required',
            'phone'     =>'required',
            'password'  =>'required'
        ]);

        if($validation->fails())
        {
            return apiResponse(0, $validation->errors());
        }


        $user = Client::where('pin_code', $request->pin_code)->where('pin_code', '!=', 0)
                      ->where('phone', $request->phone)->first();  

        if($user){
            $user->password = bcrypt($request->password);



            if ($user->save()) {
                return apiResponse(1, "تم تغيير كلمة المرور بنجاح");
            }else{
                return apiResponse(0, "حدث خطأ , حاول مره اخرى");
            }

        }else{
            return apiResponse(0, "هذا الكود غير صالح");
        }
    }


        
         
}
