<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Generalsetting;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        

        if($data['user_type']=='1'){
        
            return Validator::make($data,
             [
                'name'=>'required|string',
                'email' => 'required|string|email|max:255|unique:users',
                'user_phone' => 'required|string|max:255|unique:users',
                'cui'=>'required|string|max:255|unique:users',
                'registration_number'=>'required|string|max:255|unique:users',
                'iban'=>'required|string|max:255|unique:users',
                'user_address'=>'required|string',
                'profile_image'=>'mimes:jpg,jpeg,png,svg,gif,bmp',
                'profile_image1'=>'required|mimes:jpg,jpeg,png,svg,gif,bmp',
                'profile_image2'=>'required|mimes:jpg,jpeg,png,svg,gif,bmp',
                'profile_image3'=>'mimes:jpg,jpeg,png,svg,gif,bmp',
                'terms'=>'required',
                
            ]
            );
        }
        else 
        {
            return Validator::make($data,
            [
               'name'=>'required|string',
               'email' => 'required|string|email|max:255|unique:users',
               'user_phone' => 'required|string|max:255|unique:users',              
               'profile_image'=>'mimes:jpg,jpeg,png,svg,gif,bmp',
                'user_address'=>'required|string',
               'terms'=>'required',
               
           ]
           );
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
		$gs = Generalsetting::findOrFail(1);
		
		if($gs->is_verirfied)
		{
			$verification_status=0;
			$verification_token = Str::random(40);
		}
		else 
		{
			$verification_status =1;
			$verification_token = '';
		}
        $personal_code = mt_rand();
        $dirpath = 'platform/frontend/assets/images/customer_images/'.$personal_code.'/profile_images';
        $key_words = $data['email'].' '.$data['name'].' '.$data['user_phone'].' '.$data['cui'].' '.$data['registration_number'];
      
        if($data['user_type']=='1'){
        $newTime = date("Y-m-d H:i:s", strtotime("+6 months"));
        if(!empty($data['profile_image'])) 
         {
         
            $image=Input::file('profile_image')->getClientOriginalName();

            $path = $dirpath.'/'.$image;

            File::makeDirectory($dirpath,$mode = 0777,true,true);

            $img = Image::make(Input::file('profile_image'))->resize(400,400,function($constraint){
                $constraint->aspectRatio();
            })->save($path);
        }else
        {
            $image = '';
        }

        if($data['profile_image1'])
        {
           
            $image1=Input::file('profile_image1')->getClientOriginalName();

            $path = $dirpath.'/'. $image1;
            File::makeDirectory($dirpath, $mode = 0777, true, true);
             $img=Image::make(Input::file('profile_image1'))->resize(400, 400)->save($path);
       
         
            }
            else
            {
                $image='';
            }

        
        

        if($data['profile_image2'])
        {
            
            $image2=Input::file('profile_image2')->getClientOriginalName();
    
            $path = $dirpath.'/'. $image2;
            File::makeDirectory($dirpath, $mode = 0777, true, true);
            $img=Image::make(Input::file('profile_image2'))->resize(800, 800)->save($path);
           
             
                
        }
        else 
        {
            $image2 = '';
        }

        if($data['profile_image3'])
        {
           
            $image3=Input::file('profile_image3')->getClientOriginalName();
    
            $path = $dirpath.'/'. $image3;
            File::makeDirectory($dirpath, $mode = 0777, true, true);
            $img=Image::make(Input::file('profile_image3'))->resize(800, 800)->save($path);
           
             
                
        }else 
        {
            $image3='';
        }
        if(!empty($data['employees'])){
            $many_employees=$data['employees'];
        }else{
            $many_employees=0;
        }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_phone'=>$data['user_phone'],
            'account_type'=>$data['account_type'],
            'user_type'=>$data['user_type'],
            'user_region'=>$data['user_region'],
            'user_city'=>$data['user_city'],
            'rural_name'=>$data['rural_name'],
            'user_address'=>$data['user_address'],
            'cui'=>$data['cui'],
            'registration_number'=>$data['registration_number'],
            'iban'=>$data['iban'],
            'bank'=>$data['bank'],
            'profile_image'=>$image,
            'profile_image1'=>$image1,
            'profile_image2'=>$image2,
            'profile_image3'=>$image3,
            'personal_code'=>$personal_code,
            'many_employees'=>$many_employees,
            'administrator_name'=>$data['administrator_name'],
            'key_words'=>$key_words,
            'valability'=>$newTime,
			'verification_status'=>$verification_status,
			'wawto_status'=>0,
			'verification_token'=>$verification_token,
            ]);

        }
        else 
        {
            if(!empty($data['profile_image'])) 
         {
         
            $image=Input::file('profile_image')->getClientOriginalName();

            $path = $dirpath.'/'.$image;

            File::makeDirectory($dirpath,$mode = 0777,true,true);

            $img = Image::make(Input::file('profile_image'))->resize(400,400,function($constraint){
                $constraint->aspectRatio();
            })->save($path);
            }
            else
             {
            $image = '';
             }
             $newTime = date("Y-m-d H:i:s", strtotime("+1 year"));
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_phone'=>$data['user_phone'],         
                'user_type'=>$data['user_type'],
                'user_region'=>$data['user_region'],
                'user_city'=>$data['user_city'],
                'rural_name'=>$data['rural_name'],
                'user_address'=>$data['user_address'],               
                'profile_image'=>$image,               
                'personal_code'=>$personal_code,
                'account_type'=>2,
                'personal_code'=>$personal_code,
                'valability'=>$newTime,
				'verification_status'=>$verification_status,
				'wawto_status'=>1,
				'verification_token'=>$verification_token,
                ]);
    
        }
    }
}
