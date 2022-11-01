<?php

namespace App\Http\Controllers\Platform\Frontend;

use Illuminate\Http\Request;
use App\Models\Platform\Offer;
use App\Models\Platform\Curier;
use App\Models\Platform\Command;
use App\Models\Platform\Checkout;
use App\Http\Controllers\Controller;
use App\Models\Platform\Notification;
use App\Models\Platform\Requestmodel;
use DB;
class CommandsController extends Controller
{
        public function sendCommand(Request $request, $id)
        {          
                $rules = $this->validate($request,
                [
                    'delivery_options'=>'required',

                    'payment_options'=>'required',
                ]);

                $check_time = date('H');

                $user = auth()->user();

                if($check_time >= '09' && $check_time < '17')
                {
                    $newTime =  date("Y-m-d H:i:s", strtotime("+15 minutes"));
                }
                
                if($check_time >= '17' && $check_time <= '20')
                {
                    $newTime = date("Y-m-d H:i:s", strtotime("+14 hours"));

                }

                if($check_time >= '20' && $check_time <= '23')
                {
                    $newTime = date("Y-m-d H:i:s", strtotime("+12 hours"));
                }
                if($check_time >= '00' && $check_time <='02')
                {
                    $newTime = date("Y-m-d H:i:s", strtotime("+12 hours"));
                }
                if($check_time > '02' && $check_time <= '04')
                {
                    $newTime = date("Y-m-d H:i:s", strtotime("+8 hours"));
                }
                if($check_time > '4' && $check_time <'09')
                {
                    $newTime = date("Y-m-d H:i:s", strtotime("+6 hours"));
                }
         
                $offer = Offer::findOrFail($id);

                $get_request = Requestmodel::where('request_id',$offer->request)->first();

               

                $tva = $offer->tva/100;

                $start_tva = $tva*$offer->value;

                $tva_ammount = round($start_tva,2);

                $command = new Command;

                $command->number = mt_rand();

                $command->status = 0;

                $command->offer_id = $id;

                $command->request_id = $get_request->request_id;

                $command->confirm_limit = $newTime;

                $command->offer_price = $offer->value;

                $command->tva = $tva_ammount;

                $total_value = round($tva_ammount+$command->offer_price,2);

                $command->delivery_option = $request->delivery_options;

                $command->payment_option = $request->payment_options;

                $command->total_price = $total_value;

                if($request->delivery_options =='1')
                {
                    $courier = Curier::where('is_default',1)->first();

                    $weight = $offer->weight;

                    if($weight <= $courier->payload)
                    {
                        $delivery_price = $courier->pay_load;
                    }
                    else 
                    {
                        $calc = $weight-$courier->payload_limit;

                        $ammount = $calc*$courier->overload;

                        $delivery_price = round($courier->pay_load+$ammount,2);
                    }
                    $total_price = round($total_value+$delivery_price,2);
                }
                else
                {
                    $total_price = $total_value;
                }
              
                $command->part_id = $offer->part_id;

                $command->total_ammount = $total_price;

                $rights = Command::where('part_id',$offer->part_id)->where('status',0)->where('confirm_limit','>',date('Y-m-d H:i:s'))->first();
               
                if(!$rights)
                {
                $notification = new Notification;
                
                $notification->notifier_id = $user->id;

                $notification->notifier_name = $user->name;

                $notification->user_id = $offer->supplier_id;


                $notification->notification='Stimati, Utilizatorul '.$user->name.' a trimis comanda pentru ofrerta Dumneavoastra numarul: '.$offer->number.', care se refera la cerere Dumneavoastra: '.$get_request->request_number.'. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.';
                
                $notification->url = '/my-account';

                $notification->save();
                
                $command->client_id = $offer->client_id;

                $command->supplier_id = $offer->supplier_id;

                $update_request = Requestmodel::where('request_id',$offer->request)->update(['status'=>0]);

                $command->save();
                
                return redirect()->route('home');
                }
                else
                {
                    return back()->with('error','Actiune nu este persmisa de Wawto!!! Va rugam sa nu mai incercati asemena actiuni...Mutlumim!!!');
                }
                
        }

        public function confirm($command_id)
        {
            $user = auth()->user();

            $get_command = Command::where('command_id',$command_id)->first();
			
			$new_date = date('Y-m-d H:i:s',strtotime("+48 hours"));
			
            $command = Command::where('command_id',$command_id)->update(['status'=>1,'accomplish_date'=>$new_date]);

            $notification = new Notification;

            $notification->notifier_id = $user->id;

            $notification->user_id = $get_command->client_id;

            $notification->notification ='Stimati, Furnizorul a confirmat commanda Dumneavoastra numarul '.$get_command->number.'. Acuma puteti proceda la checkout ca sa beneficiati de serviciile pe care va a oferit furnizorul... Multumim!!!';
            
            $notification->url ='my-account';

            $notification->save();

            return back()->with('success','Comanda confirmata...');
        }

        public function myCommands()
        {
            $user=auth()->user();

            return view('platform/frontend/users/personalcontent/sent_commands',compact('user'));
        }

        public function checkOut($command_id)
        {
            $user = auth()->user();

            $command = Command::where('command_id',$command_id)->first();

            return view('platform/frontend/users/personalcontent/checkout',compact('user','command'));
        }
		
		  public function commandDetails($command_id)
        {
            $user = auth()->user();

            $command = Command::where('command_id',$command_id)->first();

            return view('platform/frontend/users/personalcontent/command_details',compact('user','command'));
        }

        public function postCheckout($command_id)
        
        {
            $command = Command::where('command_id',$command_id)->first();

            $check=$command->checked;

            if($check)
            {
                return back()->with('error','Checkout pentru acesta comanda este inregistrat deja pe platforma Wawto...Multumim!!!!');
            }
            else{
			
			$set_status = Command::where('command_id',$command_id)->update(['status'=>2]);
           
		   $user = auth()->user();

            $checkout = new Checkout;

            $checkout->command_id = $command_id;

            $checkout->supplier_id = $command->supplier_id;

            $checkout->client_id = $user->id;

            $checkout->ammount = $command->total_ammount;

            $checkout->status = 1;

            $notification  = new Notification;

            $notification->user_id = $command->supplier_id;

            $notification->url = '/';

            $notification->notification = 'Stimati. Client '.$command->commandclient->name.' a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: '.$command->number.'. Multumim pentru ca folositi serviicile noastre!!!';

            $notification->notifier_name = $command->supplier->name;

            $notification->notifier_id = $command->commandclient->id;

            $notification->save();

            $checkout-> save();

           
             return redirect()->route('my-account')->with('success','Ati realizat comanda cu success, asteptam confirmare de ridicare colet sau servicii prestate din partea furnizorului. Un reiting pentru furnizor ca sa monitorizam calitate de servicii pe platforma...Mulutmim!!!');
        
            }
	}
			public function confirmCollet($command_id)
			{
				$confirm = Command::where('command_id',$command_id)->update([
					'status'=>4,
				]);
				
				return back()->with('success','Coletul ridicat status a fost setat...');
	}
	
	public function getPayments()
	{
		$user = auth()->user();
		
		$payments = $user->checkoutclient;
		
		return view('platform.frontend.users.personalcontent.payments',compact('user','payments'));
	}
	
	public function getIncomes()
	{
		$user = auth()->user();
		
		$incomes = $user->checkout_supplier;
		
		$commission = DB::table('commision_grill')->where('supplier_id',$user->id)->first();
		
		return view('platform.frontend.users.personalcontent.incomes',compact('user','incomes','commission'));
	}
       
}
