<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Session;
use Mail;
use App\Mail\Platform\ReteleSociale;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $rules = $this->validate($request,[
            'username'=>'required|string',
            'password'=>'required|string',
        ]);

        if (Auth::attempt(['email'=>$request->username,'password'=>$request->password])) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
        elseif(Auth::attempt(['user_phone'=>$request->username,'password'=>$request->password]))
        {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
        else
        {
            return back()->with('error','Credentiale Dumneavoastra nu sa potrivesc cu niciun cont dupa wawto..');
        }
    }
	  public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
	public function handleFacebookCallback(Request $request){
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }



$socialUser = \Socialite::driver('facebook')
    ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
->stateless()->user();

        $user = User::where('email', $socialUser->getEmail())->first();
         $password=$this->generateRandomString();
    
        if(!$user){
			$name=$socialUser->getName();
			$email=$socialUser->getEmail();
			$code=mt_rand();
			$key_words=$code.', '.$name.', '.$code;
            $user= User::create ([
                'facebook_id'   => $socialUser->getID(),
                'name'      => $socialUser->getName(),
                'email'         => $socialUser->getEmail(), 
                'password' =>bcrypt($password), 
				'wawto_status'=>1,
				'verification_status'=>1,
				'user_type'=>2,
				'account_type'=>2,
				'personal_code'=>$code,
				'key_words'=>$key_words,
            ]);
           
         $message=' Acest cont a fost creat prin contul de Facebook. Pentru autentificare, va rugam sa utilizati emailul inregistrat pe contul de facebook, parola fiind generata automat prin email. Daca folositi loagarea prin interfata siteului, va rugam sa utilizati aceeasi parola mentionata in email';
         $pass='Parola: '.$password;
		 Mail::to($user->email)->send(new ReteleSociale($message,$pass));
		 $success='Succes!!!';
		 $thanks='Contul Dumneavoastra a fost creat pe platforma Wawto prin Facebook, tip de utilizator Dumneavoastra  a fost alocat ca Persoana Fizica. Daca doriti sa aplicati ca persoana juridica va rugam sa aplicati prin formular pe pagina Contul Meu/Actualizarea Datelor. Va multumim!!!';
		 Session::put('thanks',$thanks);
		 Session::put('success',$success);
         Auth::login($user);
        }else{
            Auth::login($user);
        }
        
            
          
      

        return Redirect::to ('home');
    }
	  public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request){
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }



$socialUser = \Socialite::driver('google')
 ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
->stateless()->user();


        $user = User::where('email', $socialUser->getEmail())->first();
         $password=$this->generateRandomString();
    
        if(!$user){
			$name=$socialUser->getName();
			$email=$socialUser->getEmail();
			$code=mt_rand();
			$key_words=$code.', '.$name.', '.$code;
           $user= User::create ([
                'facebook_id'   => $socialUser->getID(),
                'name'      => $socialUser->getName(),
                'email'         => $socialUser->getEmail(), 
			    'password' =>bcrypt($password),  
				'wawto_status'=>1,
				'verification_status'=>1,
				'user_type'=>2,
				'account_type'=>2,
				'personal_code'=>$code,
				'key_words'=>$key_words,
            ]);
           
         $message=' Acest cont a fost creat prin contul de Google. Pentru autentificare, va rugam sa utilizati emailul inregistrat pe contul de google, parola fiind generata automat prin email. Daca folositi loagarea prin interfata siteului, va rugam sa utilizati aceeasi parola mentionata in email';
         $pass='Parola: '.$password;
		 Mail::to($user->email)->send(new ReteleSociale($message,$pass));
          $success='Succes!!!';
		 $thanks='Contul Dumneavoastra a fost creat pe platforma Wawto prin Gmail, tip de utilizator Dumneavoastra  a fost alocat ca Persoana Fizica. Daca doriti sa aplicati ca persoana juridica va rugam sa aplicati prin formular pe pagina Contul Meu/Actualizarea Datelor. Va multumim!!!';
		 Session::put('thanks',$thanks);
		 Session::put('success',$success);
         Auth::login($user);
        }else{
            Auth::login($user);
        }
        
            
          
      

        return Redirect::to ('home');
    }
    
    public function generateRandomString($length =8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($j = 0; $j < $length; $j++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
    
      return $randomString;
     }
    
}
