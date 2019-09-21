<?php

namespace App\Http\Controllers;

use App\FrontUser;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Illuminate\Support\Str;
use Mail;
use Socialite;

class FrontUserRegisterController extends Controller
{
    protected function userInfoValidate($request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:front_users',
            'phone_number' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function saveUserInfo(Request $request){
        $this->userInfoValidate($request);

        $frontUser = new FrontUser();
        $frontUser->name = $request->name;
        $frontUser->email = $request->email;
        $frontUser->phone_number = $request->phone_number;
        $frontUser->password = bcrypt($request->password);
        $frontUser->verify_token = Str::random(60);
        $frontUser->save();

        $data = $frontUser->toArray();
//        return $data;
        Mail::send('frontend.mail.verify-email',$data,function ($message)use($data){
            $message->to($data['email']);
            $message->subject('Please verify your email...');
        });

        return redirect('/')->with('message','আপনার অ্যাকাউন্ট সফলভাবে তৈরি করা হয়েছে, তবে আপনাকে প্রথমে আপনার ইমেল যাচাই করতে হবে। আপনার ইনবক্স  এ একটি ইমেইল গিয়েছে সেই লিংক কে ক্লিক করুন।পুনরায় আপনি আপনার বিজ্ঞাপন পোস্ট করার পারমিট পেয়ে যাবেন ।');
    }
    public function verifyEmailAddress($email,$verifyToken){
        $frontUser = FrontUser::where(['email'=>$email,'verify_token'=>$verifyToken])->first();
        if($frontUser){
            FrontUser::where(['email'=>$email,'verify_token'=>$verifyToken])->update(['status'=>1,'verify_token'=>null]);

            Session::put('frontUserId',$frontUser->id);
            Session::put('frontUserName',$frontUser->name);

            $user_mobile = $frontUser->phone_number;

            Session::flash('mobile',$user_mobile);
            return view('frontend.post-ad.post-ad-content');
        }else{
            return redirect('/')->with('message','User not found');
        }
    }
    public function frontUserLogout(){
        Session::forget('frontUserId');
        Session::forget('frontUserName');

        return redirect('/')->with('message','You have Logged out.');
    }
    public function frontUserLogin(Request $request){
        $frontUser = FrontUser::where(['email'=>$request->email,'status'=>1])->first();
        if($frontUser){
            if(password_verify($request->password,$frontUser->password)){
                Session::put('frontUserId',$frontUser->id);
                Session::put('frontUserName',$frontUser->name);

                return redirect('/front-user-dashboard');
            }else{
                return redirect('/')->with('message','Password is invalid');
            }
        }else{
            return redirect('/')->with('message','Email address is invalid');
        }
    }
    public function signupOptions(){
        if(Session::get('frontUserId')){
            return redirect('/front-user-dashboard');
        }else{
            return view('frontend.signup.signup-options-content',[
                'message'=>'আপনি কি বিজ্ঞাপন পোস্ট করবেন এবং কিছু কিনতে চান লগইন করুন ।'
            ]);
        }
    }
    public function signUp(){
        if(Session::get('frontUserId')){
            return redirect('/front-user-dashboard');
        }else{
            return view('frontend.signup.signup-content');
        }
    }
    public function showLoginForm(){
        if(Session::get('frontUserId')){
            return redirect('/front-user-dashboard');
        }else{
            return view('frontend.login.login-form',[
                'message'=>'আপনি কি বিজ্ঞাপন পোস্ট করবেন এবং কিছু কিনতে চান লগইন করুন ।'
            ]);
        }
    }

    //Facebook Login
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try
        {
            $socialUser = Socialite::driver('facebook')->user();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }
        $frontUser = FrontUser::where('facebook_id',$socialUser->getId())->first();
        if($frontUser){
            Session::put('frontUserId',$frontUser->id);
            Session::put('frontUserName',$frontUser->name);

            return redirect('/front-user-dashboard');
        }else{
            $frontUser = new FrontUser();
            $frontUser->facebook_id = $socialUser->getId();
            $frontUser->name = $socialUser->getName();
            $frontUser->email = $socialUser->getEmail();
            $frontUser->status = 1;
            $frontUser->save();

            Session::put('frontUserId',$frontUser->id);
            Session::put('frontUserName',$frontUser->name);

            return redirect('/front-user-dashboard');
        }
    }





}
