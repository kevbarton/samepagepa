<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
class AuthController extends Controller
{
    function checkPhone(Request $request){
        $phone=$request->phone;
        $user=User::where('phone',$phone)->first();
        if($user){
            return response()->json(['error'=>1,'msg'=>'Phone number already in use','data'=>[]]);
        }else{
            $sid = env("TWILIO_ACCOUNT_SID");
            $token = env("TWILIO_AUTH_TOKEN");
            $twilio = new Client($sid, $token);
           // $phone='+447979747336';
            $verification = $twilio->verify->v2->services(env("TWILIO_VERIFICATION_SID"))
                                               ->verifications
                                               ->create($phone, "sms");
            return response()->json(['error'=>0,'msg'=>'','data'=>['phone'=>$phone,'verification'=>$verification->status]]);
        }
    }
    function checkVerificationCode(Request $request){
        $verificationCode=$request->verificationcode;
        $phone=$request->phone;
       // $phone='+447979747336';
        //return response()->json(['error'=>0,'msg'=>'','data'=>['phone'=>$phone]]);
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);
        $verification_check = $twilio->verify->v2->services(env("TWILIO_VERIFICATION_SID"))
                                         ->verificationChecks
                                         ->create([
                                                      "to" => $phone,
                                                      "code" => $verificationCode
                                                  ]
                                         );
        //return $verification_check->status;
       // $response=json_decode($verification_check->status);

        if($verification_check->status=='approved'){
            return response()->json(['error'=>0,'msg'=>'','data'=>['phone'=>$phone]]);
        }else{
            return response()->json(['error'=>1,'msg'=>'Invalid Verification Code','data'=>['phone'=>$phone]]);
        }
    }
    function checkEmail(Request $request){
        $phone = $request->phone;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>1,'msg'=>'Please enter valid email','data'=>['phone'=>$phone,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email]]);
        }
        $user=User::where('email',$email)->first();
        if($user){
            return response()->json(['error'=>1,'msg'=>'Email already registered','data'=>['phone'=>$phone,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email]]);
        }else{
            return response()->json(['error'=>0,'msg'=>'','data'=>['phone'=>$phone,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email]]);
        }
    }
    function checkPassword(Request $request){
        $phone = $request->phone;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = $request->password;
        $validator = Validator::make($request->all(), [
            'password' => 'min:8',
        ]);
        if ($validator->fails()) {
            $msg=$validator->errors()->first('password');
            return response()->json(['error'=>1,'msg'=>$msg,'data'=>['phone'=>$phone,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'password'=>$password]]);
        }
        $userdata =[
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'password'=>Hash::make($password),
            'phone'=>$phone,
            'active'=>1,
        ];
        $user = User::create($userdata);
        $user->wallets()->createMany([['name'=>'Life Admin','slug'=>'life-admin','colour'=>'#EDC451'],['name'=>'Home','slug'=>'home','colour'=>'#3533C3']]);
        $user->assignRole('User');
        $user->role='User';
        $user->save();
        auth()->login($user);
        return response()->json(['error'=>0,'msg'=>'','data'=>['phone'=>$phone,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'password'=>$password]]);
    }
    function login(Request $request){
        if(auth()->user() || auth()->viaRemember()){
            return redirect(route('app.user.home'));
        }
        return view('app.login',['header_footer'=>0]);
    }
    function loginCheckEmail(Request $request){

        $email = $request->email;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>1,'msg'=>'Please enter valid email','data'=>['email'=>$email]]);
        }
        $user=User::where('email',$email)->first();
        if($user){
            return response()->json(['error'=>0,'msg'=>'','data'=>['email'=>$email]]);
        }else{

            return response()->json(['error'=>1,'msg'=>'Email not registered','data'=>['email'=>$email]]);
        }
    }
    function loginCheckPassword(Request $request){

        $email = $request->email;
        $password = $request->password;

        $logindata=[
            'email'=>$email,
            'password'=>$password,
        ];
        if (auth()->attempt($logindata)) {
            $request->session()->regenerate();
            return response()->json(['error'=>0,'msg'=>'','data'=>['email'=>$email]]);
        }else{
            return response()->json(['error'=>1,'msg'=>'Invalid Password','data'=>['email'=>$email]]);
        }
    }
    function frontLogin(Request $request){
        if(auth()->user() || auth()->viaRemember()){
            return redirect(route('app.user.home'));
        }
        $email = $request->email;
        $password = $request->password;

        $logindata=[
            'email'=>$email,
            'password'=>$password,
        ];
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($logindata,true)) {
            $request->session()->regenerate();
            return redirect(route('app.user.home'));
        }else{
            return redirect()->back()->withErrors(['email'=>'Invalid login credentials']);
        }
    }
    function forgotpassword(){
        return view('app.forgotpassword',['header_footer'=>0]);
    }
    

    function forgotpasswordpost(Request $request){
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
 
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
    
    function forgotpasswordemail(string $token) {
        return view('app.resetpassword', ['token' => $token,'header_footer'=>0]);
    }

    
    function forgotpasswordupdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('applogin')->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }
    function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('applogin'));
    }
}
