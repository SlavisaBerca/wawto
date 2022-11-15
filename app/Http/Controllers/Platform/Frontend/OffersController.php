<?php

namespace App\Http\Controllers\Platform\Frontend;

use Image;
use App\User;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Models\Platform\Offer;
use App\Models\Platform\Blocked;
use App\Models\Platform\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Platform\Notification;
use App\Models\Platform\Requestmodel;
use Illuminate\Support\Facades\Input;

class OffersController extends Controller
{
		public function myOffers()
		{
			$user = auth()->user();
			 return view('platform/frontend/users/personalcontent/received_offers',compact('user'));
		}
        public function sendStaticOffer(Request $request, $request_id)
        {
            $gs = Generalsetting::findOrFail(1);
            
            $offer = new Offer;

            $offer->number = mt_rand();

            $user = auth()->user();

            $rules = $this->validate($request,
            [
                'image'=>'mimes:jpg,jpeg,png,svg,gif',
                'image1'=>'mimes:jpg,jpeg,png,svg,gif',
                'value'=>'required',
                'part_code'=>'required',
                'weight'=>'required',
                'tva'=>'required',
            ]
            );
            
          
            $get_request = Requestmodel::where('request_id',$request_id)->first();

	

            $client = User::where('id',$get_request->added_by)->first();
		
            $blocked = Blocked::where('blocked',$user->id)->where('blocker',$client->id)->first();

            if(!$blocked)
            {

            $count = $get_request->offer->count();

            if($count < $gs->request_capacity)
            {
                if($request->hasfile('image'))
                {
                    $dirpath = 'platform/frontend/assets/images/customer_images/'.$client->personal_code.'/requests'.'/'.$get_request->request_number.'/offers'.'/'.$offer->number;

                    $image = Input::file('image')->getClientOriginalName();
                    
                    $path = 'platform/frontend/assets/images/customer_images/'.$client->personal_code.'/requests'.'/'.$get_request->request_number.'/offers'.'/'.$offer->number.'/'.$image;

                    File::makeDirectory($dirpath,$mode=0777,true,true);

                    
                    $img=Image::make(Input::file('image'))->resize(800,800)->save($path);
                }
                else 
                {
                    $image='';
                }

                if($request->hasfile('image1'))
                {
                    $dirpath = 'platform/frontend/assets/images/customer_images/'.$client->personal_code.'/requests'.'/'.$get_request->request_number.'/offers'.'/'.$offer->number;

                    $image1 = Input::file('image1')->getClientOriginalName();
                    
                    $path = 'platform/frontend/assets/images/customer_images/'.$client->personal_code.'/requests'.'/'.$get_request->request_number.'/offers'.'/'.$offer->number.'/'.$image1;

                    File::makeDirectory($dirpath,$mode=0777,true,true);

                    
                    $img1=Image::make(Input::file('image1'))->resize(800,800)->save($path);
                }
                else 
                {
                    $image1='';
                }

                
                $offer->part_id = $request->part_id;
             

                $offer->request = $request_id;

                $offer->weight = $request->weight;

                $offer->tva = $request->tva;

                $offer->client_id = $get_request->added_by;

                $offer->supplier_id = $user->id;

                $offer->status = 0;

                $offer->quantity = $request->quantity;

                $offer->value = $request->value;

                $offer->manufacturer = $request->manufacturer;

                $offer->part_code = $request->part_code;

                $notification = new Notification;

                $notification->user_id = $get_request->added_by;

                $notification->notifier_id = $user->id;

                $notification->notifier_name = $user->name;
                
                $notification->notification = $gs->offer_message.' '.$get_request->request_number;

                $notification->url = '/offer-details'.'/'.$offer->number;

                $notification->save();

                $offer->currency = 'RON';

                $offer->image  = $image;

                $offer->image1 = $image1;

                $offer->save();

                return back()->with('success','Oferta a fost trimisa cu success sub numarul '.$offer->number.' o puteti vizualiza in contul Dumneavoastra sub Oferte Trimise. Multumim!!!');
                }
                else 
                {
                    return back()->with('forbiden','Opps se pare ca incercati sa modificati codul!!! Acest lucru nu este permis. Multumim!!!');
                }
            }
            else 
            {
                return back()->with('error','Limita de oferte a fost atinsa daca vedeti mesajul acesta seamna ca ati facut modificari pe cod. Acest lucru nu este permis!!!');
            }
        }

        public function offerDetails($number)
        {
            $offer = Offer::where('number',$number)->first();

            $request = Requestmodel::where('request_id',$offer->request)->first();

            $command_check = Command::where('part_id',$offer->part_id)->where('confirm_limit','>',date('Y-m-d H:i:s'))->where('status',0)->first();
            
            $notification = Notification::where('url','/offer-details'.'/'.$offer->number)->delete();

            return view('platform/frontend/details/offer_details',compact('request','offer','command_check'));
        }

        public function reject($id)
        {
            $user = auth()->user();

            $offer = Offer::findOrFail($id);

            $get_request = Requestmodel::where('request_id',$offer->request)->first();

            $client = User::where('id',$offer->client_id)->first();

            if($user->id === $offer->client_id || $user->id === $offer->supplier_id)
            {
                $path ='platform/frontend/assets/images/customer_images/'.$client->personal_code.'/requests/'.$get_request->request_number.'/offers'.'/'.$offer->number;

                if(File::exists($path))
                {
                    File::deleteDirectory($path);
                }

                $notification = new Notification;

                $notification->notification = 'Oferta Dumneavoastra numarul '.$offer->number.' a fost respinsa de catre client. Mult Succes!!!';
                
                $notification->user_id = $offer->supplier_id;

                $notification->url ='/';

                $notification->save();

                $delete = Offer::findOrFail($id)->delete();



                return redirect()->route('home');
            }
            else 
            {
                return back()->with('error','Ooops!! Se pare ca incercati sa respingeti oferta cuiva. Acest lucru nu este permis...Multumim!!!');
            }
        }

        public function rejectBlocker($id)
        {
            $user = auth()->user();

            $offer = Offer::findOrFail($id);

            $get_request = Requestmodel::where('request_id',$offer->request)->first();

            $client = User::where('id',$offer->client_id)->first();

            if($user->id === $offer->client_id || $user->id === $offer->supplier_id)
            {
                $blocker = new Blocked;

                $blocker->blocker = $offer->client_id;

                $blocker->blocked = $offer->supplier_id;

                $blocker->save();

                $path ='platform/frontend/assets/images/customer_images/'.$client->personal_code.'/requests/'.$get_request->request_number.'/offers'.'/'.$offer->number;

                if(File::exists($path))
                {
                    File::deleteDirectory($path);
                }

                $notification = new Notification;

                $notification->notification = 'Oferta Dumneavoastra numarul '.$offer->number.' a fost respinsa de catre client. Din pacate Clientul a decis sa nu mai primeste oferte de la Dumneavoastra... Mult Succes!!!';
                
                $notification->user_id = $offer->supplier_id;

                $notification->url ='/';

                $notification->save();

                $delete = Offer::findOrFail($id)->delete();



                return redirect()->route('home');
            }
            else 
            {
                return back()->with('error','Ooops!! Se pare ca incercati sa respingeti oferta cuiva. Acest lucru nu este permis...Multumim!!!');
            }
        }

        public function sendDinamyc(Request $request, $request_id)
        {
            $rules = $this->validate($request,
            [
                'image'=>'mimes:jpg,jpeg,png,svg,gif',               
                'value'=>'required',               
                'tva'=>'required',
            ]
            );

            $offer = new Offer;
            
            $user = auth()->user();

            $get_request = Requestmodel::where('request_id',$request_id)->first();
           
            $client = User::where('id',$get_request->added_by)->first();

            $command_check=Command::where('part_id',$get_request->part_id)->where('status',0)->where('confirm_limit','>',date('Y-m-d H:i:s'))->first();

            if(!$command_check)
            {

                 $blocked = Blocked::where('blocked',$user->id)->where('blocker',$get_request->added_by)->first();

                    if(!$blocked) 
                    {

                    $offer->number = mt_rand();

                    $offer->value = $request->value;

                    $offer->weight = $request->weight;

                    $offer->tva = $request->tva;

                    $offer->status = 0;

                    $offer->request = $request_id;

                    $offer->part_id = $request->part_id;

                    $input = $request->input;

                    $label = $request->label;

                    for($i = 0; $i < count($label); $i++)
                    {
                        $data = [
                        'data_label'=>$label[$i],
                        'data_content'=>$input[$i],
                        'offer'=>$offer->number,
                        ];
						$insert[]=$data;
                    }
 
                   

                    $insert_data = DB::table('offerdatas')->insert($insert);

                    if($request->hasfile('image')){
                        foreach($request->file('image') as $file){
                           
                            $image=$file->getClientOriginalName();

                             $dirpath = 'platform/frontend/assets/images/customer_images/'.$client->personal_code .'/'.'requests'.'/'.$get_request->request_number.'/offers/'.$offer->number;
                            
                             File::makeDirectory($dirpath, $mode = 0777, true, true);

                            $path=$file->move('platform/frontend/assets/images/customer_images/'.$client->personal_code .'/'.'requests'.'/'.$get_request->request_number.'/offers/'.$offer->number.'/',$image);
                            
                            $name[]=$image;
                        }
                        for($i=0;$i<count($request->file('image'));$i++){
                      
                            $data=array(

                            'request'=>$post->request_number,
                            
                            'image'=>$name[$i],
                           
                        
                            );

                            $image_insert[]=$data;
                        }
                      
                        $insert_reqimg=DB::table('offerimages')->insert($image_insert);
                       
                       
                    }

                    $offer->client_id = $client->id;

                    $offer->supplier_id = $user->id;
                    
                    $notification = new Notification;

                    $notification->notifier_id = $user->id;

                    $notification->notifier_name = $client->name;

                    $notification->user_id = $client->id;
                    
                    $notification->notification='Stimati '.$client->name.', Furnizorul '.$user->name.' a trimis oferta pentru cerere Dumneavoastra numarul: '.$get_request->request_number.'. Multumim';
                   
                    $notification->url = '/offer-details/'.$offer->number;

                    $notification->save();

                    $offer->save();
        
                        return back()->with('success','Oferta a fost trimisa cu success sub numarul '.$offer->number.' o puteti vizualiza in contul Dumneavoastra sub Oferte Trimise. Multumim!!!');
                    }
                    else 
                    {
                        return back()->with('error','Clientul nu doreste oferte din partea Dumneavoastra. Va rugam nu mai modificati codul... Multumim!!!');
                    }
                }
                else
                {
                    return back()->with('error','Actiune nu este permisa. Daca vedeti acest mesaj seamna ca ati modificat codul. Va rugam sa nu mai faceti aceste incercari...Multumim!!!');
                }
            }

            public function sentOffers()
            {
                $user = auth()->user();

                return view('platform/frontend/users/personalcontent/sent_offers',compact('user'));
            }

            public function addminOffersView()
            {
                $offers = Offer::all();

                return view('platform/backend/pages/users/offers',compact('offer'));
            }


}
