<?php

namespace App\Http\Controllers\Platform\Frontend;

use Image;
use Illuminate\Http\Request;
use App\Models\Platform\Retur;
use App\Models\Platform\Command;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Models\Platform\Notification;
use App\Models\Platform\Checkout;
class RetursController extends Controller
{
        public function showMy()
        {
            $user= auth()->user();

            return view('platform/frontend/users/personalcontent/sent_returs',compact('user'));
        }

        public function showReceived()
        {
            $user= auth()->user();

            return view('platform/frontend/users/personalcontent/received_returs',compact('user'));
        }

        public function sendRetur(Request $request, $command_id)
        {
            $user = auth()->user();

            $retur = new Retur;

            $retur->number = mt_rand();

            $command = Command::where('command_id',$command_id)->first();
			
		
			  
            $check_retur = Retur::where('command_id',$command_id)->count();

            if(!$check_retur){
			
			$new_date = date('Y-m-d H:i:s',strtotime("+48 hours"));
			
            if($request->hasfile('image'))
            {
                $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$command->request->request_number.'/returs'.'/'.$retur->number;

            $image = Input::file('image')->getClientOriginalName();

            File::makeDirectory($dirpath, $mode = 0777,true,true);

            $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$command->request->request_number.'/returs'.'/'.$retur->number.'/'.$image;

            $img = Image::make(Input::file('image'))->resize(800,800)->save($path);

            }
            else 
            {
                $image = '';
            }

            if($request->hasfile('image1'))
            {
            $dirpath = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$command->request->request_number.'/returs'.'/'.$retur->number;

            $image1 = Input::file('image1')->getClientOriginalName();

            File::makeDirectory($dirpath, $mode = 0777,true,true);

            $path = 'platform/frontend/assets/images/customer_images/'.$user->personal_code.'/requests'.'/'.$command->request->request_number.'/returs'.'/'.$retur->number.'/'.$image1;

            $img = Image::make(Input::file('image1'))->resize(800,800)->save($path);

            }
            else 
            {
                $image1 = '';
            }

            $retur->image = $image;

            $retur->image1 = $image1;

            $retur->command_id = $command_id;

            $retur->client_id  = $user->id;

            $retur->supplier_id = $command->supplier_id;

            $retur->ammount = $command->total_ammount;

            $retur->mentions = $request->mentions;
			
			$retur->confirm_enddate = $new_date;
			
			$command_update = Command::where('command_id',$command_id)->update(['status'=>3]);
			
			$checkout_update = Checkout::where('command_id',$command_id)->update(['status'=>2]);
			
			$notification = new Notification;
			
			$notification->user_id = $retur->supplier_id;
			
			$notification->notification = 'Stimati cu parere de rau va anuntam ca clientul a facut cerere de retur pentru comanda pe care a trimis numarul: '.$command->number;
			
			$notification->url = '/my-returs';
			
			$notification->notifier_id = $command->client_id;
			
			$notification->notifier_name = 'Wawto Robot';
			
			$notification->save();
           
		   $retur->save();

            return back()->with('success','Cerere de retur a fost trimisa la furnizor. Multumim!!!');
            }//Check retur 
            else 
            {
                return back()->with('error','Cerere de retur este deja trimisa !!!');
            }

        }

        public function confirmRetur($id)
        {
			$get_info = Retur::findOrFail($id);
			
			$command_upd = Checkout::where('command_id',$get_info->command_id)->delete();
			
            $retur = Retur::findOrFail($id)->update(['status'=>2]);

            return back()->with('success','Colet confirmat. Multumim!!!');
        }
}
