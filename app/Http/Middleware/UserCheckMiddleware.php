<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Platform\Command;
use App\Models\Platform\Retur;
class UserCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
       
        if(!$user->user_phone || !$user->user_address || !$user->user_region)
        {
            return redirect()->route('profile')->with('error','Va ruagam sa completati informatii presonale, telefon,email,judet si oras. Multumim!!!');
        }
		
		if(!$user->wawto_status || !$user->verification_status){
			
		return redirect()->route('profile')->with('error','Am descoperit nereguli in contul Dumneavoastra. Acest mesaj poate sa apare din 2 motive. E-mail Dumneavoastra nu este verificat, sau contul dumneavoastra este blocat de catre administratie Wawto. Asteptam intrebarile prin formular ticket de support. Wawto IT');
		
		}
		$commands = Command::where('client_id',$user->id)->where('status',2)->where('accomplish_date','<',date('Y-m-d H:i:s'))->count();
		
		if($commands)
		{
			return redirect()->route('my-account')->with('error','Va rugam sa confirmati colete pe care ati primit in trecut...Confirmarea coletelor se face pe pagina Comenzi Trimise. Multumim!!!!');
		}
		$returs = Retur::where('supplier_id',$user->id)->where('status',0)->where('confirm_enddate','<',date('Y-m-d H:i:s'))->count();
		
		if($returs)
		{
			return redirect()->route('my-account')->with('error','Va rugam sa confirmati colete pe care ati primit in trecut...Confirmarea coletelor se face pe pagina Retur Primite. Multumim!!!!');
		}
		
		else
        {
              return $next($request);
        }
      
    }
}
