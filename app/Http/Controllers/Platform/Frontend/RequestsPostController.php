<?php

namespace App\Http\Controllers\Platform\Frontend;

use Image;
use Illuminate\Http\Request;
use App\Models\Platform\Part;
use App\Models\Platform\Domain;
use App\Models\Platform\Equipment;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Platform\Requestmodel;
use Illuminate\Support\Facades\Input;
use App\Models\Platform\Notification;
use Session;
use Illuminate\Support\Str;

class RequestsPostController extends Controller
{
    public function postQuick(Request $request){
        $rules = $this->validate($request,[
            'part_code'=>'required',
        ]);
        $post= new Requestmodel;
		$post->request_url = Str::random(40);
        $domain=Domain::where('id',$request->request_domain)->first();
        $user=auth()->user();
        $post->request_number=$request->request_number;
        $post->request_domain=$request->request_domain;
        $post->has_part=1;
        if($request->brand){
            $post->brand=$request->brand;
        }else{
             $post->brand=99999999999;
        }
       
        
        if($request->request_location){
         $post->request_location=$request->request_location;
        }else{
            $post->request_location=$user->user_region;
        }
        if($request->request_city){
            $post->request_city=$request->request_city;
 
        }else{
         $post->request_city=$user->user_city;
        }
        if($request->rural_name){
            $post->rural_name=$request->rural_name;
        }else{
            $post->rural_name=$user->rural_name;
        }
        
        $post->status=1;
        if($request->delivery_address){
            $post->delivery_address=$request->delivery_address;
        }else{
            $post->delivery_address=$user->user_address;
        }
        $post->searching_params=$request->searching_params;
        $post->added_by=$user->id;
        $post->personal_code=$user->personal_code;
		
		$pi1=$request->part_input1;
			$pi2=$request->part_input2;
			$pi3=$request->part_input3;
			$pi4 = $request->part_input4;
			
			  for($i=0;$i < count($pi1); $i++){
            $data=[
             'request'=>$request->rqrNumb,
             'measure_unity'=>$pi1[$i],
             'part_title'=>$pi2[$i],
			 'part_code'=>$pi3[$i],
			 'quantity'=>$pi4[$i],
			 'part_type'=>$request->part_type,
			 'status'=>1,
		
            ];
            $insert_parts[]=$data;
			}
			
			$dinamyc_part = DB::table('parts')->insert($insert_parts);
			
        $part= new Part;
        $part->measure_unity=$request->measure_unity;
        $part->part_title=$request->part_title;
        $part->part_code=$request->part_code;
        $part->part_type=$request->part_type;
        $part->quantity=$request->quantity;
        $part->request=$request->rqrNumb;
		
        $part->status=1;
     
          if($request->hasfile('part_image'))
                {
                    $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts';

                    $part_image = Input::file('part_image')->getClientOriginalName();
                    
                    $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts'.'/'.$part_image;

                    File::makeDirectory($dirpath,$mode=0777,true,true);

                    
                    $img=Image::make(Input::file('part_image'))->resize(800,800)->save($path);
                }
                else 
                {
                    $part_image='';
                }
				
				if($request->hasfile('part_image1'))
                {
                     $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts';

                    $part_image1 = Input::file('part_image1')->getClientOriginalName();
                    
                     $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts'.'/'.$part_image1;

                    File::makeDirectory($dirpath,$mode=0777,true,true);

                    
                    $img=Image::make(Input::file('part_image1'))->resize(800,800)->save($path);
                }
                else 
                {
                    $part_image1='';
                }
				
         $part->part_image=$part_image;
         $part->part_image1=$part_image1;
         if(!$request->part_type){
             $part->part_type=99999999999;
             $post->part_type=99999999999;
         }else{
             $part->part_type=$request->part_type;
             $post->part_type=$request->part_type;
         }
		 if($request->searching_params=='1')
		 {
			$notification_url ='/local-requests';
		 }
		 else 
		 {
			 $notification_url ='/national-requests';
		 }
      
        $part->save();
        $post->form_used=1;
        $link='<a href="/request-details/'.$post->request_number.'">Vizualizare</a>"';
        $success='Cerere cu Numarul '.$post->request_number.', a fost trimisa cu cuccess';
        Session::put('success',$success);
        Session::put('link',$link);
		//Notification all params 
		   $notify_all = DB::table('domainparams')
		 ->leftjoin('locationparams','locationparams.user_id','domainparams.user_id')
		 ->leftjoin('partparams','partparams.user_id','domainparams.user_id')
		 ->leftjoin('brandparams','brandparams.user_id','domainparams.user_id')
		 ->where('domainparams.domain',$domain->id)
		 ->where('locationparams.location',$post->request_location)
		->where('brandparams.brand_id',99999999999)
		->where('partparams.param',99999999999)
		
		->get();
		//All params notification end
		//Notification specified params 
		   $notify_spec = DB::table('domainparams')
		 ->leftjoin('locationparams','locationparams.user_id','domainparams.user_id')
		 ->leftjoin('partparams','partparams.user_id','domainparams.user_id')
		 ->leftjoin('brandparams','brandparams.user_id','domainparams.user_id')
		 ->where('domainparams.domain',$domain->id)
		 ->where('locationparams.location',$post->request_location)
		->where('brandparams.brand_id',$post->brand)
		->where('partparams.param',$post->part_type)
		
		->get();
		//Specified params notification end
		
		
		 foreach($notify_all as $notification)
		 {
			 $send_notification = new Notification;
			 $send_notification->notification = 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim';
			 $send_notification->url = $notification_url;
			 $send_notification->user_id = $notification->user_id;
			 $send_notification->notifier_id = $notification->user_id;
			 $send_notification->notifier_name = $user->name;
			 $send_notification->save();
		 }
		  foreach($notify_spec as $notification_spet)
		 {
			 $send_notification = new Notification;
			 $send_notification->notification = 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim';
			 $send_notification->url = $notification_url;
			 $send_notification->user_id = $notification_spet->user_id;
			 $send_notification->notifier_id = $notification->user_id;
			 $send_notification->notifier_name = $user->name;
			 $send_notification->save();
		 }
        $post->save();
         return back()->with(compact('success','link'));


    }
	
	public function postCheck($label,$number)
	{
		$check = DB::table('checks')->where('label',$label)->where('number',$number)->first();
		if(!$check)
		{
			$post = DB::table('checks')->insert(['label'=>$label,'number'=>$number]);
		}
		else 
		{
			$del = DB::table('checks')->where('label',$label)->where('number',$number)->delete();
		}
	}
    public function postMain(Request $request){

        $post= new Requestmodel;
        $domain=Domain::where('id',$request->request_domain)->first();
        $post->request_url = Str::random(40);
       
        $user=auth()->user();
        $post->request_number=$request->rqrNumb;
		
	
        $post->request_domain=$request->request_domain;
        if($request->brand){
            $post->brand=$request->brand;
        }else{
             $post->brand=99999999999;
        }
       
        
        if($request->request_location){
         $post->request_location=$request->request_location;
        }else{
            $post->request_location=$user->user_region;
        }
        if($request->request_city){
            $post->request_city=$request->request_city;
 
        }else{
         $post->request_city=$user->user_city;
        }
        if($request->rural_name){
            $post->rural_name=$request->rural_name;
        }else{
            $post->rural_name=$user->rural_name;
        }
        
        $post->status=1;
        if($request->part_type){
            $post->part_type=$request->part_type;
            $post->has_part=1;
        }else{
            $post->has_part=0;
        }
      
        $form=$domain->requestform;

        if($form->has_equipment){
            $post->has_equipment=1;
        }else{
            $post->has_equipment=0;
        }if($request->delivery_address){
            $post->delivery_address=$request->delivery_address;
        }else{
            $post->delivery_address=$user->user_address;
        }
          
            
       
        $post->searching_params=$request->searching_params;
        $post->added_by=$user->id;
        $post->personal_code=$user->personal_code;
        if($form->has_equipment){
         $eq = new Equipment;
         $eq->air_condition=$request->air_condition;
         $eq->abs=$request->abs;
         $eq->light_wash=$request->light_wash;
         $eq->xenon_light=$request->xenon_light;
         $eq->electric_mirrors=$request->elecric_mirrors;
         $eq->heliomatic_mirrors=$request->heliomatic_mirrors;
         $eq->central_lock=$request->central_lock;
         $eq->automatic_gearbox=$request->automatic_gearbox;
         $eq->parking_sensors=$request->parking_sensors;
         $eq->parking_camera=$request->parking_camera;
         $eq->distronic=$request->distronic;
         $eq->projector_lights=$request->projector_lights;
         $eq->request=$post->request_number;
         $eq->save();
        }
        if($form->has_part){

            /* 
                Datele din formular se gasesc in $request->request,
                dar sunt accesibile in $request->measure_unity, etc.
                Prima piesa din cerere se gaste in:

                    $request->request['measure_unity'] => string 'um1' (length=3)
                    $request->request['part_title'] => string 'den1' (length=4)
                    $request->request['part_code'] => string 'cod1' (length=4)
                    $request->request['quantity'] => string '1' (length=1)

                Restul pieselor, daca sunt mai multe, in $request->request['part_input1,2,3,4']:
                    'part_input1' => 
                        array (size=2)
                        0 => string 'um2' (length=3)
                        1 => string 'um3' (length=3)
                    'part_input2' => 
                        array (size=2)
                        0 => string 'den2' (length=4)
                        1 => string 'den3' (length=4)
                    'part_input3' => 
                        array (size=2)
                        0 => string 'cod2' (length=4)
                        1 => null
                    'part_input4' => 
                        array (size=2)
                        0 => string '2' (length=1)
                        1 => string '3' (length=1)
            */

            /* Atributele comune pentru toate pisesele din cerere */
            $common_attruibutes = [
                'request'=>$request->rqrNumb,
                'part_type'=>$request->part_type,
                'status'=>1
            ];

            /* Prima pisesa */
            $insert_parts[0]= $common_attruibutes;
            $insert_parts[0]['measure_unity']=$request->measure_unity;
            $insert_parts[0]['part_title']=$request->part_title;
            $insert_parts[0]['part_code']=$request->part_code;
            $insert_parts[0]['quantity']=$request->quantity;

            /* Adaug si restul de piese din formular */
            if ( isset($request->part_input1) ) {
                
                $c = count($request->part_input1);
                for ($i=0; $i < $c; $i++) {

                    /* indexul arrey-ului $insert_parts este $i+1 deoarece exista deja o piesa adaugata */
                    $data = $common_attruibutes;
                    $data['measure_unity']=$request->part_input1[$i];
                    $data['part_title']=$request->part_input2[$i];
                    $data['part_code']=$request->part_input3[$i];
                    $data['quantity']=$request->part_input4[$i];

                    $insert_parts[]= $data;
                }
            }
// dd($request);
			$dinamyc_part = DB::table('parts')->insert($insert_parts);

   /*                  $pi1=$request->part_input1;
                    $pi2=$request->part_input2;
                    $pi3=$request->part_input3;
                    $pi4 = $request->part_input4;

                    for($i=0;$i < count($pi1); $i++){
                    $data=[
                    'request'=>$request->rqrNumb,
                    'measure_unity'=>$pi1[$i],
                    'part_title'=>$pi2[$i],
                    'part_code'=>$pi3[$i],
                    'quantity'=>$pi4[$i],
                    'part_type'=>$request->part_type,
                    'status'=>1,
                
                    ];
                    $insert_parts[]=$data;
                    }
                    
                    $dinamyc_part = DB::table('parts')->insert($insert_parts);
                    $part= new Part;
                    $part->measure_unity=$request->measure_unity;
                    $part->part_title=$request->part_title;
                    $part->part_code=$request->part_code;
                    $part->part_type=$request->part_type;
                    $part->quantity=$request->quantity;
                    $part->request=$request->rqrNumb;
                    $part->status=1; */
			
                                    /*  if($request->hasfile('part_image'))
                                        {
                                            $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts';

                                            $part_image = Input::file('part_image')->getClientOriginalName();
                                            
                                            $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts'.'/'.$part_image;

                                            File::makeDirectory($dirpath,$mode=0777,true,true);

                                            
                                            $img=Image::make(Input::file('part_image'))->resize(800,800)->save($path);
                                        }
                                        else 
                                        {
                                            $part_image='';
                                        }
                                        
                                        if($request->hasfile('part_image1'))
                                        {
                                            $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts';

                                            $part_image1 = Input::file('part_image1')->getClientOriginalName();
                                            
                                            $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$post->request_number.'/parts'.'/'.$part_image1;

                                            File::makeDirectory($dirpath,$mode=0777,true,true);

                                            
                                            $img=Image::make(Input::file('part_image1'))->resize(800,800)->save($path);
                                        }
                                        else 
                                        {
                                            $part_image1='';
                                        }
                                    
                                    $part->part_image=$part_image;
                                    $part->part_image1=$part_image1;
                                    if(!$request->part_type){
                                        $part->part_type=99999999999;
                                        $post->part_type=99999999999;
                                    }else{
                                        $part->part_type=$request->part_type;
                                        $post->part_type=$request->part_type;
                                    }
                                    
                                    $part->save();
                                }else{
                                    $part=new Part;
                                    $part->request=$post->request_number;
                                    $post->part_type=99999999999;
                                    $part->part_type=99999999999;
                                    $part->save(); */
        }
        
        $input=$request->input;
        $label=$request->label;
        for($i=0;$i < count($label); $i++){
            $data=[
             'request'=>$post->request_number,
             'data_label'=>$label[$i],
             'data_content'=>$input[$i],
            ];
            $insert_data[]=$data;
        }
        $complete=DB::table('requestdatas')->insert($insert_data);
       
      
         if($request->hasfile('image')){
             foreach($request->file('image') as $file){
                 $image=$file->getClientOriginalName();
                  $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code .'/'.'requests'.'/'.'parts/'.$post->request_number;
                 File::makeDirectory($dirpath, $mode = 0777, true, true);
                 $path=$file->move('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/'.'requests/'.$post->request_number.'/parts'.'/',$image);
                 $name[]=$image;
             }
             for($i=0;$i<count($request->file('image'));$i++){
           
                 $data=array(
                 'request'=>$post->request_number,
                 
                 'image'=>$name[$i],
                
             
                 );
                 $image_insert[]=$data;
             }
           
             $insert_reqimg=DB::table('requestimages')->insert($image_insert);
            
            
         }
         $post->form_used=0;
         $link='<a href="/request-details/'.$post->request_number.'">Vizualizare</a>"';
         $success='Cerere cu Numarul '.$post->request_number.', a fost trimisa cu cuccess';
         Session::put('success',$success);
         Session::put('link',$link);
		  if($request->searching_params=='1')
		 {
			$notification_url ='/local-requests';
		 }
		 else 
		 {
			 $notification_url ='/national-requests';
		 }
		 //Notification all params 
		   $notify_all = DB::table('domainparams')
		 ->leftjoin('locationparams','locationparams.user_id','domainparams.user_id')
		 ->leftjoin('partparams','partparams.user_id','domainparams.user_id')
		 ->leftjoin('brandparams','brandparams.user_id','domainparams.user_id')
		 ->where('domainparams.domain',$domain->id)
		 ->where('locationparams.location',$post->request_location)
		->where('brandparams.brand_id',99999999999)
		->where('partparams.param',99999999999)
		
		->get();
		 //Notification specified params 
		   $notify_spec = DB::table('domainparams')
		 ->leftjoin('locationparams','locationparams.user_id','domainparams.user_id')
		 ->leftjoin('partparams','partparams.user_id','domainparams.user_id')
		 ->leftjoin('brandparams','brandparams.user_id','domainparams.user_id')
		 ->where('domainparams.domain',$domain->id)
		 ->where('locationparams.location',$post->request_location)
		->where('brandparams.brand_id',$post->brand)
		->where('partparams.param',$post->part_type)
		
		->get();
		//Specified params notification end
		
		
		 foreach($notify_all as $notification)
		 {
			 $send_notification = new Notification;
			 $send_notification->notification = 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim';
			 $send_notification->url = $notification_url;
			 $send_notification->user_id = $notification->user_id;
			 $send_notification->notifier_id = $notification->user_id;
			 $send_notification->notifier_name = $user->name;
			 $send_notification->save();
		 }
		  foreach($notify_spec as $notification_spet)
		 {
			 $send_notification = new Notification;
			 $send_notification->notification = 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim';
			 $send_notification->url = $notification_url;
			 $send_notification->user_id = $notification_spet->user_id;
			 $send_notification->notifier_id = $notification->user_id;
			 $send_notification->notifier_name = $user->name;
			 $send_notification->save();
		 }
		 
         $post->save();
          return back()->with(compact('success','link'));
        
       
    
    }
    public function cloneRequest(Request $request, $request_id){
     $number=mt_rand();
     $related=Requestmodel::where('request_id',$request_id)->first();
     $cl=new Requestmodel;
     $user=auth()->user();
     $cl->request_number=$number;
     $cl->relation=$request_id;
     $cl->request_domain=$related->request_domain;
     if($request->user_region){
         $cl->request_location=$request->user_region;
     }else{
         $cl->request_location=$related->request_location;
     }
     if($request->user_city){
         $cl->request_city=$request->user_city;
     }else{
         $cl->request_city=$related->request_city;
     }
     if($request->delivery_address){
         $cl->delivery_address=$request->delivery_address;
     }else{
         $cl->delivery_address=$related->delivery_address;
     }
     if($request->rural_name){
         $cl->rural_name=$request->rural_name;
     }else{
         $cl->rural_name=$related->rural_name;
     }
     
     if($related->has_part){
     $part= new Part;
     $part->measure_unity=$request->measure_unity;
     $part->part_title=$request->part_title;
     $part->part_code=$request->part_code;
     $part->part_type=$request->part_type;
     $part->quantity=$request->quantity;
     $part->request=$number;
     $part->status=1;
     if($request->hasfile('part_image')){
      $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code .'/'.'requests'.'/'.$number;
      $part_img=Input::file('part_image')->getClientOriginalName();
 
       $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code .'/'.'requests'.'/'. $number.'/'.$part_img;
       File::makeDirectory($dirpath, $mode = 0777, true, true);
          $part_image=Image::make(Input::file('part_image'))->resize(640, 920)->save($path);
 
   
      }else{
          $part_img='';
      }
      if($request->hasfile('part_image1')){
          $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code .'/'.'requests'.'/'.'parts/'.$number;
          $part_img1=Input::file('part_image1')->getClientOriginalName();
 
          $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code .'/'.'requests'.'/'. $number.'/'.'parts/'.$part_img1;
          File::makeDirectory($dirpath, $mode = 0777, true, true);
          $part_image1=Image::make(Input::file('part_image1'))->resize(640, 920)->save($path);
     
       
      }else{
              $part_img1='';
     }
     $part->part_image=$part_img;
      $part->part_image1=$part_img1;
     $part->save();
     }else{
         $input=$request->input;
        $label=$request->label;
        for($i=0;$i < count($label); $i++){
            $data=[
             'request'=>$number,
             'data_label'=>$label[$i],
             'data_content'=>$input[$i],
            ];
            $insert_data[]=$data;
        }
         $insert_data[]=$data;
         $data_insert=DB::table('requestdatas')->insert($insert_data);
     }
     
      
 
 
  
         if($request->hasfile('image')){
             foreach($request->file('image') as $file){
                 $image=$file->getClientOriginalName();
                 
                 $path=$file->move('Platform/frontend/assets/images/customer_images/'.$user->personal_code.'/'.'requests/'.$number.'/',$image);
                 $name[]=$image;
             }
             for($i=0;$i<count($request->file('image'));$i++){
           
                 $data=array(
                 'request'=>$number,
                 
                 'image'=>$name[$i],
                
             
                 );
                 $image_insert[]=$data;
             }
           
             $insert_reqimg=DB::table('requestimages')->insert($image_insert);
            
            
         }
     
     $cl->added_by=$user->id;
     $cl->has_part=$related->has_parts;
     $cl->has_equipment=$related->has_equipments;
     $cl->personal_code = $related->personal_code;
     $cl->searching_params=$request->searching_params;
     $cl->status=1;
     if($related->has_part){
         $cl->part_type=$request->part_type;
     }else{
         $cl->part_type=99999999999;
     }
     $cl->save();
     return back();
 }
}
