<?php

namespace App\Http\Controllers\Platform\Frontend;

use Image;
use App\User;
use Illuminate\Http\Request;
use App\Models\Platform\Region;
use Illuminate\Validation\Rule;
use App\Models\Platform\Partparam;
use App\Models\Platform\Brandparam;
use App\Http\Controllers\Controller;
use App\Models\Platform\Domainparam;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Models\Platform\Locationparam;
use App\Models\Generalsetting;
use App\Mail\Platform\Verificare;
use Mail;
use DB;
class MyAccountController extends Controller
{
        public function show()
        {
            $user = auth()->user();
          
			
			  return view('platform/frontend/users/my_account',compact('user'));
        }
		public function verify($email,$verification_token)
		{
			$user = auth()->user();
		
			$update = User::where('email',$email)->where('verification_token',$verification_token)->update(['verification_status'=>1,'verification_token'=>NULL]);
			
			return redirect()->route('my-account')->with('success','E-mail Dumneavoastra a fost verificat');
		}

        public function profile()
        {
            $user = auth()->user();

            $regions = Region::all();
			$gs = Generalsetting::findOrFail(1);
			if(!$user->verification_status){
			$message=$gs->verify;
			$url='https://wawto.ro/verify/'.$user->email.'/'.$user->verification_token;
			$del='https://wawto.ro/del/'.$user->email.'/'.$user->verification_token;
			$email=Mail::to($user->email)->send(new Verificare($message, $url, $del));			
			}

            if($user->account_type === 2 && $user->user_type===2)
            {
                return view('platform/frontend/users/personalcontent/client_profile',compact('user','regions'));
            }

            if($user->user_type===1 && $user->account_type===2)
            {
                return view('platform/frontend/users/personalcontent/company_profile',compact('user','regions'));
            }
            if($user->user_type===1 && $user->account_type===1)
            {
                return view('platform/frontend/users/personalcontent/supplier_profile',compact('user','regions'));
            }



            
        }

        public function editPersonal(Request $request,$id)
        {
            
            $user = User::findOrFail($id);

            if($request->request_city)
            {
                $user_city = $request->request_city;
            }
			 else
            {
                $user_city = $user->user_city;
            }
			
			 if($request->user_type)
            {
                $account_type = $request->account_type;
				$user_type = $request->user_type;
				if($user_type==1)
				{
					$wawto_status = 0;
				}else 
				{
					$wawto_status=$user->wawto_status;
				}
            }
			else
			{
				$account_type=$user->account_type;
				$user_type = $user->user_type;
				$wawto_status = $user->wawto_status;
			}
           
			
            if($request->user_region)
            {
                $user_region = $request->user_region;
            }
            else
            {
                $user_region = $user->user_region;
            }
			
            $rules = $this->validate($request,[

                'name'=>'required',

                'email'=>
                [
                   'required',

                    Rule::unique('users')->ignore($id),
                ],

                'user_phone'=>[
                    'required',
                    Rule::unique('users')->ignore($id),
                ],
                'profile_image'=> 'mimes:jpg,jpeg,png,svg,gif,bmp',

                'user_address'=>'required',
            ]);

            if($request->hasfile('profile_image'))
            {
                $dirpath='platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images';

                $image = Input::file('profile_image')->getClientOriginalName();
                
                $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$image;

                $old_path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$user->profile_image;

                File::makeDirectory($dirpath, $mode = 0777, true, true);

                if(File::exists($old_path))
                {
                    File::delete($old_path);
                }
              

                $img = Image::make(Input::file('profile_image'))->resize(800,800)->save($path);

            }else{
                $image = $user->profile_image;
            }

            $update = User::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'user_phone'=>$request->user_phone,
                'user_address'=>$request->user_address,
                'rural_name'=>$request->rural_name,
                'user_region'=>$user_region,
                'user_city'=>$user_city,
                'profile_image'=>$image,
				'user_type'=>$user_type,
				'account_type'=>$account_type,
				'wawto_status'=>$wawto_status,
            ]);

            return back()->with('success','Contul Dumneavoastra a fost editat cu success!!!');

        }

        public function editCompany(Request $request,$id)
        {
            
            $user = User::findOrFail($id);

            if($request->request_city)
            {
                $user_city = $request->request_city;
            }
            else
            {
                $user_city = $user->user_city;
            }
			 if($request->account_type)
            {
                $account_type = $request->account_type;
            }
            else
            {
                $account_type = $user->account_type;
            }
            if($request->user_region)
            {
                $user_region = $request->user_region;
            }
            else
            {
                $user_region = $user->user_region;
            }

            $rules = $this->validate($request,[

                'name'=>'required',

                'email'=>
                [
                   'required',

                    Rule::unique('users')->ignore($id),
                ],

                'user_phone'=>[
                    'required',
                    Rule::unique('users')->ignore($id),
                ],
                'cui'=>[
                    'required',
                    Rule::unique('users')->ignore($id),
                ],
                'registration_number'=>[
                    'required',
                    Rule::unique('users')->ignore($id),
                ],
                'iban'=>[
                    'required',
                    Rule::unique('users')->ignore($id),
                ],

                'bank'=>'required',

                'administrator_name'=>'required',

                'profile_image'=> 'mimes:jpg,jpeg,png,svg,gif,bmp',

                'profile_image1'=> 'mimes:jpg,jpeg,png,svg,gif,bmp',

                'profile_image2'=> 'mimes:jpg,jpeg,png,svg,gif,bmp',

                'profile_image3'=> 'mimes:jpg,jpeg,png,svg,gif,bmp',

                'user_address'=>'required',
            ]);

            if($request->hasfile('profile_image'))
            {
                $dirpath='platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images';

                $image = Input::file('profile_image')->getClientOriginalName();
                
                $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$image;

                $old_path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$user->profile_image;

                File::makeDirectory($dirpath, $mode = 0777, true, true);

                if(File::exists($old_path))
                {
                    File::delete($old_path);
                }
              

                $img = Image::make(Input::file('profile_image'))->resize(800,800)->save($path);

            }else{
                $image = $user->profile_image;
            }

            if($request->hasfile('profile_image1'))
            {
                $dirpath='platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images';

                $image1 = Input::file('profile_image1')->getClientOriginalName();
                
                $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$image1;

                $old_path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$user->profile_image1;

                File::makeDirectory($dirpath, $mode = 0777, true, true);

                if(File::exists($old_path))
                {
                    File::delete($old_path);
                }
              

                $img = Image::make(Input::file('profile_image1'))->resize(800,800)->save($path);

            }else{
                $image1 = $user->profile_image1;
            }

            if($request->hasfile('profile_image2'))
            {
                $dirpath='platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images';

                $image2 = Input::file('profile_image2')->getClientOriginalName();
                
                $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$image2;

                $old_path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$user->profile_image2;

                File::makeDirectory($dirpath, $mode = 0777, true, true);

                if(File::exists($old_path))
                {
                    File::delete($old_path);
                }
              

                $img = Image::make(Input::file('profile_image2'))->resize(800,800)->save($path);

            }else{
                $image2 = $user->profile_image2;
            }

            if($request->hasfile('profile_image3'))
            {
                $dirpath='platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images';

                $image3 = Input::file('profile_image3')->getClientOriginalName();
                
                $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$image3;

                $old_path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images'.'/'.$user->profile_image3;

                File::makeDirectory($dirpath, $mode = 0777, true, true);

                if(File::exists($old_path))
                {
                    File::delete($old_path);
                }
              

                $img = Image::make(Input::file('profile_image3'))->resize(800,800)->save($path);

            }else{
                $image3 = $user->profile_image3;
            }

            $update = User::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'user_phone'=>$request->user_phone,
                'user_address'=>$request->user_address,
                'rural_name'=>$request->rural_name,
                'user_region'=>$user_region,
                'user_city'=>$user_city,
                'cui'=>$request->cui,
                'registration_number'=>$request->registration_number,
                'iban'=>$request->iban,
                'bank'=>$request->bank,
                'administrator_name'=>$request->administrator_name,
                'profile_image'=>$image,
                'profile_image1'=>$image1,
                'profile_image2'=>$image2,
                'profile_image3'=>$image3,
				'account_type'=>$account_type,
            ]);

            return back()->with('success','Contul Dumneavoastra a fost editat cu success!!!');

        }

        public function domainParam(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $domain_param = new Domainparam;

            $domain_param->domain = $request->domain;

            $domain_param->user_id = $id;

            $domain_param->save();

            return back()->with('success','Domeniu de activitate a fost salvat');
        }

        public function deleteDomainparam($param_id)
        {
            $domainparam = Domainparam::where('param_id',$param_id)->delete();
            return back()->with('success','Parametrul a fost sters cu success!!!');
        }

        public function locationParam(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $location_param = new Locationparam;

            $location_param->location = $request->location;

            $location_param->user_id = $id;

            $location_param->save();

            return back()->with('success','Punct de lucru a fost salvat');
        }

        public function deleteLocationparam($param_id)
        {
            $locationparam = Locationparam::where('param_id',$param_id)->delete();
            return back()->with('success','Parametrul a fost sters cu success!!!');
        }

        public function partParam(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $part_param = new Partparam;
            
            if($request->param=='99999999999')
            {
                $part_param = DB::table('partparams')->insert([
                        'user_id'=>$id,
                        'param'=>99999999999,
                    ]);
                     $part_param = DB::table('partparams')->insert([
                        'user_id'=>$id,
                        'param'=>2,
                    ]);
                     $part_param = DB::table('partparams')->insert([
                        'user_id'=>$id,
                        'param'=>1,
                    ]);
            }else 
            {
                        $part_param->param = $request->param;

                        $part_param->user_id = $id;

                         $part_param->save();
            }

    

            return back()->with('success','Punct de lucru a fost salvat');
        }

        public function deletePartparam($param_id)
        {
            $locationparam = Partparam::where('param_id',$param_id)->delete();
            return back()->with('success','Parametrul a fost sters cu success!!!');
        }

        public function brandParam(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $brand_param = new Brandparam;

            $brand_param->brand_id = $request->brand;

            $brand_param->user_id = $id;

            $duble_check = Brandparam::where('user_id',$id)->where('brand_id',$request->brand)->first();
            if($duble_check)
            {
                return back()->with('error','Parametrul egzista deja');
            }
            else{
                $brand_param->save();

                return back()->with('success','Parametrul  a fost salvat');
            }
            
        }

        public function deleteBrandparam($param_id)
        {
            $brand = Brandparam::where('param_id',$param_id)->delete();
            return back()->with('success','Parametrul a fost sters cu success!!!');
        }

        public function myCommands()
        {
            $user = auth()->user();

            $commands = $user->getcommand;

            return view('platform/frontend/users/personalcontent/received_commands',compact('user','commands'));
        }

        public function passwordReset(Request $request)
        {
            $user = auth()->user();

            $password = $request->old_password;

            $new_password = Hash::make($request->password);

            if(Hash::check($password,$user->password))
            {
                $update = User::where('id',$user->id)->update(['password'=>$new_password]);

                return back()->with('success','Parola a fost resetata. La urmatoare logare trebuie sa folositi parola noua. Multumim');
            }else
            {
                return back()->with('error','Ceva nu a fost in regula. Parola nu a fost actualizata!!!');
            }
        }
		
		public function myEmployees()
		{
			$user = auth()->user();
			
			$employees = User::where('user_type',3)->where('parent',$user->id)->get();
			
			  return view('platform/frontend/users/my_employees',compact('user','employees'));
		}
}
